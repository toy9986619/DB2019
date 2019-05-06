<?php

namespace App\Repositories;

use App\Models\Quest;

class QuestRepository {

    /** @var Quest */
    protected $quest;

    public function __construct(Quest $quest){
        $this->quest = $quest;
    }

    /**
     * 取得 所有任務列表
     *
     * @return App\Models\Quest Array
     */
    public function getQuestList(){
        return $this->quest
                    ->select('id', 'name')
                    ->with('NPC')
                    ->get();
    }

    /**
     * 透過 任務編號 取得 任務詳細內容
     *
     * @param int $id
     * @return App\Models\Quest
     */
    public function getQuestById($id){
        return $this->quest
                    ->where('id', '=', $id)
                    ->with('Reward', 'NPC')
                    ->first();
    }
}