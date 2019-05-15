<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quest;
use App\Models\Team;
use App\Models\QuestLog;
use App\Models\QuestReward;
use App\Models\PreQuest;

class QuestController extends Controller
{
    public function getAllQuest(){
        return Quest::all();
    }

    public function getCompletedQuest(Request $request){
        $teamId = $request->input('team_id');

        return QuestLog::with('Quest:id,name')->where('team_id', '=', $teamId)->get();
    }

    public function getNotCompletedQuest(Request $request){
        $teamId = $request->input('team_id');

        $allQuest = Quest::all();
        $completeQuestIdArray = [];
        $completeQuest = QuestLog::select('quest_id')->where('team_id', '=', $teamId)->get();
        foreach ($completeQuest as $quest) {
            $completeQuestIdArray[] = $quest->quest_id;
        }

        $notCompleteQuest = [];
        foreach ($allQuest as $quest) {
            if(!in_array($quest->id, $completeQuestIdArray))
                $notCompleteQuest[] = $quest;
        }

        return $notCompleteQuest;
    }

    public function getQuestInfo($questId){
        return Quest::with('npc')->find($questId);
    }

    public function insertQuestLog(Request $request){
        $questId = $request->input('quest_id');
        $teamId = $request->input('team_id');

        $log = QuestLog::firstOrCreate([
            'team_id' => $teamId,
            'quest_id' => $questId
        ]);
    }
}
