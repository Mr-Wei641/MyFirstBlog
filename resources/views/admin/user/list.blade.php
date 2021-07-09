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
            <th>操作</th>
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
        "dom":'Bflrtip',
        "buttons": [{
            text: '<i class="fa fa-eye fa-lg" title="显示/隐藏"></i>',
            extend: 'colvis'
        }, {
            text: '<i class="fa fa-clipboard fa-lg" title="复制到剪贴板"></i>',
            extend: 'copy'
        }, {
            text: '<i class="fa fa-file-excel-o fa-lg" title="导出excel"></i>',
            extend: 'excel'
        }, {
            text: '<i class="fa fa-file-pdf-o fa-lg" title="生成pdf"></i>',
            extend: 'pdf'
        },{
            text: '<i class="fa fa-print fa-lg" title="打印"></i>',
            extend: 'print'
        }],
        "order": [1,'asc'],
        "columnDefs":[{
            "orderable": false,
            "searchable":false,
            "className": 'select-checkbox',
            "targets":[0]},{
            "orderable": false,
            "searchable":false,
            "targets": [-1],
            "render":function(data, type, row){
                return '<a href="#editProject" data-toggle="modal" data-id="' + row.id +'" title="修改">' + 
                '<i class="glyphicon glyphicon-pencil"></i> ' + 
                '</a>'+
                '<a href="#delProject" data-toggle="modal" data-id="' + row.id +'" title="删除">' +
                '<i class="glyphicon glyphicon-trash text-danger"></i> ' + 
                '</a>';
            }},
            {
            "orderable": false,
            "targets":[-2]
        }],
        "select": {
            "style":'multi',
            "selector":'td:first-child'
        }
    });
} );</script>
@endsection