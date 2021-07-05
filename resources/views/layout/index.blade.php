<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- BOOTSTRAP STYLES-->
    <link href={{asset("admin/css/bootstrap.css")}} rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href={{asset("admin/css/font-awesome.min.css")}} rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href={{asset("admin/js/morris/morris-0.4.3.min.css")}} rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href={{asset("admin/css/custom.css")}} rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin/index">博客后台管理</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">最近一次登录时间 : 2021年7月5日 &nbsp; <a href="/admin/login" class="btn btn-danger square-btn-adjust">登出</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src={{asset("/admin/img/find_user.png")}} class="user-image img-responsive" />
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user-md fa-3x"></i> 用户管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/user/add"><i class="fa fa-user-plus fa-2x"></i>用户添加</a>
                            </li>
                            <li>
                                <a href="/admin/user/list"><i class="fa fa-users fa-2x"></i>用户列表</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                @section('content')
                @show
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src={{asset("admin/js/jquery-1.10.2.js")}}></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src={{asset("admin/js/bootstrap.min.js")}}></script>
    <!-- METISMENU SCRIPTS -->
    <script src={{asset("admin/js/jquery.metisMenu.js")}}></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src={{asset("admin/js/morris/raphael-2.1.0.min.js")}}></script>
    <script src={{asset("admin/js/morris/morris.js")}}></script>
    <!-- CUSTOM SCRIPTS -->
    <script src={{asset("admin/js/custom.js")}}></script>


</body>

</html>