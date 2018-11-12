<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
class CommentController extends Controller
{
    public function doAdd(CommentRequest $req)
    {
        $data  =new Comment;
        $data->fill($req->all());
        $data->user_id = session('id');
        $data->save();
        return $data;
    }
    public function list($crowd_id)
    {
        return Comment::where('crowd_id',$crowd_id)
                        ->orderBy('id','desc')
                        ->with('user')
                        ->paginate(3);
    }
}
