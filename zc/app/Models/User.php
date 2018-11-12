<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //设置白名单
    protected $fillable = ['mobile','password'];
}
