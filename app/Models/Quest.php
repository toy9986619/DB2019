<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $table = 'quests';

    protected $fillable = [
        'name', 'description'
    ];

    /**
     * 前置任務 關聯
     *
     * @return App\Models\Quest
     */
    function PreQuest() {
        return $this->hasMany('App\Models\PreQuest', 'quest_id', 'id');
    }

    /**
     * 前置任務 遠層關聯
     *
     * @return App\Models\Quest
     */
    function PreQuestThrough() {
        return $this->hasManyThrough(
            'App\Models\Quest',
            'App\Models\PreQuest',
            'quest_id',
            'id',
            'id',
            'pre_quest_id'
        );
    }

    /**
     * 任務獎勵 關聯
     *
     * @return App\Models\QuestReward
     */
    function QuestReward() {
        return $this->hasMany('App\Models\QuestReward', 'quest_id', 'id');
    }

    /**
     * 任務獎勵 遠層關聯
     *
     * @return App\Models\Item
     */
    function Reward() {
        return $this->hasManyThrough(
            'App\Models\Item',
            'App\Models\QuestReward',
            'quest_id',
            'id',
            'id',
            'item_id'
        );
    }

    /**
     * 取得 NPC
     *
     * @return App\Models\NPC
     */
    function npc() {
        return $this->hasOne('App\Models\NPC', 'id', 'npc_id');
    }

    function questLog() {
        return $this->hasMany('App\Models\QuestLog', 'quest_id', 'id');
    }
}
