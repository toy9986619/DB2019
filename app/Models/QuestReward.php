<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestReward extends Model
{
    protected $table = 'quest_rewards';

    protected $fillabe = [
        'quest_id', 'item_id'
    ];

    /**
     * 屬於哪個任務 關聯
     *
     * @return App\Models\Quest
     */
    function Quest() {
        return $this->belongsTo('App\Models\Quest', 'quest_id', 'id');
    }

    /**
     * 任務獎勵 關聯
     *
     * @return App\Models\Item
     */
    function Reward() {
        return $this->hasMany('App\Models\Item', 'id', 'item_id');
    }
}
