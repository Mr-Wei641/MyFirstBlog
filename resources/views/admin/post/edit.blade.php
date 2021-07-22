@extends('layout.index')

@section('title','文章修改')

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading">
        文章修改
    </div>
    @if ($errors->any())  
  <div class="alert alert-danger">     
     <ul>
       @foreach ($errors->all() as $error)                
       <li>{{ $error }}</li>
            @endforeach
      </ul>    
   </div>
    @endif
    {{csrf_field()}}
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form role="form" action="/admin/post/{{$info->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label>文章名</label>
                        <input class="form-control" placeholder="PLease Input PostName" type="text" name="title" value="{{$info->title}}">
                    </div>
                    <div class="form-group">
                        <label>文章分类</label>
                        <select class="form-control" name="cate_id">
                            <option value="0">请选择</option>
                            @foreach($cates as $k=>$v)
                            <option value="{{$v->id}}"<?php if($v->id == $info->cate_id){echo 'selected';}?> >{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>文章主图</label>
                        <input type="file" name="img">
                    </div>
                    <div class="form-group">
                        <label>文章标签</label>
                        <div class="checkbox">
                            @foreach($tags as $k=>$v)
                            <label><input type="checkbox" name="tag_id[]" value="{{$v->id}}" <?php foreach($tag as $kk=>$vv){if($v->id == $vv->id){echo 'checked';}} ?>>{{$v->name}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label>文章内容</label>
                        <textarea class="form-control" placeholder="PLease Input Content" name="content" rows="10">{{$info->content}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection