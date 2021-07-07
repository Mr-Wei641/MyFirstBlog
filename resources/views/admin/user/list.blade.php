@extends('layout.index')

@section('title','用户列表')

@section('content')
<table id="table_id_example" class="display">
    <thead>
        <tr>
            <th></th>
            <th>id</th>
            <th>用户名</th>
            <th>邮箱</th>
            <th>个人介绍</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td></td>
            <td>{{$item->id}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->intro}}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('Datatables')
<script>$(document).ready( function () {
    $('#table_id_example').DataTable({
        "dom": '<"top"if>rt<"bottom"lp><"clear">',
        "order": [1,'asc'],
        "columnDefs":[{
            "targets":[0,-1,-2,-3],"orderable":false,
            "targets":[0,-1,-2],"searchable":false,
            "targets":[-1],
            "sortable":false,
                "render":function(data, type, row){
                return '<a href="#" title="详情">' + 
                '<i class="glyphicon glyphicon-eye-open"></i> ' + 
                '</a>'+ 
                '<a href="#editProject" data-toggle="modal" data-id="' + row.p_id +'" title="修改">' + 
                '<i class="glyphicon glyphicon-pencil"></i> ' + 
                '</a>'+
                '<a href="#delProject" data-toggle="modal" data-id="' + row.p_id +'" title="删除">' +
                '<i class="glyphicon glyphicon-trash text-danger"></i> ' + 
                '</a>';
            }
        }]
    });
} );</script>
@endsection