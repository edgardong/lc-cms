<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * 显示指定用户的简介
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id),
        ]);
    }

    public function register($params)
    {
        return '';
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'type' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();
        if (!$user || $request->password != $user->password) {
            return [
                'err_code' => 40001,
                'err_msg' => '用户名或密码不正确',
                'status' => 'fail',
                'data' => '',
            ];
        }

        $token = $user->createToken($request->username)->plainTextToken;

        return [
            'err_code' => 0,
            'err_msg' => '',
            'data' => ['token' => $token, 'info' => $user],
            'status' => 'success',
        ];
    }
}
