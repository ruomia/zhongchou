<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests;
use Hash;// 哈希 加密类
use App\Http\Requests\RegistRequests;

class RegistController extends Controller
{
    function regist(){
        return view('regist.regist');
    }

    function doregist(RegistRequests $req){
        // 把密码改为 哈希 加密
        $password = Hash::make($req->password);
        $user = new User;
        $user->mobile = $req->mobile;
        $user->password = $password;
        $user->save();
        
        return redirect()->route('index');

    }

}

