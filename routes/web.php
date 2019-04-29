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

// Route::get('/', function () {
//     // return view('welcome');
//     return view('index');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

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

