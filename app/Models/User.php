<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    //设置添加的字段
    //设置不添加的字段
    protected $guarded = [];
}
