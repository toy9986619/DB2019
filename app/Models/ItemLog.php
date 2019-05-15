<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemLog extends Model
{
    protected $table = 'log_items';
    protected $fillable = ['team_id', 'item_id', 'status'];

    /**
     * 屬於 哪個隊伍 關聯
     *
     * @return App\Models\Team
     */
    public function Team(){
        return $this->belongsTo('App\Models\Team', 'team_id', 'id');
    }

    /**
     * 物品 關聯
     *
     * @return App\Models\Item
     */
    public function Item(){
        return $this->hasOne('App\Models\Item', 'id', 'item_id');
    }
}
