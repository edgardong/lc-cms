<?php

namespace App\Http\Controllers;

use App\Common\Result;
use App\Enums\ErrorCode;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    /**
     * 注册新用户
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user) {
            return Result::enumError(ErrorCode::USER_EXIST);
        }

        $new_user = new User;
        $new_user->username = $request->username;
        $new_user->password = $request->password;
        $new_user->nickname = $request->nickname;
        $new_user->type = '100';

        $new_user->save();

        return Result::ok();
    }


    /**
     * 用户登录
     */
    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            //    'type' => 'required',
        ]);

        $data = [
            "username" => $request->username,
            "password" => $request->password,
            "grant_type" => env('OAUTH_GRANT_TYPE'),
            "client_id" => env('OAUTH_CLIENT_ID'),
            "client_secret" => env('OAUTH_CLIENT_SECRET'),
            "scope" => env('OAUTH_SCOPE'),
        ];

        $response = Http::withOptions([
            'Accept' => 'application/json',
        ])->timeout(2)->post('http://localhost:8888/api/oauth/token', $data);

        $status = $response->getStatusCode();
        if ($status == 200) {
            $result = $response->json();
            return Result::ok($result);
        } else {
            return Result::enumError(ErrorCode::USER_IDENTITY_ERROR);
        }
    }

    /**
     * 获取用户列表
     */
    function list(Request $request) {
        $users = User::paginate(15);
        return $users;
    }

    /**
     * 获取用户详情
     */
    public function detail(Request $request)
    {
        # code...
    }
}
