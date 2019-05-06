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
     * 屬於哪個隊伍 關聯
     *
     * @return App\Models\Team
     */
    public function Team(){
        return $this->belongsTo('App\Models\Team', 'team_id', 'id');
    }

    /**
     * 隊員 關聯
     *
     * @return App\Models\User
     */
    public function User(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
