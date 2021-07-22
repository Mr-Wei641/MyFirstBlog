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
            'img' => 'required|image',
            'cate_id' => 'gt:0',
            'tag_id' => 'required'
        ],[
            'title.required' => '请填写文章名',
            'title.unique' => '文章名已存在',
            'cate_id.gt' => '请选择分类',
            'content.required' => '请填写内容',
            'img.required' => '请上传文章主图',
            'tag_id.required' => '请选择文章标签'
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
        //文章详情
        return view('admin.post.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //文章编辑页面
        $cates = CateController::getCates();
        $tags = TagController::getTags();
        $info = Post::find($id);
        $tag = $info->tag()->orderBy('name','asc')->get();
        return view('admin.post.edit',['info'=>$info,'cates'=>$cates,'tags'=>$tags,'tag'=>$tag]);
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
        //文章更新
        $request->validate([   
            'title' => 'required',    
            'content' => 'required',
            'img' => 'required|image',
            'cate_id' => 'gt:0',
            'tag_id' => 'required'
        ],[
            'title.required' => '请填写文章名',
            'cate_id.gt' => '请选择分类',
            'content.required' => '请填写内容',
            'img.required' => '请上传文章主图',
            'tag_id.required' => '请选择文章标签'
        ]);
        $post = Post::find($id);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //文章删除
        $post = Post::find($id);
        if($post->delete()){
            if($post->tag()->sync([])){
                return back()->with('info','删除成功');
            }else{
                return back()->with('info','删除失败');
            }
        }
    } 
}
