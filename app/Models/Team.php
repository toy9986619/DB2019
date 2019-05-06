<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'name'
    ];

    /**
     * 隊伍成員 關聯
     *
     * @return App\Models\TeamMember
     */
    public function TeamMember() {
        return $this->hasMany('App\Models\TeamMember', 'team_id', 'id');
    }

    /**
     * 隊伍成員 遠層關聯
     *
     * @return App\Models\User
     */
    public function Member() {
        return $this->hasManyThrough('App\Models\User', 'App\Models\TeamMember', 'team_id', 'id', 'id', 'user_id');
    }

    /**
     * 持有物品 遠層關聯
     *
     * @return App\Models\Item
     */
    public function Item() {
        return $this->hasManyThrough('App\Models\Item', 'App\Models\ItemLog', 'team_id', 'id', 'id', 'item_id');
    }

    /**
     * 完成任務 遠層關聯
     *
     * @return App\Models\Quest
     */
    public function CompletedQuest() {
        return $this->hasManyThrough('App\Models\Quest', 'App\Models\QuestLog', 'team_id', 'id', 'id', 'quest_id');
    }
}
