<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //用户添加页面
    public function add(){
        return view('admin.user.add');
    }
    //用户添加
    public function insert(Request $request){
        $request->validate([   
            'username' => 'required|regex:/\w{3,12}/',    
            'password' => 'same:repassword',
            'email' => 'required|email',    
            'intro' => 'required'
        ],[
            'username.regex' => '请填写3-12位的字母数字或者下划线',
            'password.same' => '两次密码输入不一致'
        ]);
        $user = new User;
        $user -> username = $request->input('username');
        $user -> email = $request->input('email');
        $user -> password = Hash::make($request->input('password'));
        $user -> intro = $request->input('intro');
        if($request->hasFile('profile')){
            $path = './uploads/'.date('Ymd');
            $suffix = $request->file('profile')->getClientOriginalExtension();
            $filename = time().rand(100000,999999).'.'.$suffix;
            $request->file('profile')->move($path,$filename);
            $user -> profile = trim($path.'/'.$filename,'.');
        }
        if($user->save()){
            return redirect('/admin/index')->with('info','添加成功');
        }else{
            return back()->with('info','添加失败');
        }   
    }
    //用户列表展示
    public function list(){
        return view('admin.user.list');
    }
}
