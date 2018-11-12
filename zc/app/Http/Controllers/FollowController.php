<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Follow;
class FollowController extends Controller
{
    public function list()
    {
        $id = DB::table('follows')
                    ->select('crowfd_id')
                    ->where('user_id',session('id'))
                    ->get();
        //转为数组
        $arrId=[];
        foreach($id as $v)
        {
            $arrId[] = $v->crowfd_id;
        }
        $data = DB::table('crowds')
                    ->whereIn('id',$arrId)
                    ->paginate(3);
        return view('user.follow',[
            'crowds'=>$data,
        ]);
    }
    public function del($id)
    {
        DB::table('follows')->where('crowfd_id',$id)->delete();
        return redirect()->route('follow');
    }
    public function sc($crowd_id)
    {
        //获取两人的关系
        $gx = Follow::gx($crowd_id);
        if($gx=='no')
        {
            
            $f  = new Follow;
            $f->user_id =  session('id');
            $f->crowfd_id = $crowd_id;

            $f->save();
            return [
                'errno'=>0,
            ];
        }
        else
        {
            return [
                'errno'=>1,
                'errmsg'=>'已经关注了',
            ];
        }

    }
    public function cancel($crowd_id)
    {
        //获取两人的关系
        $gx = Follow::gx($crowd_id);
        if($gx=='sc')
        {
            
            Follow::where('user_id',session('id'))
                        ->where('crowfd_id',$crowd_id)
                        ->delete();
            return [
                'errno'=>0,
            ];
        }
        else
        {
            return [
                'errno'=>1,
                'errmsg'=>'不能这样做',
            ];
        }

    }
}
