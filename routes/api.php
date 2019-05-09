<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/quest/completed-quest', 'QuestController@completedQuestList');
Route::get('/item/item-list', 'ItemController@itemList');

Route::get('/team/{id}', function(){
    return App\Models\Team::with('Member')->find(1);
});
