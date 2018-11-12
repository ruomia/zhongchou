<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{    
    public $fillable = ['money','title','content','people_num'];
    public function crowfd(){
        return $this->belongsTo('App\Models\Crowds','crowfd_id');
    }

    public $timestamps = false;
}
