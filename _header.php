<?
include_once("_dbconfig.php");
include_once("_ggFunctions.php");
if ($user->id == 0) {
    header("location: login.php");
}
?>
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
<!--    <link rel="stylesheet" href="./css/icon.css" type="text/css" />
-->
    <link rel="stylesheet" href="./css/font.css" type="text/css" />
    <link rel="stylesheet" href="./fonts/iconfont.css" type="text/css" />
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
                                          <strong class="font-bold text-lt"><? echo $user->username; ?></strong>
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








                                                                    <li <? if ($mgroup==1) echo "class='active'"; ?>>
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="iconfont icon-service-heart">
                                            </i>
                                            <span class="font-bold">互助管理</span>
                                        </a>
                                                          <!-- 颜色修改 -->
                                        <!--
                                        <ul class="nav dk" style="background-color:#442b8a;">
                                        -->
                                        <ul class="nav dk">
                                                                                    <li>

                                                <a href="dashboard.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>排单列表</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="my_fc_list.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>付出明细</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="my_js_list.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>收获明细</span>
                                                </a>

                                            </li>

                                        </ul>
                                    </li>
                                    <li <? if ($mgroup==2) echo "class='active'"; ?>>
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="iconfont icon-user">
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
                                                    <i class="iconfont icon-add"></i>
                                                    <span>我的推广</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="reg_user.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>会员注册</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="pt_user.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>激活会员</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="tjr_list.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>推荐图谱</span>
                                                </a>

                                            </li>

                                        </ul>
                                    </li>
                                    <li <? if ($mgroup==3) echo "class='active'"; ?>>
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="iconfont icon-coupon">
                                            </i>
                                            <span class="font-bold">财务管理</span>
                                        </a>
                                                          <!-- 颜色修改 -->
                                        <!--
                                        <ul class="nav dk" style="background-color:#442b8a;">
                                        -->
                                        <ul class="nav dk">

                                                                                    <li >

                                                <a href="my_pin1.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>我的激活码</span>
                                                </a>

                                            </li>
                                 <li >

                                                <a href="my_pin2.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>我的排单币</span>
                                                </a>

                                            </li>                                                                                    <li >

                                                <a href="account.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>奖金明细</span>
                                                </a>

                                            </li>

                                        </ul>
                                    </li>
                                    <li <? if ($mgroup==4) echo "class='active'"; ?>>
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="iconfont icon-setup8a">
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
                                                    <i class="iconfont icon-add"></i>
                                                    <span>个人资料</span>
                                                </a>

                                            </li>
                                                                                    <li>

                                                <a href="password.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>修改密码</span>
                                                </a>

                                            </li>

                                        </ul>
                                    </li>
                                    <li <? if ($mgroup==5) echo "class='active'"; ?>>
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="iconfont icon-feedback">
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
                                                    <i class="iconfont icon-add"></i>
                                                    <span>平台公告</span>
                                                </a>

                                            </li>
                                                                                    <li >

                                                <a href="consult.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>在线留言</span>
                                                </a>

                                            </li>

                                        </ul>
                                    </li>


                      <!--
                      <li>
                                        <a href="/index.php?con=ucenter&act=cj" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
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
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="glyphicon glyphicon-camera">
                                            </i>
                                            <span class="font-bold">曝光台</span>
                                        </a>

                                    </li>


                                    <li>
                                        <a href="/index.php?con=ucenter&act=sys_sh" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
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
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="iconfont icon-share">
                                            </i>
                                            <span class="font-bold">推广链接</span>
                                        </a>

                                    </li>



                                    <!--
                                    <li>
                                        <a href="/index.php?con=ucenter&act=on_line_buy" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="glyphicon glyphicon-th">
                                            </i>
                                            <span class="font-bold">我要买码</span>
                                        </a>

                                    </li>


                                    <li>
                                        <a href="/index.php?con=ucenter&act=buy_pin_list" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
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
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
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
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="i i-screen icon">
                                            </i>
                                            <span class="font-bold">互助管理</span>
                                        </a>
                                        <ul class="nav dk">
                                            <li class="active">
                                                <a href="dashboard.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>進行的排單</span>
                                                </a>
                                                <a href="/index.php?con=ucenter&act=my_horg" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>我的交易</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="i i-users2 icon">
                                            </i>
                                            <span class="font-bold">财务管理</span>
                                        </a>
                                        <ul class="nav dk">
                                            <li >
                                                <a href="my_pin.php" class="auto">
                                                    <i class="iconfont icon-add"></i>

                                                    <span>我的PIN</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="account.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>獎金明細</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="/index.php?con=ucenter&act=point_zz" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>積分轉賬</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="/index.php?con=ucenter&act=zz_list" class="auto">
                                                    <i class="iconfont icon-add"></i>

                                                    <span>轉賬記錄</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="i i-users2 icon">
                                            </i>
                                            <span class="font-bold">會員管理</span>
                                        </a>
                                        <ul class="nav dk">
                                            <li >
                                                <a href="my_user.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>我的推廣</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="reg_user.php" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>註冊會員</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="tjr_list.php" class="auto">
                                                    <i class="iconfont icon-add"></i>

                                                    <span>推薦圖譜</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="/index.php?con=ucenter&act=child_pd" class="auto">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>會員排單</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="i i-settings icon">
                                            </i>
                                            <span class="font-bold">賬號設置</span>
                                        </a>
                                        <ul class="nav dk">
                                            <li >
                                                <a href="info.php">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>個人資料</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="password_change.php">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>修改密碼</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <a href="javascript:;" class="auto">
                                            <span class="pull-right text-muted">
                                              <i class="iconfont icon-addition text"></i>
                                              <i class="iconfont icon-addition_fill text-active"></i>
                                            </span>
                                            <i class="fa fa-file-text-o icon">
                                            </i>
                                            <span class="font-bold">信息管理</span>
                                        </a>
                                        <ul class="nav dk">
                                            <li >
                                                <a href="article.php">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>公司動態</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="consult.php">
                                                    <i class="iconfont icon-add"></i>
                                                    <span>我的咨詢</span>
                                                </a>
                                            </li>
                                            <li >
                                                <a href="/index.php?con=ucenter&act=bgt">
                                                    <i class="iconfont icon-add"></i>
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

