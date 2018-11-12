<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crowds;
use Cache;
use App\Models\Order;
use App\Models\Follow;
use App\Models\Crowd;
use DB;
class IndexController extends Controller
{
   function index(){
       
       $crowdsY = Crowds::where('type','娱乐')
                 ->take(6)
                 ->get();
       $crowdsN = Crowds::where('type','农业')
                 ->take(6)
                 ->get();
          
       $hot6 =  Cache::remember('top6',5,function(){
        return Crowds::orderBy('score','desc')
               ->take(6)
               ->get();
        });
        $top3 =  Cache::remember('top3',5,function(){
            return Crowds::where('is_top','1')
                   ->take(3)
                   ->get();
        });
        // return $top3;
       return view('index.index',['crowdsY'=>$crowdsY,'crowdsN'=>$crowdsN,'hot6'=>$hot6,'top3'=>$top3]);
   }
//   内容页展示
   public function show($id)
    {
        $data = Crowd::with('user')->find($id);
        $orders = Order::findAll($id);
        $ret = DB::table('returns')
                    ->where('crowfd_id',$id)
                    ->get();
        $gx = Follow::gx($id);
        //return $orders;
        $top4 = Crowd::top4();
        return view('index.content',[
            'data'=>$data,
            'orders'=>$orders,
            'top4'=>$top4,
            'ret'=>$ret,
            'gx'=>$gx,
        ]);
    }


    


}
