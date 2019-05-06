<?php

namespace App\Repositories;

use App\Models\Team;

class TeamRepository {

    /** @var Team */
    protected $team;

    public function __construct(Team $team){
        $this->team = $team;
    }

    public function getCompletedQuestListById($id){
        return $this->team
                    ->where('id', '=', $id)
                    ->with('CompletedQuest')
                    ->get();
    }

    public function getItemListById($id){
        return $this->team
                    ->where('id', '=', 'id')
                    ->with('Item')
                    ->get();
    }
}