<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //标签列表
        return view('admin.tag.index');
    }
    public function anyData(){
        return DataTables::of(Tag::all())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //标签添加页面
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //标签添加
        $this->validate($request,[
            'name' => 'required|unique:tags'
        ],[
            'name.required' => '标签名不能为空',
            'name.unique' => '标签名已存在'
        ]);
        $tag = new Tag;
        $tag->name = $request->input('name');
        if($tag->save()){
            return redirect('/admin/tag/create')->with('info','添加成功');
        }else{
            return back()->with('info','添加失败');
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
        //修改标签
        $info = Tag::find($id);
        return view('admin.tag.edit',['info'=>$info]);
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
        //标签修改
        $this->validate($request,[
            'name' => 'required'
        ],[
            'name.required' => '标签名不能为空'
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->input('name');
        if($tag->save()){
            return redirect(route('tag.index'))->with('info','修改成功');
        }else{
            return back()->with('info','修改失败');
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
        //删除标签 
        $tag = Tag::find($id);
        if($tag->delete()){
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');          
        }
    }

    public static function getTags(){
        //获取文章标签
        return Tag::orderBy('id','asc')->get();
    }
}
