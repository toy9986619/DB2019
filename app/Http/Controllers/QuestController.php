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
    public function questList(){
        return Quest::all();
    }

    public function completedQuestList(Request $request){
        $teamId = $request->input('team_id');

        return QuestLog::with('Quest')->where('team_id', '=', $teamId)->get();
    }
}
