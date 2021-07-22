@extends('layout.index')

@section('title','文章列表')

@section('content')
<table id="table_id_post" class="display">
    <thead>
        <tr>
            <th></th>
            <th>id</th>
            <th>标题</th>
            <th>内容</th>
            <th>作者</th>
            <th>分类</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>id</th>
            <th>标题</th>
            <th>内容</th>
            <th>作者</th>
            <th>分类</th>
            <th>操作</th>
        </tr>
    </tfoot>
</table>
@endsection

@section('Datatables')
<script>
var users = {!!$users!!};
var cates = {!!$cates!!};
var tags = {!!$tags!!};
$(document).ready( function () {
    $('#table_id_post').DataTable({
        "dom":'Bflrtip',
        "processing":true,
        "serverSide":true,
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "所有"] ],
        "order": [1,'asc'],
        "ajax":{
            "url":"/admin/post/anyData",
            "type":"get"
        },
        "columns":[
            {"data":"bbb","defaultContent":""},
            {"data":"id"},
            {"data":"title"},
            {"data":"content"},
            {"data":"user_id"},
            {"data":"cate_id"},
            {"data":"aaa","defaultContent":"操作"}
        ],
        "columnDefs":[{ 
            "orderable": false,
            "className": 'select-checkbox',
            "targets":[0]},{
            "render":function(data, type, row){
                for(i=0;i<users.length;i++){
                    if(users[i].id == data){
                        return users[i].username;
                    }
                }
            },
            "targets": [4]},{
            "render":function(data, type, row){
                for(i=0;i<cates.length;i++){
                    if(cates[i].id == data){
                        return cates[i].name;
                    }
                }
            },
            "targets": [-2]},{
            "orderable": false,
            "render":function(data, type, row){
                return '<form action="/admin/post/' + row.id +'" method="post">' +
                '<a href="/admin/post/' + row.id +'/edit" title="修改">' + 
                '<i class="glyphicon glyphicon-pencil"></i> ' + 
                '</a>' +
                '<input class="btn btn-danger btn-xs" type="submit" value="删除" />' +
                '<input type="hidden" name="_method" value="DELETE">' +
                '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                '</form>';
            },
            "targets": [-1]}
        ],
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