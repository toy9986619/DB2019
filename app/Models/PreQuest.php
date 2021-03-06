<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreQuest extends Model
{
    protected $table = 'pre_quests';

    protected $fillabel = [
        'quest_id', 'pre_quest_id'
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
     * 前置任務資訊 關聯
     *
     * @return App\Models\Quest
     */
    function PreQuest() {
        return $this->hasMany('App\Models\Quest', 'pre_quest_id', 'id');
    }
}
