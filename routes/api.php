<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function (Request $request) {
    return array('id' => 'hello , laravel');
});

// 管理模块API
Route::prefix('admin')->group(function(){

});


// 公用模块API
Route::prefix('user')->group(function(){
    Route::get('/test',function ()
    {
        return array('id' => 'hello , user');
    });

    /**
     * 用户注册
     */
    Route::post('/register',function(Request $request){

    });

    /**
     * 用户登录
     */
    Route::post('/login',function (Request $request){

    });


    Route::post('/forget_password',function (Request $request)
    {
        # code...
    });

    Route::post('/reset_password',function (Request $request){

    });
});


