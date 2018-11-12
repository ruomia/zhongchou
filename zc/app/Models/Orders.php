<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $fillable = ['mobile','user_name','return_id','order_num','money','crowfd_id','adress','base'];
    public function crowfds(){
        return $this->belongsTo('App\Models\Crowds','crowfd_id');
    } 
}
