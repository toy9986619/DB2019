<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestLog extends Model
{
    protected $table = 'log_quests';
    protected $fillable = ['team_id', 'quest_id'];

    /**
     * 屬於 哪個隊伍 關聯
     *
     * @return App\Models\Team
     */
    public function Team(){
        return $this->belongsTo('App\Models\Team', 'team_id', 'id');
    }

    /**
     * 任務關聯
     *
     * @return App\Models\Quest
     */
    public function Quest(){
        return $this->hasOne('App\Models\Quest', 'id', 'quest_id');
    }
}
