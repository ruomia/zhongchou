<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Hash;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function doLogin(AdminRequest $req)
    {
        $captcha = $req->session()->pull('captcha');
        if($req->captcha='' || $req->captcha != $captcha)
        {
            return back()->withErrors(['capcha'=>'验证码输入错误！']);
        }
        $user = User::where('mobile',$req->mobile)->first();
        if($user)
        {
            //判断密码是否正确
            if(Hash::check($req->password,$user->password))
            {
                session([
                    'id'=>$user->id,
                    'mobile'=>$req->mobile,
                ]);
                return redirect()->route('glUser');
            }
            else
            {
                return back()->withErrors(['password'=>'密码错误！']);
            }
        }
        else{
            return back()->withErrors(['mobile'=>'手机号码不存在！']);
        }
    }
    public function out(Request $req)
    {
        $req->session()->flush();
        return redirect()->route('admin');
    }
}
