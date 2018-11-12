<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Order extends Model
{
    public static function findAll($crowd_id)
    {
        $data = Order::where('crowfd_id',$crowd_id)
                    ->with('user')
                    ->get();
        $sum = Order::where('crowfd_id',$crowd_id)
                    ->sum('money');
        $count = Order::where('crowfd_id',$crowd_id)
                    ->count();
        return [
            'data'=>$data,
            'sum'=>$sum,
            'count'=>$count
        ];

    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function order(){
        return $this->belongsTo('App\Models\crowds','crowfd_id');
    }
}
