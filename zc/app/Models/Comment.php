<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content','crowd_id'];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
