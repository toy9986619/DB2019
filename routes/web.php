<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();

Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/check_login', function(Request $request) {
    $res = Auth::check();

    if($res){
        $data = $request->user();
    }else{
        $data = 'false';
    }
    return $data;
});

// Vue SPA
Route::any('/{path}', 'SinglePageController@index')->where(['path' => '.*']);

