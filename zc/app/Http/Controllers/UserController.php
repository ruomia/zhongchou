<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Hash;
use Image;
use Validator;
class UserController extends Controller
{
    public function list(Request $req)
    {
        $user = new User;
        if($req->key)
        {
            $user->where('mobile','like','%$req->key%');
        }
        //排序
        $user->orderBy('id','desc');
        $user = $user->paginate(2);
        return view('user.list',[
            'users'=>$user,
            'req'=>$req,
        ]);
    }
    public function add()
    {
        return view('user.add');
    }
    public function doAdd(Request $req)
    {   
        $user = new User;
        $user->mobile = $req->mobile;
        $password = Hash::make($req->password);
        $user->password = $password;
        if($req->has('face') && $req->face->isValid())
        {
            $date = date('Ymd');
            $face = $req->face->store('face/'.$date);
            $user->face = $face;
        }
        $user->save();
        return redirect()->route('glUser');
    }
    public function del($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('glUser');
    }
}
