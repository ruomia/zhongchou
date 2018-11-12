<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Crowd extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public static function top4()
    {
        return Crowd::select('crowfd_img','title','money','day','id')
                    ->where('is_top',1)
                    ->orderBy(DB::raw('RAND()'))
                    ->take(4)
                    ->get();
    }

}
