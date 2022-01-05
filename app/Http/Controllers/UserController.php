<?php

namespace App\Http\Controllers;

use App\Common\Result;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function register($params)
    {
        return '';
    }

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
            "grant_type" => "password",
            "client_id" => "952bb865-14d3-4455-8646-bbc6c59c14cf",
            "client_secret" => "NdV95aBMtdeYGBMmNhextTLybbudrxAlrAtN6GXD",
            "scope" => "*",
        ];

        $response = Http::withOptions([
            'Accept' => 'application/json',
        ])->timeout(2)->post('http://localhost:8888/api/oauth/token', $data);

        $status = $response->getStatusCode();
        if($status==200){
            $result = $response->json();
            return Result::ok($result);
        }else {
            return Result::error(40001,'账号或者密码错误');
        }



    }
}
