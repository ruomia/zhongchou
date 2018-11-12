<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PwdRequest;
use App\Models\User;
use Hash;
class PwdController extends Controller
{
    public function edit()
    {
        return view('pwd.edit');
    }
    public function doEdit(PwdRequest $req)
    {
        $id = session('id');
        $user = User::select('password')
                    ->where('id',$id)
                    ->first();
        if(Hash::check($req->oldPassword, $user->password))
        {
            User::where('id',session('id'))
                ->update(['password'=>Hash::make($req->password)]);
            $req->session()->flush();
            return redirect()->route('editPwd');
        }
        else
        {
            return back()->withErrors(['oldPassword'=>'原密码输入错误！']);
        }
    }

}
