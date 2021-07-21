<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //文章列表显示
        $cates = CateController::getCates();
        $tags = TagController::getTags();
        $users = UserController::getUsers();
        return view('admin.post.index',['cates'=>$cates,'tags'=>$tags,'users'=>$users]);
    }
    public function anyData(){
        return DataTables::of(Post::all())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //文章添加页面
        $cates = CateController::getCates();
        $tags = TagController::getTags();
        return view('admin.post.create',['cates'=>$cates,'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //文章添加
        $request->validate([   
            'title' => 'required|unique:posts',    
            'content' => 'required',
            'img' => 'required|image'
        ],[
            'title.unique' => '文章名已存在'
        ]);
        $post = new Post;
        $post -> title = $request->input('title');
        $post -> content = $request->input('content');
        $post -> user_id = auth()->id();
        $post -> cate_id = $request->input('cate_id');
        if($request->hasFile('img')){
            $path = './uploads/'.date('Ymd');
            $suffix = $request->file('img')->getClientOriginalExtension();
            $filename = time().rand(100000,999999).'.'.$suffix;
            $request->file('img')->move($path,$filename);
            $post -> img = trim($path.'/'.$filename,'.');
        }
        if($post->save()){
            if($post->tag()->sync($request->tag_id)){
                return redirect('/admin/post/create')->with('info','添加成功');
            }else{
                return back()->with('info','添加失败');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    } 
}
