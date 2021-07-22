<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //分类列表
        return view('admin.cate.index');
    }
    public function anyData(){
        return Datatables::of(Cate::all())->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    
    {
        //添加分类
        return view('admin.cate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //分类保存
        $this->validate($request,[
            'name' => 'required|unique:cates'
        ],[
            'name.required' => '分类名不能为空',
            'name.unique' => '分类名已存在'
        ]);
        $cate = new Cate;
        $cate->name = $request->input('name');
        $cate->pid = 0;
        $cate->path = 0;
        if($cate->save()){
            return redirect('/admin/cate/create')->with('info','添加成功');
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
        //分类修改页面
        $info = Cate::find($id);
        return view('admin.cate.edit',['info'=>$info]);
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
        //分类修改
        $this->validate($request,[
            'name' => 'required'
        ],[
            'name.required' => '分类名不能为空'
        ]);
        $cate = Cate::find($id);
        $cate->name = $request->input('name');
        if($cate->save()){
            return redirect(route('cate.index'))->with('info','修改成功');
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
        //删除分类
        $cate = Cate::find($id);
        if($cate->delete()){
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');          
        }
    }

    public static function getCates(){
        //获取文章分类
        return Cate::orderBy('id','asc')->get();        
    }
}
