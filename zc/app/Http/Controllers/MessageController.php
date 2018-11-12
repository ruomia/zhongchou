<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
class MessageController extends Controller
{
    public function edit()
    {   
        $user = User::where('id',session('id'))
            ->first();
        return view('User.message',[
            'user'=>$user,
        ]);
    }
    public function getData(Request $req)
    {
        return DB::table('city')
                    ->select('id','name','parent_id')
                    ->where('parent_id',$req->pid)
                    ->get();
    }
    public function doEdit(Request $req)
    {
        $arr =array();
        $arr['sex']= $req->sex;
        $arr['province'] = explode("#",$req->province)[1];
        $arr['city'] = explode('#',$req->city)[1];
        $arr['county'] = explode('#',$req->county)[1];
        $arr['description']= $req->description;
        User::where('id',session('id'))
                ->update($arr);
        return redirect()->route('editMes');
     
        
    }
}
