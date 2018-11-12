<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crowds extends Model
{
    public $fillable = ['id_card','link_man','link_phone','type','id_imgz','id_imgf','crowfd_img','title','aim','target','day','tag',];
    public function user(){
        return $this->belongsTo('App\Models\Users','user_id');
    }
}
