<?
$tjr_id = $_GET['tjr_id'];
?>
<!DOCTYPE html>
<html lang="en" class=" ">
<head>
    <meta charset="utf-8" />
    <title>诚信通互助金融</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="./css/bootstrap.css" type="text/css" />

    <link rel="stylesheet" href="./css/animate.css" type="text/css" />
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="./css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="./css/font.css" type="text/css" />
    <link rel="stylesheet" href="./css/app.css" type="text/css" />
    <link rel="stylesheet" href="./css/layerout.css" type="text/css" />

    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.js"></script>



    <!--[if lt IE 9]>
    <script src="./js/ie/html5shiv.js"></script>
    <script src="./js/ie/respond.min.js"></script>
    <script src="./js/ie/excanvas.js"></script>
    <![endif]-->
    <style>
        html{ background: url("/themes/default/images/bg_small.jpg") repeat center 0; padding-top: 10%}
        a.text-white:hover,a.text-white:after{ color: #fff;}
        .tm{
            opacity: 0.8;
        }
    </style>
</head>
<body>









<section class="hbox stretch">
<section>
<section class="vbox">
<section class="scrollable w-f-md" id="bjax-target">
<div class="m-t m-b-lg">

    <div class="clearfix"></div>
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <!-- .breadcrumb -->
        <ul class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> 我的主页</a></li>
            <!--
            <li><a href="javascript:;"></a></li>
            <li class="active"></li>
            -->
        </ul>
        <!-- / .breadcrumb -->
        <div class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>会员注册</strong>
                </header>
                <!--
                <form method="post" action="/index.php?con=ucenter&act=info_add">
                -->
                <div class="panel-body">
                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>推荐人</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="tjrname" readonly id="tjrname" class="form-control parsley-validated" data-required="true" value="<? echo $tjr_id; ?>">
                        </div>
                    </div>

                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>用户名</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" id="name" name="name" class="form-control parsley-validated" data-required="true" placeholder="请输入登录用户名">
                        </div>
                    </div>
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>登录密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="password" name="password" id="password" class="form-control parsley-validated" data-required="true" placeholder="6-20位字母或数字或组合">
                        </div>
                    </div>
                    <!--
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>确认密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="repassword" id="repassword" class="form-control parsley-validated" data-required="true" placeholder="必须和登录密码相同">
                        </div>
                    </div>
                    -->


                     <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>二级密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="password" name="password2" id="password2" class="form-control parsley-validated" data-required="true" placeholder="6-20位字母或数字或组合">
                        </div>
                    </div>
                    <!--
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>确认密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="password" name="repasswordtwo" id="repasswordtwo" class="form-control parsley-validated" data-required="true" placeholder="必须和二级密码相同">
                        </div>
                    </div>
                    -->



                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>真实姓名</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="xm_name" id="xm_name" class="form-control parsley-validated" data-required="true" placeholder="不能為空真实姓名">
                        </div>
                    </div>

                    <!--
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>身份证号码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="sfz" id="sfz" class="form-control parsley-validated" data-required="true" placeholder="本人真实身份证号码">
                        </div>
                    </div>


                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>支付宝账户</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="zhifubao" id="zhifubao" class="form-control parsley-validated" data-required="true" placeholder="不能為空">
                        </div>
                    </div>
                    -->


                    <!--
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs"></span>微信账户</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="weixin" id="weixin" class="form-control parsley-validated" data-required="true" placeholder="选填">
                        </div>
                    </div>
                    -->

                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>手机号码</label>
                        <div class="col-sm-4 m-t-im">
                            <input type="text" name="mobile" id="mobile" class="form-control parsley-validated" data-required="true" placeholder="便于联系和接收短信">
                        </div>
                        <div class="col-sm-2 m-t-im">
                          <input type="button" id="btn_get_validate" onclick="get_validate_code()" class="btn btn-info" value="获取短信验证码"/>
                        </div>
                    </div>

                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>短信验证码</label>
                        <div class="col-sm-6 m-t-im">
                          <input type="text" name="reg_validate_code" id="reg_validate_code" class="form-control parsley-validated">
                        </div>
                    </div>


                  <div class="alert alert-danger" style="display:none;" id="div_warning">
             <strong id="strong_warning">警告！</strong><span id="warning_msg"></span>
          </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im"></label>
                        <div class="col-sm-2 m-t-im">
                          <button type="button" id="btn_reg_user" class="btn btn-info btn-s-xs" onclick="sub_reg_form()">提交</button>
                        </div>
                    </div>
                </div>


            </section>
        </div>


    </div>
  <div class="col-lg-3"></div>
</div>
</section>

</section>
</section>
<!-- side content -->

</section>


<!-- footer -->

<script src="./js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="./js/bootstrap.js"></script>
<!-- App -->
<script src="./js/app.js"></script>
<script src="./js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="./js/app.plugin.js"></script>

<script type="text/javascript">
$(document).ready(function(){

  var msg = $("#invalid").val();

  if(msg != '')
  {
    $("#msg_dialog").show();
    $("#msg_txt").html(msg);
    setTimeout(function(){$("#msg_dialog").hide();},2000);
  }

});

function show_msg(msg)
{
  $("#warning_msg").html(msg);
  $("#div_warning").show();
  setTimeout(function(){$("#div_warning").hide();},1000);
}




function get_validate_code()
{
  var mobile = $.trim($("#mobile").val());
  if(mobile == '')
  {
    show_msg('手机号码不能为空');
    return;
  }
  var mobile_pattern = /^1[3-9]\d{9}$/;
  if(!mobile_pattern.test(mobile))
  {
    show_msg('手机号码不合法');
    return;
  }

  $("#btn_get_validate").attr("disabled", true);
  $.post("sms_reg.php",{mobile:mobile},function(result){
        alert(result);
        $("#btn_get_validate").attr("disabled", false);
    });

}



function sub_reg_form()
{
  var tjrname = $("#tjrname").val();
  //var pin_code = $("#pin_code").val();
  var name = $("#name").val();
  var password = $("#password").val();
  //var repassword = $("#repassword").val();
  var password2 = $("#password2").val();
  //var repassword2=$("#repassword2").val();
  var mobile = $("#mobile").val();
  var xm_name = $("#xm_name").val();

  if(tjrname==null || tjrname == '')
  {
    show_msg("推荐人不能为空");
    return false;
  }
  else
  {
    $.post("/index.php?con=simple&act=check_user_is_exists",{username:tjrname},function(result){
          if(result == 'fail')
          {
            show_msg("您输入的推荐人不存在");
            return false;
          }
      });
  }

  if(name == '')
  {
    show_msg("用户名不能为空");
    return false;
  }

  var name_pattern = /^\w{4,20}$/i;
  if(!name_pattern.test(name))
  {
    show_msg("用户名不合法（4-20位字符、数字组合）");
    return false;
  }
  else
  {
    $.post("/index.php?con=simple&act=check_user_is_exists",{username:name},function(result){
          if(result == 'success')
          {
            show_msg("您输入的用户名已存在");
            return false;
          }
      });
  }

  if(password == '')
  {
    show_msg("登录密码不能为空");
    return false;
  }
  /*
  if(repassword == '')
  {
    show_msg("确认登录密码不能为空");
    return false;
  }
  */

  if(password2 == '')
  {
    show_msg("二级密码不能为空");
    return false;
  }

  /*
  if(repassword2 == '')
  {
    show_msg("确认二级密码不能为空");
    return false;
  }
  */

  var password_pattern= /^\w{6,20}$/i;
  if(!password_pattern.test(password) || !password_pattern.test(password2))
  {
    show_msg("您输入的密码不合法(6-20位字母、数字组合)");
    return false;
  }
  /*
  if(!password_pattern.test(repassword) || !password_pattern.test(repassword2))
  {
    show_msg("密码为6-20位字母数字组合");
    return false;
  }

  if(password != repassword)
  {
    show_msg("登录密码和确认登录密码不一致");
    return false;
  }

  if( password2 != repassword2 )
  {
    show_msg("二级密码和确认二级密码不一致");
    return false;
  }
  */


  if(xm_name == '')
  {
    show_msg("真实姓名不能为空");
    return false;
  }
  /*
  var sfz = $("#sfz").val();
  if(sfz == '')
  {
    show_msg("身份证号码不能为空");
    return false;
  }*/
  var sfz = '';


  if(mobile == '')
  {
    show_msg("手机号码不能为空");
    return false;
  }
  var mobile_pattern = /^1[3-9]\d{9}$/;
  if(!mobile_pattern.test(mobile))
  {
    show_msg("手机号码不合规格");
    return false;
  }

  var reg_validate_code = $.trim( $("#reg_validate_code").val() );
  if( reg_validate_code == '' )
  {
    show_msg("短信验证码不能为空");
    return false;
  }
  var code_pattern = /^\d{6}$/;
  if(!code_pattern.test(reg_validate_code))
  {
    show_msg("短信验证码为6位数字");
    return false;
  }

  var user_id = $("#user_id").val();
  //点击提交后，提交按钮失效
  $("#btn_reg_user").prop("disabled",true);

  $.post("register_add.php", {user_id:user_id,validate_code:reg_validate_code,tjrname:tjrname,name:name,xm_name:xm_name,mobile:mobile,password:password,password2:password2},function(data) {
      if (data['status'] == "success")
      {
        alert("操作成功");
        $("#div_warning").attr("class","alert alert-success");
        $("#strong_warning").remove();
        show_msg("操作成功");
        //document.location.href = document.location.href;
        document.location.href="login.php";
      }
      else
      {
        //show_msg(result['msg']);
        alert(data['status']);
        $("#btn_reg_user").prop("disabled",false);
      }

    },"json");

}
</script>
</body>
</html>
<!--Powered by TinyRise-->