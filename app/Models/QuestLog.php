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
}
