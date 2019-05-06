<?php

namespace App\Repositories;

use App\Models\Quest;

class QuestRepository {

    /** @var Quest */
    protected $quest;

    public function __construct(Quest $quest){
        $this->quest = $quest;
    }

    public function getQuestList(){
        return $this->quest
                    ->select('id', 'name')
                    ->with('NPC')
                    ->get();
    }

    public function getQuestById($id){
        return $this->quest
                    ->where('id', '=', $id)
                    ->with('Reward', 'NPC')
                    ->first();
    }
}