<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository {

    /** @var Item */
    protected $item;

    public function __construct(Item $item){
        $this->item = $item;
    }

    /**
     * 透過 物品編號 取得 物品詳細內容
     *
     * @param int $id
     * @return App\Models\Item
     */
    public function getItemById($id){
        return $this->item
                    ->where('id', '=', $id);
    }
}