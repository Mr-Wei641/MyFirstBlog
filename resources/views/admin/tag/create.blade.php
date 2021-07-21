@extends('layout.index')

@section('title','标签添加')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        标签添加
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
                <form role="form" action="{{url('/admin/tag')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>添加标签</label>
                        <input class="form-control" placeholder="PLease Input Tags" type="text" name="name" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">确定</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </form>
@endsection