<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }
    public function dologin(LoginRequest $req){
        $password = Hash::make($req->password);

        $user = User::where("mobile",$req->mobile)->first();
        $captcha = $req->session()->pull('captcha');
        if($req->captcha='' || $req->captcha != $captcha)
        {
            return back()->withErrors(['capcha'=>'验证码输入错误！']);
        }
        // 判斷是否有這個账号
        if($user){
            // 判断密码
            // 表单中的密码，$req->password
            // 数据库的密码：$user->password 哈希之后
            // laravel 中 Hash::check(原始，哈希之后)判断是否一致
             if(Hash::check($req->password,$user->password)){
                // 把用戶常用的標記保存到SSESSION中
                // $captcha = $req->session()->pull('captcha');
                session([
                    'id'=>$user->id,
                    'mobile'=>$user->mobile,
                    'smface'=>$user->smface,
                ]);
                // dd(session('id'));
                return redirect()->route('index');
                
             }else{
                return back()->withErrors('密碼錯誤');
             }
        }else{
        //  判斷密碼
        // 返回上一個把錯誤保存在SESSION中
        return back()->withErrors('手机号不存在');
        }
    } 


    public function exit(){
        session()->flush();
        return redirect()->route('index');
    }
}
