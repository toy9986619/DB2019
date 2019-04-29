<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'team_members';

    protected $fillable = [
        'team_id', 'user_id'
    ];

    /**
     * 取得 隊伍 模型
     *
     * @return App\Models\Team
     */
    public function Team(){
        return $this->hasOne('App\Models\Team', 'id', 'team_id');
    }

    /**
     * 取得 隊員 模型
     *
     * @return App\Models\User
     */
    public function User(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
