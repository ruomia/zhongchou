<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
  public function user(){
	  $data = DB::table('users')->paginate(5);
	  return view('admin.list_user',['user'=>$data]);
  }

  public function delete($id){

	  DB::table('users')->delete($id);
	  return view('admin.list_user');
  }

	public function info($id){

		$info = DB::table('users')->leftJoin('crowds')
			->where('user_id',$id)
			->get();
		dd($info);

	}

}
