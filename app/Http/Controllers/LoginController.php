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
    public function login(Request $request){
        $post = $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);
        $bool =auth()->attempt($post);
        if($bool){
            return view('admin.index');
        }
        return redirect(route('admin.login'))->withErrors(['error'=>'登录失败']);
    }
}
