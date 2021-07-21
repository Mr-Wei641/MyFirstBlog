@extends('layout.index')

@section('title','标签修改')

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading">
        标签修改
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form role="form" action="/admin/tag/{{$info->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label>修改标签</label>
                        <input class="form-control" placeholder="PLease Input Tags" type="text" name="name" value="{{$info->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">确定</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </form>
@endsection