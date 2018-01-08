<?
include("_login_chk.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=EDGE, chrome=1">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="format-detection" content="telephone=no" />
    <meta charset="UTF-8">
    <title>诚信通互助金融</title>
    <link rel="stylesheet" href="./css/clear.css">
    <link rel="stylesheet" href="./css/pc-login.css">
    <link rel="stylesheet" href="./css/bootstrap.css" type="text/css" />

    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    </head>
<body>
  <div class="pc-login">
    <!--背景图-->
    <img src="./images/pc-login-bj.jpg" alt="登录界面背景">
    <div class="pc-login-main">
        <!--登录框-->
        <div class="pc-login-box">
            <h3>登录<img src="./images/LogIN.png" alt="登录"></h3>
            <ul class="pc-login-mes">
                <li><span>帐&nbsp;&nbsp;&nbsp;号</span>
                  <input type="text" placeholder="请输入用户名" name="name" id="name">
                </li>
                <li><span>密&nbsp;&nbsp;&nbsp;码</span>
                  <input type="password" placeholder="请输入密码" name="password" id="password">
                </li>
                <li>
                  <span>验证码</span>
                  <input type="text" placeholder="请输入验证码" id="verifyCode" name="verifyCode" class="pc-input-yzm">
                  <a style="margin-left:-10px;" href="javascript:void(0)" class="red" onclick="document.getElementById('captcha_img').src='captcha.php?&random='+Math.random()">
              <img id="captcha_img" src="captcha.php?&random="+Math.random() width="120px;" height="100%">
          </a>

                </li>
                <li><input type="button" id="btn_login" value="登录" class="pc-login-button" onclick="sub_login_form()"></li>
            </ul>
            <p class="pc-login-jz"><a href="###" class="pc-login-jzmm">记住密码</a><a href="#forgetPW_modal" data-toggle="modal" class="pc-login-zhmm">找回密码</a></p>
        </div>
        <!--名称信息-->
        <div class="pc-login-name" style="color:white;">
            <div class="pc-login-name-left">
                <b>诚信通互助金融</b>
            </div>
            <div class="pc-login-name-right">
                 <P>Chengxintong management center</p>
            </div>
            <div class="pc-login-name-bottom">

            </div>
        </div>
        <!--底部-->
        <div class="pc-login-footer">

        </div>
    </div>
</div>







<div id="forgetPW_modal" class="modal fade in" aria-hidden="false">
    <div class="modal-dialog" style="margin-top:10%;">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">找回密码</h4>
            </div>
            <div class="modal-body">
              <!--
                <form class="form-horizontal" method="post" action="/index.php?con=simple&act=get_back_pwd">
                -->

                <div class="form-horizontal">
                    <div class="form-group ">
                        <label class="col-sm-2 control-label">用户名</label>
                        <div class="col-sm-6">
                            <input type="text" id="b_username" name="b_username" class="form-control parsley-validated" data-required="true" placeholder="请输入用户名">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">验证码</label>
                        <div class="col-sm-4">
                            <input type="text" id="b_verifyCode" name="b_verifyCode" class="form-control parsley-validated" data-required="true">
                        </div>
                        <div class="col-sm-4">
                            <a href="javascript:;" class="btn btn-default" onclick="sms_send()">获取短信验证码</a>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-2 control-label">新密码</label>
                        <div class="col-sm-6">
                            <input type="password" id="b_password" name="b_password" class="form-control parsley-validated" data-required="true" placeholder="请输入新密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">确认密码</label>
                        <div class="col-sm-6">
                            <input type="password" id="b_repassword" name="b_repassword" class="form-control parsley-validated" data-required="true" placeholder="必须和新密码保持一致">
                        </div>
                    </div>

                    <div id="b_msg_dialog" class="alert alert-danger" role="alert" style="display:none;">
                    <b id="b_msg_txt"></b>
                  </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-8 ">
                            <input type="button" onclick="get_back_pwd()" class="btn btn-info btn-s-xs" value="提交">
                        </div>
                    </div>

                    </div>

                <!--
                </form>
                -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


$(document).ready(function(){


  var msg = $("#invalid").val();

  if(msg !=undefined || msg != null)
  {
    //alert(msg);
    //$("#msg_dialog").show();
    //$("#msg_txt").html(msg);
    //setTimeout(function(){$("#msg_dialog").hide();},2000);
  }

});

function keydown(e){
  var e = e || event;
  if (e.keyCode==13)
  {
  sub_login_form();
  }
}

function show_msg(msg)
{
  $("#warning_msg").html(msg);
  $("#div_warning").show();
  setTimeout(function(){$("#div_warning").hide();},1000);
}

function sms_send()
{
  var type = 2;
  var username = $("#b_username").val();
  if(username == '')
  {
    alert("请先输入用户名");
    $("#username").focus();
    return;
  }
  else
  {
    $.ajax({
      url:"/index.php?con=simple&act=sms_send",
      data:{type:type,username:username},
      type:'post',
      dataType:'text',
      success:function(data){alert(data)},
      error:function(){alert("发送短信异常，请稍后再次操作");}
      });
  }

}





function get_back_pwd()
{
  var b_username = $("#b_username").val();
  var b_verifyCode = $("#b_verifyCode").val();
  var b_password = $("#b_password").val();
  var b_repassword = $("#b_repassword").val();
  if(b_username == '')
  {
    $("#b_msg_dialog").show();
    $("#b_msg_txt").html("用户名不能为空");
    setTimeout(function(){$("#b_msg_dialog").hide();},800);
    //show_msg("用户名不能为空f");
    return;
  }
  if(b_verifyCode == '')
  {
    $("#b_msg_dialog").show();
    $("#b_msg_txt").html("手机验证码不能为空");
    setTimeout(function(){$("#b_msg_dialog").hide();},800);
    return;
  }
  if(b_verifyCode.length < 6 || b_verifyCode.length > 6 || isNaN(b_verifyCode))
  {
    $("#b_msg_dialog").show();
    $("#b_msg_txt").html("手机验证码为6位数字");
    setTimeout(function(){$("#b_msg_dialog").hide();},800);
    return;
  }
  if(b_password == '')
  {
    $("#b_msg_dialog").show();
    $("#b_msg_txt").html("新密码不能为空");
    setTimeout(function(){$("#b_msg_dialog").hide();},800);
    return;
  }
  if(b_repassword == '')
  {
    $("#b_msg_dialog").show();
    $("#b_msg_txt").html("确认密码不能为空");
    setTimeout(function(){$("#b_msg_dialog").hide();},800);
    return;
  }

  if(b_password != b_repassword)
  {
    $("#b_msg_dialog").show();
    $("#b_msg_txt").html("两次输入的密码不一致");
    setTimeout(function(){$("#b_msg_dialog").hide();},800);
    return;
  }

  var pattern = /^\w{6,20}$/i;
  if(!pattern.test(b_repassword) || !pattern.test(b_password))
  {
    $("#b_msg_dialog").show();
    $("#b_msg_txt").html("密码为6-20位字母数字组合");
    setTimeout(function(){$("#b_msg_dialog").hide();},800);
    return;
  }

  $.ajax({
    url:"/index.php?con=simple&act=get_back_pwd",
    data:{b_username:b_username,b_verifyCode:b_verifyCode,b_password:b_password,b_repassword:b_repassword},
    type:'post',
    dataType:'json',
    success:function(data){
      alert(data['msg'])
      if(data['status'] == 'success')
      {
        $("#forgetPW_modal").modal("hide");
        document.location.href="/index.php?con=simple&act=login";
      }
    },
    error:function(){alert("发送短信异常，请稍后再次操作");}
  });

}




function sub_login_form()
{

  var username = $.trim($("#name").val());
  var password = $.trim($("#password").val());
  var valicode = $.trim($("#verifyCode").val());
  if(username == null || username == '')
  {

    //show_msg("用户名不能为空！");
    alert("用户名不能为空");
    return false;
  }
  if(password == null || password == '')
  {
    //show_msg("密码不能为空！");
    alert("密码不能为空");
    return false;
  }
  if(valicode == null || valicode == '')
  {
    alert("验证码不能为空");
    //show_msg("验证码不能为空！");
    return false;
  }

  $.post("login.php",{username:username,password:password,verifyCode:valicode},function(result){
      if(result['status']=='success')
      {
        window.location.href="dashboard.php";
      }
      else
      {
        alert(result['msg']);
        window.location.href=window.location.href;
      }

  },'json');

}

</script>
</body>
</html>
<!--Powered by TinyRise-->