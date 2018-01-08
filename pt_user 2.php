
<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>诚信通互助金融</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="./css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="./css/animate.css" type="text/css" />
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="./css/icon.css" type="text/css" />
    <link rel="stylesheet" href="./css/font.css" type="text/css" />
    <link rel="stylesheet" href="./css/iconfont.css" type="text/css" />
    <link rel="stylesheet" href="./css/app.css" type="text/css" />
    <link rel="stylesheet" href="./css/layerout.css" type="text/css" />



    <script src="./js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="./js/bootstrap.js"></script>
  <!-- App -->
  <script src="./js/app.js"></script>
  <script src="./js/jquery.slimscroll.min.js"></script>
  <script src="./js/jquery.easy-pie-chart.js"></script>
  <script src="./js/app.plugin.js"></script>

    <!--[if lt IE 9]>
    <script src="./js/ie/html5shiv.js"></script>
    <script src="./js/ie/respond.min.js"></script>
    <script src="./js/ie/excanvas.js"></script>
    <![endif]-->


    <style type="text/css">
    .nav-primary ul.nav > li li a:hover{
      color:#177bbb;
      background-color:white;
    }
    .bg-primary .nav > li:hover > a, .bg-primary .nav > li:focus > a, .bg-primary .nav > li:active > a, .bg-primary .nav > li.active > a {
        color: #177bbb;
        background-color:#333;
    }
    .bg-primary .nav>li.active>a{
      background-color:#126da7;
      color: #FFF;
      padding:8px 15px;
    }

   </style>


</head>
<body class="">
<section class="vbox">
    <header class="bg-black header header-md navbar navbar-fixed-top-xs box-shadow">
        <div class="navbar-header aside-md">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                <i class="fa fa-bars"></i>
            </a>
            <a href="dashboard.php" class="navbar-brand">
                <img src="./images/logo.png" class="m-r-sm" alt="scale">
                <span class="hidden-nav-xs text-white">诚信通互助金融</span>
            </a>

        </div>


        <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
            <li class="dropdown">
                <!--
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                -->
                <a href="logout.php" class="dropdown-toggle" onclick="return confirm('确定要执行此操作吗?')">
                <!--
                <span class="thumb-sm avatar pull-left">
                  <img src="./images/a0.png" alt="...">
                </span>
                -->
                                  安全退出 <!-- <b class="caret"></b> -->
                </a>
                <!--
                <ul class="dropdown-menu animated fadeInRight">
                    <li>
                        <span class="arrow top"></span>
                        <a href="/index.php?con=ucenter&act=set_language&type=sc">简体中文</a>
                    </li>
                    <li>
                        <a href="/index.php?con=ucenter&act=set_language&type=fc">繁體中文</a>
                    </li>
                    <li>
                        <a href="/index.php?con=ucenter&act=set_language&type=en">English</a>
                    </li>
                </ul>
                -->
            </li>
        </ul>
    </header>
    <section>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-primary aside-md hidden-print hidden-xs" id="nav" style="width:260px;">
                <section class="vbox">
                    <section class="w-f scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                            <div class="clearfix wrapper dk nav-user hidden-xs">
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                    <!--
                                      <span class="thumb avatar pull-left m-r">
                                        <img src="./images/a0.png" class="dker" alt="...">
                                      </span>
                                      -->
                                      <span class="hidden-nav-xs clear">
                                        <span class="block m-t-xs" style="font-size:23px;">
                                        欢迎您&nbsp;&nbsp;
                                          <strong class="font-bold text-lt">gaozong</strong>
                                          <!--
                                          <b class="caret"></b>
                                          -->
                                        </span>
                                        <!--
                                        <span class="text-muted text-xs block">我的主页</span>
                                        -->
                                      </span>
                                    </a>
                                    <!--
                                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                        <li>
                                            <span class="arrow top hidden-nav-xs"></span>
                                            <a href="dashboard.php">
                                                  我的主页                                            </a>
                                        </li>
                                        <li>
                                            <a href="info.php">账号设置</a>
                                        </li>
                                        <li>
                                            <a href="logout.php">退出</a>
                                        </li>
                                    </ul>
                                    -->
                                </div>
                            </div>


                            <!-- nav -->
                            <nav class="nav-primary hidden-xs">
                                <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">中心导航</div>

                                <ul class="nav nav-main" data-ride="collapse" style="font-size:21px;">








                                                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="i i-screen icon">
                                            </i>
                                            <span class="font-bold">互助管理</span>
                                        </a>
                                                          <!-- 颜色修改 -->
                                        <!--
                                        <ul class="nav dk" style="background-color:#442b8a;">
                                        -->
                                        <ul class="nav dk">
                                                                                    <li >

                                                <a href="dashboard.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>排单列表</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="my_fc_list.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>付出明细</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="my_js_list.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>收获明细</span>
                                                </a>

                                            </li>

                                        </ul>
                                    </li>
                                                                    <li class="active">
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="i i-users2 icon">
                                            </i>
                                            <span class="font-bold">会员管理</span>
                                        </a>
                                                          <!-- 颜色修改 -->
                                        <!--
                                        <ul class="nav dk" style="background-color:#442b8a;">
                                        -->
                                        <ul class="nav dk">
                                                                                    <li >

                                                <a href="my_user.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>我的推广</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="reg_user.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>会员注册</span>
                                                </a>

                                            </li>
                                                                                    <li class="active">

                                                <a href="pt_user.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>激活会员</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="tjr_list.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>推荐图谱</span>
                                                </a>

                                            </li>

                                        </ul>
                                    </li>
                                                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="glyphicon glyphicon-usd">
                                            </i>
                                            <span class="font-bold">财务管理</span>
                                        </a>
                                                          <!-- 颜色修改 -->
                                        <!--
                                        <ul class="nav dk" style="background-color:#442b8a;">
                                        -->
                                        <ul class="nav dk">
                                                                                    <li >

                                                <a href="my_pin.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>我的排单币</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="my_vb.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>我的激活码</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="account.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>奖金明细</span>
                                                </a>

                                            </li>

                                        </ul>
                                    </li>
                                                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="i i-settings icon">
                                            </i>
                                            <span class="font-bold">账号设置</span>
                                        </a>
                                                          <!-- 颜色修改 -->
                                        <!--
                                        <ul class="nav dk" style="background-color:#442b8a;">
                                        -->
                                        <ul class="nav dk">
                                                                                    <li >

                                                <a href="info.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>个人资料</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="password_change.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>修改密码</span>
                                                </a>

                                            </li>

                                        </ul>
                                    </li>
                                                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="fa fa-file-text-o icon">
                                            </i>
                                            <span class="font-bold">信息管理</span>
                                        </a>
                                                          <!-- 颜色修改 -->
                                        <!--
                                        <ul class="nav dk" style="background-color:#442b8a;">
                                        -->
                                        <ul class="nav dk">
                                                                                    <li >

                                                <a href="article.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>平台公告</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="consult.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>在线留言</span>
                                                </a>

                                            </li>

                                        </ul>
                                    </li>


                      <!--
                      <li>
                                        <a href="/index.php?con=ucenter&act=cj" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="glyphicon glyphicon-user">
                                            </i>
                                            <span class="font-bold">幸运抽奖</span>
                                        </a>

                                    </li>
                                  -->

                                   <!--
                                  <li>
                                        <a href="/index.php?con=ucenter&act=bgt" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="glyphicon glyphicon-camera">
                                            </i>
                                            <span class="font-bold">曝光台</span>
                                        </a>

                                    </li>


                                    <li>
                                        <a href="/index.php?con=ucenter&act=sys_sh" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="glyphicon glyphicon-camera">
                                            </i>
                                            <span class="font-bold">资料完善</span>
                                        </a>

                                    </li>
                                     -->
                                    <li>
                                        <a href="ref_link.php" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="glyphicon glyphicon-qrcode">
                                            </i>
                                            <span class="font-bold">推广链接</span>
                                        </a>

                                    </li>



                                    <!--
                                    <li>
                                        <a href="/index.php?con=ucenter&act=on_line_buy" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="glyphicon glyphicon-th">
                                            </i>
                                            <span class="font-bold">我要买码</span>
                                        </a>

                                    </li>


                                    <li>
                                        <a href="/index.php?con=ucenter&act=buy_pin_list" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="glyphicon glyphicon-th-list">
                                            </i>
                                            <span class="font-bold">购码记录</span>
                                        </a>

                                    </li>
                                    -->


                                    <!--
                                    <li>
                                        <a href="/index.php?con=ucenter&act=cx_shop" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="glyphicon glyphicon-shopping-cart">
                                            </i>
                                            <span class="font-bold">兴中天商城</span>
                                        </a>
                                    </li>
                                    -->

                                  <!--
                                    <li class="active">
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="i i-screen icon">
                                            </i>
                                            <span class="font-bold">互助管理</span>
                                        </a>
                                        <ul class="nav dk">
                                            <li class="active">
                                                <a href="dashboard.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>進行的排單</span>
                                                </a>
                                                <a href="/index.php?con=ucenter&act=my_horg" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>我的交易</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="i i-users2 icon">
                                            </i>
                                            <span class="font-bold">财务管理</span>
                                        </a>
                                        <ul class="nav dk">
                                            <li >
                                                <a href="my_pin.php" class="auto">
                                                    <i class="i i-dot"></i>

                                                    <span>我的PIN</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="account.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>獎金明細</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="/index.php?con=ucenter&act=point_zz" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>積分轉賬</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="/index.php?con=ucenter&act=zz_list" class="auto">
                                                    <i class="i i-dot"></i>

                                                    <span>轉賬記錄</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="i i-users2 icon">
                                            </i>
                                            <span class="font-bold">會員管理</span>
                                        </a>
                                        <ul class="nav dk">
                                            <li >
                                                <a href="my_user.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>我的推廣</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="reg_user.php" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>註冊會員</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="tjr_list.php" class="auto">
                                                    <i class="i i-dot"></i>

                                                    <span>推薦圖譜</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="/index.php?con=ucenter&act=child_pd" class="auto">
                                                    <i class="i i-dot"></i>
                                                    <span>會員排單</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="i i-settings icon">
                                            </i>
                                            <span class="font-bold">賬號設置</span>
                                        </a>
                                        <ul class="nav dk">
                                            <li >
                                                <a href="info.php">
                                                    <i class="i i-dot"></i>
                                                    <span>個人資料</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="password_change.php">
                                                    <i class="i i-dot"></i>
                                                    <span>修改密碼</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="i i-circle-sm-o text"></i>
                                              <i class="i i-circle-sm text-active"></i>
                                            </span>
                                            <i class="fa fa-file-text-o icon">
                                            </i>
                                            <span class="font-bold">信息管理</span>
                                        </a>
                                        <ul class="nav dk">
                                            <li >
                                                <a href="article.php">
                                                    <i class="i i-dot"></i>
                                                    <span>公司動態</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="consult.php">
                                                    <i class="i i-dot"></i>
                                                    <span>我的咨詢</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="/index.php?con=ucenter&act=bgt">
                                                    <i class="i i-dot"></i>
                                                    <span>曝光臺</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    -->
                                </ul>
                            </nav>

                        </div>
                    </section>
                    <footer class="footer hidden-xs no-padder text-center-nav-xs">
                        <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                            <i class="i i-circleleft text"></i>
                            <i class="i i-circleright text-active"></i>
                        </a>
                    </footer>
                </section>
            </aside>
            <!-- /.aside -->
            <section id="content">


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">激活会员</h4>
      </div>
      <div class="modal-body" id="myModalContent">

        <!-- 被激活人的用户id -->
        <input type="hidden" name="user_id" id="user_id"/>

        <dl>
          <dt>可用余额码：</dt>
          <dd>100个</dd>
        </dl>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <!--
        <button type="button" class="btn btn-primary">Save changes</button>
        -->
      </div>
    </div>
  </div>
</div>










<section class="hbox stretch">
<section>
<section class="vbox">
<section class="scrollable w-f-md" id="bjax-target">
<div class="m-t m-b-lg">

    <div class="clearfix"></div>
    <div class="col-lg-12">
        <!-- .breadcrumb -->
        <ul class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-home"></i> 我的主页</a></li>
            <li><a href="javascript:;">会员管理</a></li>
            <li class="active">激活会员</li>
        </ul>
        <!-- / .breadcrumb -->
        <form class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>激活会员</strong>
                    &nbsp;&nbsp;剩余可用激活码：<b style="color:red;">1</b> 个
                </header>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im">输入账号</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="uname" id="uname" class="form-control parsley-validated" data-required="true" value="" placeholder="输入要查询的会员账号">
                        </div>
                        <div class="col-sm-2 m-t-im">
                            <button type="button" class="btn btn-info btn-s-xs" onclick="tui_search()">查询</button>
                        </div>
                    </div>
                    <!----end form-group--->
                </div>
                <div class="table-responsive" style="border: none">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>会员账号</th>
                            <th>状态</th>
                            <th>操作</th>
                            <th>真实姓名</th>

                            <th>电话</th>

                            <th>注册时间</th>

                        </tr>
                        </thead>
                        <tbody>
                                                  <tr>
                <td>gao001</td>
                <td>

                                          <b style="color:green">正常</b>





                </td>
                    <td>
                                              暂无
                                          </td>
                <td>
                                  GOYTIANSENG                               </td>

                <td>
                                      18320998902                                 </td>

                <td>2017-12-19 20:32:14</td>

              </tr>
                                                  <tr>
                <td>chenyi</td>
                <td>

                                          <b style="color:green">正常</b>





                </td>
                    <td>
                                              暂无
                                          </td>
                <td>
                                  陈晓红                               </td>

                <td>
                                      13058098989                                 </td>

                <td>2017-12-18 18:59:22</td>

              </tr>

                        </tbody>
                    </table>
                </div>

                <footer class="panel-footer">
                    <div class="text-center text-center-xs">
                      <div style="z-index: 2;
                  color: #788188;
                  cursor: default;
                  border-color: #428BCA;">
                          总计 2 条记录 1 ／ 1 页<a href=pt_user.php&p=1>第一页</a> <span href=pt_user.php&p=1 class='disabled'>上一页</span> <span href=pt_user.php&p=2 class='disabled'>下一页</span> <a href=pt_user.php&p=1>最后一页</a> 到第 <select id='select' onchange='window.location.href="pt_user.php&p="+this.value'><option value='1' selected>1</option></select> 页                         </div>

                    </div>
                </footer>

            </section>
        </form>




    </div>
</div>
</section>

</section>
</section>
<!-- side content -->

</section>
<script type="text/javascript">



  $(document).ready(function(){

    $("#btn_jihuo1").click(function(){
      var alive_mode = parseInt($("#alive_mode").val());
      var user_id = $("#user_id").val();
      var alive_bdb = $.trim($("#jhf_1").val());

      alive_user_account(user_id, 79, alive_mode);

    });

    $("#btn_jihuo2").click(function(){
      var alive_mode = parseInt($("#alive_mode").val());
      var user_id = $("#user_id").val();
      //至少50%
      var jhf = parseFloat($.trim($("#jhf_2").val()));
      //最多50%
      var dhf = parseFloat($.trim($("#dhf_2").val()))
      //激活所需的报单币
      var alive_bdb = parseFloat($("#alive_bdb").val());

      var center_je = alive_bdb * 0.5;

      if(jhf<=0 || isNaN(jhf))
      {
        alert('激活分必须为大于0的数字');
        return false;
      }

      if(dhf<=0 || isNaN(dhf))
      {
        alert('兑换分必须为大于0的数字');
        return false;
      }

      if( jhf < center_je )
      {
        alert("激活分至少得"+center_je);
        return false;
      }

      if( dhf > center_je )
      {
        alert("兑换分不能超过"+center_je);
        return false;
      }

      if(jhf + dhf != alive_bdb)
      {
        alert("激活分加上兑换分必须等于"+alive_bdb);
        return false;
      }

      alive_user_account(user_id, 79, alive_mode);

    });
  });

function tui_search()
{
  var uname = $("#uname").val();

  var url = "pt_user.php";

  if(uname == null || uname == "")
  {
    document.location.href= url;
  }
  else
  {
    document.location.href = url+"&uname="+uname;
  }
}

/**
 * 删除没有激活的会员
 */
function del_no_alive_user(no_alive_user_id)
{
  if(confirm("确定要执行此操作吗？"))
  {
    $("#btn_del").attr("disabled", true);
    $.post("/index.php?con=ucenter&act=del_no_alive_user",{no_alive_user_id:no_alive_user_id},function(result){

          var result = eval("("+result+")");
        if(result['status'] == 'success')
        {
          alert("操作成功");
          //$("#div_warning").attr("class","alert alert-success");
          //$("#strong_warning").remove();
          //show_msg("操作成功");
          //document.location.href = document.location.href;
          document.location.href = "pt_user.php";
        }
        else
        {
          //show_msg(result['msg']);
          alert(result['msg']);
          $("#btn_del").attr("disabled", false);
          //document.location.href = "pt_user.php";
        }

      });
  }

}

function alive_do(user_id)
{
  //被激活人用户id
  $("#user_id").val( user_id );

  var pt_user_id = parseInt("79");
  var ky_pin_code = parseInt("1");
  if(ky_pin_code < 1)
  {
    alert("激活码余额不足");
    return false;
  }
  //$("#myModal").modal();
  if(window.confirm("需要消耗您1个激活码，确定要执行此操作吗？"))
  {
    $("#btn_alive").attr("disabled", true);
    $.post("/index.php?con=ucenter&act=alive_user_account",{user_id:user_id,pt_user_id:pt_user_id},function(result){

          var result = eval("("+result+")");
        if(result['status'] == 'success')
        {
          alert("操作成功");

          document.location.href = "pt_user.php";
        }
        else
        {
          alert(result['msg']);
          document.location.href = "pt_user.php";
        }

      });

  }


}
</script>
            </section>
        </section>
    </section>
</section>



<script type="text/javascript">
/*
window.onbeforeunload = function (e) {
    e = e || window.event;
    var y = e.clientY
    if (y <= 0
    || y >= Math.max(document.body.clientHeight, document.documentElement.clientHeight)
    )
        e.returnValue = "确认关闭浏览器窗口？！！";
    //清空cookie
    $.cookie("autologin",null,0);
    $.post("logout.php_again",function(){});

    var keys=document.cookie.match(/[^ =;]+(?=\=)/g);
    if (keys) {
        for (var i =  keys.length; i--;)
            document.cookie=keys[i]+'=0;expires=' + new Date( 0).toUTCString()
    }
}



$("ul[class='nav dk'] li").click(function(){

  //$(this).attr("class","active");
  $(this).parent().attr("disabled","block");
  $(this).parents("li").attr("class","active");

});
*/
</script>

</body>
</html>
<!--Powered by TinyRise-->