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
     * 取得 隊伍成員 模型
     *
     * @return App\Models\TeamMember
     */
    public function TeamMember() {
        return $this->hasMany('App\Models\TeamMember', 'team_id', 'id');
    }

    /**
     * 取得 成員 模型
     *
     * @return App\Models\User
     */
    public function Member() {
        return $this->hasManyThrough('App\Models\User', 'App\Models\TeamMember', 'team_id', 'id', 'id', 'user_id');
    }
}
