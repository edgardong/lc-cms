<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

/**
 * 用户模块路由
 */
Route::prefix('user')->group(function () {
    Route::get('/info', function (Request $request) {
        return Auth::user();
    })->middleware('auth:api');

    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);

    Route::post('/forget_password', function (Request $request) {
        # code...
    });

    Route::post('/reset_password', function (Request $request) {

    });
});

/**
 * 管理员相关路由
 */
Route::prefix('admin')->group(function () {
    Route::prefix('user')->middleware('auth:api')->group(function () {
        Route::get('/list', [UserController::class, 'list']); // 用户列表
        Route::get('/detail', [UserController::class, 'detail']); // 用户详情
        Route::get('/edit', [UserController::class, 'edit']); // 编辑用户
        Route::get('/add', [UserController::class, 'add']); // 添加用户
        Route::get('/delete', [UserController::class, 'delete']); // 删除用户
    });
});

/**
 * 菜单相关路由
 */
Route::prefix('menu')->group(function () {
    Route::post('/list', [MenuController::class, 'list'])->middleware('auth:api');
});
