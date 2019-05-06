<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\ItemLog;

class ItemRepository {

    /** @var Item */
    protected $item;

    /** @var ItemLog */
    protected $itemLog;

    public function __construct(Item $item){
        $this->item = $item;
    }

    public function getItemById($id){
        return $this->item
                    ->where('id', '=', $id);
    }
}