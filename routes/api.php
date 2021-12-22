<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\UserController;
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



Route::get('/test', function (Request $request) {
    return array('id' => 'hello , laravel');
});

// 管理模块API
Route::prefix('admin')->group(function () {

});

// 公用模块API
Route::prefix('user')->group(function () {
    Route::get('/test', function () {
        return array('id' => 'hello , user');
    });

    Route::get('/info', function (Request $request) {
        return $request->user();
    })->middleware('auth.api:api');

    /**
     * 用户注册
     */
    Route::post('/register', function (Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user) {
            throw ValidationException::withMessages([
                'username' => ['该用户已存在，请直接登录'],
            ]);
        }

        $new_user = new User;
        $new_user->username = $request->username;
        $new_user->password = $request->password;
        $new_user->type = '100';

        $new_user->save();

        return 'success';
    });

    /**
     * 用户登录
     */
    Route::post('/login',[UserController::class, 'login']);

    Route::post('/forget_password', function (Request $request) {
        # code...
    });

    Route::post('/reset_password', function (Request $request) {

    });
});
