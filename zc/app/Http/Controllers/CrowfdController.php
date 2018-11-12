<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckcrowdsRequest;
use App\Http\Requests\Check_orders_Requests;
use App\Models\Crowds;
use App\Models\Returns;
use App\Models\Orders;

use DB;
use App\Models\order;
class CrowfdController extends Controller
{
    public function add(){
        return view('crowfds.add');
    }
    public function doadd(CheckcrowdsRequest $req){       
        $crowds = new Crowds;     
        $crowds->fill($req->except('re'));
        $crowds->user_id = session('id');
        if($req->has("id_imgz") && $req->id_imgz->isValid()){
            $date = date('Ymd');
            //  保存图片 获取返回图片路径 （这里保存未处理的图片）
            $crowds->id_imgz = $req->id_imgz->store('id_img/'.$date);
            }
            if($req->has("id_imgf") && $req->id_imgf->isValid()){
                $date = date('Ymd');
                //  保存图片 获取返回图片路径 （这里保存未处理的图片）
                $crowds->id_imgf = $req->id_imgf->store('id_img/'.$date);
            }
            if($req->has("crowfd_img") && $req->crowfd_img->isValid()){
                $date = date('Ymd');
                //  保存图片 获取返回图片路径 （这里保存未处理的图片）
                $crowds->crowfd_img = $req->crowfd_img->store('crowfd_img/'.$date);
            }
            $crowds->score = time(); 
        $crowds->save();
       
       $img = [];
       $data = [];
       foreach($req->re as $v)
       { 
           $date = date('Ymd');
           $img[] =  $v['img']->store('returns/'.$date);
           $data[] = $v;
       }
       for($i=0;$i<count($data);$i++){
           $data[$i]['img'] = $img[$i];
           $data[$i]['crowfd_id'] = $crowds->id;
       } 
        Returns::insert($data);
        return redirect()->route('crowds.doadd');
        
    }


    //订单显示
    public function buy($id){ 
       $orders = Returns::where('crowfd_id',$id)
                 ->get();
       return view('crowfds.buy',['orders'=>$orders,'crowfd_id'=>$id]);
    }
    //提交订单 
    public function dobuy(Check_orders_Requests $req){
        $crowds =  Crowds::where('id',$req->crowfd_id)
                ->first();
       $orders = new Orders;     
       $orders->fill($req->all());
       $orders->user_id = session('id'); //修改
       $orders->crowfd_title = $crowds->title;
       $orders->save();
       $crowds = Crowds::find($req->crowfd_id);
       $crowds->money = $crowds->money + $req->money;
       $num = $crowds->money + $req->money;
       
       if($num >= $crowds->target){
          $crowds->is_end = 2;
       }
       $crowds->save();
       return redirect()->route('index');
    }



    // 三级列表查询
    public function list(Request $req){
        $crowds = Crowds::where('id','>=','1');
        if($req->type){
            $crowds->where('type',$req->type);
            session(['type'=>$req->type]);
        }else {
            if($req->session()->has('type')){
                // return disable;
                $type = session('type'); 
                $crowds->where('type',$type); 
            }
        }

        if($req->disable=="1"){
            // return 'disable';
            $crowds->where('is_end',"1");
            session(['disable'=>"1"]);
        }else if($req->disable=="2"){
            $crowds->where('is_end',"2"); 
            session(['disable'=>"2"]);
        }else{
            // return 'disable';
            if($req->session()->has('disable')){
                // dd(session('disable'));
                $disable = session('disable');
                $crowds->where('is_end',$disable);
            }
        }
        
        if($req->orderby){
            $crowds->orderBy($req->orderby,'desc');
            session(['orderby'=>$req->orderby]);
        }else{
            if($req->session()->has('orderby')){
                // dd(session('orderby'));
                $orderby = session('orderby');
                $crowds->orderBy($orderby,'desc');
            }
        }
        
        $crowds = $crowds->paginate(1);
        // return $crowds;
        return view('crowfds.list',['crowds'=>$crowds,'type'=>session(),'disable'=>session('disable'),'orderby'=>session('orderby')]);
    }


    
    

    //我的发起
    public function myfaqi()
	{

		$userid = session('id');
		
		$data = crowds::where('user_id', $userid)->paginate(5);
		return view('crowfds.myfaqi', ['faqi' => $data]);
	}
    // 我的发起删除
	public function faqidelete($id){
		$faqi = crowds::find($id);
		if($faqi->user_id != session('id'))
			return back();
		$faqi->delete();
		return redirect()->route('myfaqi');

	}
    // 我的订单
	public function myorder(){
    	$userid = session('id');
        $mydata=order::where('user_id',$userid)->orderBy('id','desc')
            ->get();
            // return $mydata;
		return view('crowfds.myorder',['myorder'=>$mydata]);
	}
}
