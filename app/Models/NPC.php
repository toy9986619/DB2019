<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NPC extends Model
{
    protected $table = 'npcs';

    protected $fillable = [
        'user_id', 'name'
    ];

    /**
     * 對應的人員 關聯
     *
     * @return App\Modesl\User
     */
    function User() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
