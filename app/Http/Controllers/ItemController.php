<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemLog;

class ItemController extends Controller
{
    public function itemList(Request $request){
        $team_id = $request->input('team_id');

        return ItemLog::with('Item')->where('team_id', '=', $team_id)->get();
    }
}
