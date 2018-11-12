<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public $timestamps = false;

    public static function gx($crowfd_id){
        $myId = 8;
        $f = Follow::where('user_id',$myId)
                    ->where('crowfd_id',$crowfd_id)
                    ->count();
        if($f > 0)
        {
            return 'sc';
        }
        else
        {
           return 'no';
        }
      
    }
}
