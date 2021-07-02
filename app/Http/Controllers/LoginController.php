<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //后台登录页面
    public function index(){
        return view('admin.login');
    }
    //后台登录
    public function login(){
        echo '123';
    }
}
