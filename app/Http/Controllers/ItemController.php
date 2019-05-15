<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemLog;

class ItemController extends Controller
{
    public function getItemList(Request $request){
        $team_id = $request->input('team_id');

        return ItemLog::with('Item:id,name')->where('team_id', '=', $team_id)->get();
    }

    public function getItemInfo($itemId){
        return Item::find($itemId);
    }

    public function insertItemLog(Request $request){
        $teamId = $request->input('team_id');
        $itemId = $request->input('item_id');

        $log = ItemLog::firstOrCreate([
            'team_id' => $teamId,
            'item_id' => $itemId,
            'status' => 1
        ]);
    }
}
