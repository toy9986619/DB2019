<?php

namespace App\Repositories;

use App\Models\Team;

class TeamRepository {

    /** @var Team */
    protected $team;

    public function __construct(Team $team){
        $this->team = $team;
    }

    /**
     * 透過 隊伍編號 取得 已完成任務列表
     *
     * @param int $id
     * @return App\Models\Quest Array
     */
    public function getCompletedQuestListById($id){
        return $this->team
                    ->where('id', '=', $id)
                    ->with('CompletedQuest')
                    ->get();
    }

    /**
     * 透過 隊伍編號 取得 持有物品清單
     *
     * @param int $id
     * @return App\Models\Item Array
     */
    public function getItemListById($id){
        return $this->team
                    ->where('id', '=', $id)
                    ->with('Item')
                    ->get();
    }
}