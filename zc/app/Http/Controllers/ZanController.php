<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Crowd;
class ZanController extends Controller
{
    public function zan($crowd_id)
    {
        //先判断用户是否已经赞过
        $has = DB::table('dings')
                ->where('user_id',session('id'))
                ->where('blog_id',$crowd_id)
                ->count();
        if($has == 0)
        {
            $crowd_id = (int)$crowd_id;
            if($crowd_id == 0){
                return [
                    'errno'=>1,
                    'errmsg'=>'参数错误，你想干啥！',
                ];
            }
            $crowd = Crowd::find($crowd_id);
            if(!$crowd)
            {
                return [
                    'errno'=>1,
                    'errmsg'=>'参数不正确，你又想干啥！',
                ];
            }
            //	每次点赞，分值加上300（5分钟）
            $crowd->increment('zhan',1,['score'=>DB::raw('score+300')]);
            //记录一下已经顶过了
            $zan = DB::table('dings')
                        ->insert([
                            'user_id'=>session('id'),
                            'blog_id'=>$crowd_id,
                        ]);
            //返回JSON格式的数据
            return [
                'errno'=>0,
            ];  
        }
        else
        {
            return [
                'errno'=>3,
                'errmsg'=>'只能赞一次！',
            ];
        }
    }
}
