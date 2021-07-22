@extends('layout.index')

@section('title','用户修改')

@section('content')
<div class="panel panel-warning ">
    <div class="panel-heading">
        用户修改
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
                <form role="form" action="/admin/user/update/{{$info->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label>用户名</label>
                        <input class="form-control" placeholder="PLease Input UserName" type="text" name="username" value="{{$info->username}}" readonly="true">
                    </div>
                    <div class="form-group">
                        <label>密码</label>
                        <input class="form-control" placeholder="PLease Input Password" type="password" name="password">
                    </div>
                    <div class="form-group">
                        <label>确认密码</label>
                        <input class="form-control" placeholder="PLease Input Password Again" type="password" name="repassword">
                    </div>
                    <div class="form-group">
                        <label>邮箱</label>
                        <input class="form-control" placeholder="PLease Input Email" type="text" name="email" value="{{$info->email}}">
                    </div>
                    <div class="form-group">
                        <label>上传头像</label>
                        <input type="file" name="profile">
                    </div>  
                    <div class="form-group">
                        <label>自我介绍</label>
                        <textarea class="form-control" rows="5" name="intro">{{$info->intro}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection