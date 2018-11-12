<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\crowd;
use App\Models\user;


use Validator;
use Storage;
use DB;

class CrowdController extends Controller
{

	//众筹管理
	public function crowd(Request $req) {

//		$userid = session('1');

		// 1.  select * from blogs where user_id=xxx
		$data = crowd::where('id','>=',1);

		// 是否有关键字
		if( $req->keyword )
		{
			$data->where(  function($q) use ($req) {
				$q->where('title','like',"%$req->keyword%")
					->orWhere('content','like',"%$req->keyword%");

			});
		}
		// 是否有开始时间
		if( $req->from )
		{
			$data->where('created_at','>=',$req->from);
		}
		// 是否有结束时间
		if( $req->to )
		{
			$data->where('created_at','<=',$req->to);
		}
		// 访问权限
		if( $req->acc )
		{
			$data->where('type',$req->acc);
		}


		/***** 排序 */


		$data->orderBy('created_at',$req->od);


		$data = $data->paginate(6);


		// 显示页面，并把数据传到页面中
		return view('admin.zcguanli', [
			'blogs'=>$data,
			'req' => $req,
		]);

	}
	//删除
	function delete($id){
		crowd::destroy($id);
		return redirect()->route('admin.crowd');
	}
	//置顶
	public function top($aid,$art_id){

		$ding = crowd::find($aid);
//		$ding->adopt = Request('adopt') ? '0' : 1;
		$ding->is_top = $art_id;
		$ding->save();
	}

	//显示审核页
	public function shenhe(Request $req) {

//		$userid = session('1');
//

		/**************** 一、、先创建一个日志对象，并设置了一个user_id的条件 (((((((((((*/
		// 只取自己的日志
		// 1.  select * from blogs where user_id=xxx
		$data = crowd::where('id','>=',1)->where('adopt','=',0);

		// 如果是否有关键字
		if( $req->keyword )
		{
			$data->where(  function($q) use ($req) {
				$q->where('title','like',"%$req->keyword%")
					->orWhere('content','like',"%$req->keyword%");

			});
		}
		// 是否有开始时间
		if( $req->from )
		{
			$data->where('created_at','>=',$req->from);
		}
		// 是否有结束时间
		if( $req->to )
		{
			$data->where('created_at','<=',$req->to);
		}
		// 访问权限
		if( $req->acc )
		{
			$data->where('type',$req->acc);
		}


		/***** 排序 */


		$data->orderBy('created_at',$req->od);


		$data = $data->paginate(6);


		// 显示页面，并把数据传到页面中
		return view('admin.shenhe', [
			'blogs'=>$data,
			'req' => $req,
		]);

	}


	//审核
	public function adopt($aid,$art_id){

		$ding = crowd::find($aid);
//		$ding->adopt = Request('adopt') ? '0' : 1;
		$ding->adopt = $art_id;
		$ding->save();
	}

	//删除审核
	function deleteadopt($id){
		crowd::destroy($id);
		return redirect()->route('crowd.shenhe');
	}




	//显示已通过审核页
	public function tgshenhe(Request $req) {

//		$userid = session('1');

		$data = crowd::where('id','>=',1)->where('adopt','=',1);

		// 如果是否有关键字
		if( $req->keyword )
		{
			$data->where(  function($q) use ($req) {
				$q->where('title','like',"%$req->keyword%")
					->orWhere('content','like',"%$req->keyword%");

			});
		}
		// 是否有开始时间
		if( $req->from )
		{
			$data->where('created_at','>=',$req->from);
		}
		// 是否有结束时间
		if( $req->to )
		{
			$data->where('created_at','<=',$req->to);
		}
		// 访问权限
		if( $req->acc )
		{
			$data->where('type',$req->acc);
		}

		$data->orderBy('created_at',$req->od);
		$data = $data->paginate(6);
		return view('admin.tgshenhe', [
			'blogs'=>$data,
			'req' => $req,
		]);

	}

	//删除已通过审核
	//删除审核
	function deletetg($id){
		crowd::destroy($id);
		return redirect()->route('crowd.tgshenhe');
	}




}
