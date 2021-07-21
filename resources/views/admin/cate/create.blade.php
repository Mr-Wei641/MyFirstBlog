@extends('layout.index')

@section('title','分类添加')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        分类添加
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
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form role="form" action="{{url('/admin/cate')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>添加分类</label>
                        <input class="form-control" placeholder="PLease Input Categories" type="text" name="name" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">确定</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </form>
@endsection