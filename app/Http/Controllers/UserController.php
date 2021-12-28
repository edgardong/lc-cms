<?php

namespace App\Http\Controllers;

use App\Common\Result;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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


         //验证
         $validator = Validator::make($request->all(),[
            'username'=>'required',
            'password'=>'required',
        ],[
            'username.required'=>'账号不能为空',
            'password.required'=>'密码不能为空',
        ]);
        //查看是否通过
        if ($validator->fails()){
            return ['code'=>500,'msg'=>$validator->errors()->first()];
        }

        //查询登录
        $bool = auth()->guard('api')->attempt($request->all());
        if ($bool){
            //生成token
            //得到用户模型对象
            $userModel = auth()->guard('api')->user();
            //判断当前用户接口是否超过 2000 次
            /* if ($userModel->clicks > 2000){
                return ['code'=>500,'msg'=>'当天访问次数已达上限'];
            } */

            //生成token 保存服务端一份 返回客户一份
            $token = $userModel->createToken('api')->accessToken;

            //让当前请求加1
            // $userModel->increment('clicks');
            $data = [
                'expire'=>7200,
                'token' => $token
            ];
            return ['code'=>200,'msg'=>'登录成功','data'=>$data];
        }else{
            return ['code'=>500,'msg'=>'登录失败'];
        }

        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        //     'type' => 'required',
        // ]);

        // Log::debug("login start");

        // $data = [
        //     "username" => $request->username,
        //     "password" => $request->password,
        //     "grant_type" => "password",
        //     "client_id" => "952bb865-14d3-4455-8646-bbc6c59c14cf",
        //     "client_secret" => "NdV95aBMtdeYGBMmNhextTLybbudrxAlrAtN6GXD",
        //     "scope" => "*",
        // ];

        // //$res = Http::fake();

        // // Log::debug($res->);
        // try {

        //     $response = Http::withOptions([
        //         'debug' => true,
        //         'Accept' => 'application/json'
        //     ])->timeout(3)->post('http://localhost:8000/api/oauth/token', [
        //         'grant_type' => 'password',
        //         "client_id" => "952bb865-14d3-4455-8646-bbc6c59c14cf",
        //         "client_secret" => "NdV95aBMtdeYGBMmNhextTLybbudrxAlrAtN6GXD",
        //         'username' => 'edgardong',
        //         'password' => '123456',
        //         'scope' => '*',
        //     ]);

        //     Log::debug('login.......');
        //     Log::debug($response->getBody());

        //     return Result::ok($response);

        // } catch (Exception $e) {
        //     Log::error($e->getMessage());
        // }
    }
}
