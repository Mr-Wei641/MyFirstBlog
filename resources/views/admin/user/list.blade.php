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
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>id</th>
            <th>用户名</th>
            <th>邮箱</th>
            <th>个人介绍</th>
            <th>操作</th>
        </tr>
    </tfoot>
</table>
@endsection

@section('Datatables')
<script>$(document).ready( function () {
    $('#table_id_example').DataTable({
        "dom":'Bflrtip',
        "processing":true,
        "serverSide":true,
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "所有"] ],
        "order": [1,'asc'],
        "ajax":{
            "url":"/admin/user/anyData",
            "type":"get"
        },
        "columns":[
            {"data":"bbb","defaultContent":""},
            {"data":"id"},
            {"data":"username"},
            {"data":"email"},
            {"data":"intro"},
            {"data":"aaa","defaultContent":"操作"}
        ],
        "columnDefs":[{ 
            "orderable": false,
            "className": 'select-checkbox',
            "targets":[0]},{
            "orderable": false,
            "render":function(data, type, row){
                return '<a href="/admin/user/edit/' + row.id +'"  data-toggle="modal" title="修改">' + 
                '<i class="glyphicon glyphicon-pencil"></i> ' + 
                '</a>' + 
                '<a href="/admin/user/delete/' + row.id +'" data-toggle="modal" title="删除">' +
                '<i class="glyphicon glyphicon-trash text-danger"></i> ' + 
                '</a>';
            },
            "targets": [-1]},   
            {
            "orderable": false,
            "targets":[-2]
        }],
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
        "select": {
            "style":'multi',
            "selector":'td:first-child'
        }
    });
});</script>
@endsection