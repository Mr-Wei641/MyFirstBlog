<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    //
    protected $guarded = [];
}
