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
}
