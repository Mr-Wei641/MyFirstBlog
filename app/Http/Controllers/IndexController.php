<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //后台首页
    public function index(){
        return view('admin.index');
    }
}
