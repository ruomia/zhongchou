<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
class TypeController extends Controller
{
    public function list(Request $req)
    {
        $arr = Type::select('*');
        if($req->key)
        {
            $arr->where(function($q) use($req){
                $q->where('type_name','like',"%$req->key%")
                ->orWhere('path','like',"%$req->key%");
            });
        }
        $arr = $arr->get();
        for($i=0;$i<count($arr);$i++)
        {
            //将path拆分分成数组
            $a1 = explode('-',$arr[$i]['path']);
            $len = count($a1);
            $str =  "";
            for($j=0;$j<$len;$j++){
                $str .= "--";
            }
            $arr[$i]['type_name'] = $str."|".$arr[$i]['type_name'];
        }
        return view('type.list',[
            'types'=>$arr,
            'req'=>$req,
        ]);
    }
    public function add()
    {
        $arr = Type::get();
        for($i=0;$i<count($arr);$i++)
        {
            //将path拆分分成数组
            $a1 = explode('-',$arr[$i]['path']);
            $len = count($a1);
            $str =  "";
            for($j=0;$j<$len;$j++){
                $str .= "--";
            }
            $arr[$i]['type_name'] = $str."|".$arr[$i]['type_name'];
        }
        return view('type.add',[
            'types'=>$arr,
        ]);
    }
    public function doAdd(Request $req)
    {
        $data = new Type;
        $type = $req->type;
        if($type=='0')
        {
            $data->pid = 0;
            $data->path = 0;
        }
        else
        {
            $arr = explode("#",$type);
            $data->pid = $arr[0];
            $data->path = $arr[1].'-'.$arr[0];
        }
        $data->type_name = $req->typename;
        $data->save();
        return redirect()->route('glType');
    }
    public function del($id)
    {
        Type::where('id',$id)->delete();
        return redirect()->route('glType');
    }
    public function edit($id)
    {
        $type = Type::where('id',$id)->first();
        $arr = Type::get();
        for($i=0;$i<count($arr);$i++)
        {
            //将path拆分分成数组
            $a1 = explode('-',$arr[$i]['path']);
            $len = count($a1);
            $str =  "";
            for($j=0;$j<$len;$j++){
                $str .= "--";
            }
            $arr[$i]['type_name'] = $str."|".$arr[$i]['type_name'];
        }
        return view('type.edit',[
            'type'=>$type,
            'types'=>$arr,
        ]);
    }
    public function doEdit(Request $req)
    {
    
        $data = array();
        $type = $req->type;
        if($type=='0')
        {
            $data['pid'] = 0;
            $data['path'] = 0;
        }
        else
        {
            $arr = explode("#",$type);
            $data['pid'] = $arr[0];
            $data['path'] = $arr[1].'-'.$arr[0];
        }
        $data['type_name'] = $req->typename;
        Type::where('id',$req->id)->update($data);
        return redirect()->route('glType');
    }
}
