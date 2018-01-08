<?
$mgroup=2;
include("_header.php");
?>
            <section id="content">
                <div class="modal fade" id="myModal_kstd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">提示：</h4>
            </div>
            <div class="modal-body" id="myModalContent">
                <div class="form-horizontal" data-validate="parsley">
                    <section class="panel panel-default">

                        <div class="panel-body">


                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
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
        <ul class="breadcrumb" style="height:42px;">
            <li><a href="dashboard.php"><i class="fa fa-home"></i> 我的主页</a></li>
            <li><a href="javascript:;">会员管理</a></li>
            <li class="active">会员注册</li>
        </ul>
        <!-- / .breadcrumb -->
        <div class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>会员注册</strong>

                </header>
                <!--
                <form method="post" action="info.php_add">
                -->
                <div class="panel-body">
                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>推荐人</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="referral" id="referral" readonly class="form-control parsley-validated" data-required="true" value="<? echo $user->username; ?>">
                        </div>
                    </div>

                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>用户名</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" id="username" name="uname" class="form-control parsley-validated" data-required="true" placeholder="请输入登录用户名">
                        </div>
                    </div>
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>登录密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="password" name="password" id="password" class="form-control parsley-validated" data-required="true" placeholder="6-20位字母或数字或组合">
                        </div>
                    </div>
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>确认登录密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="password" name="repassword" id="repassword" class="form-control parsley-validated" data-required="true" placeholder="必须和登录密码相同">
                        </div>
                    </div>
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>二级密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="password" name="password2" id="password2" class="form-control parsley-validated" data-required="true" placeholder="6-20位字母或数字或组合">
                        </div>
                    </div>
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>确认二级密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="password" name="repassword2" id="repassword2" class="form-control parsley-validated" data-required="true" placeholder="必须和登录密码相同">
                        </div>
                    </div>
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>真实姓名</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="fullname" id="fullname" class="form-control parsley-validated" data-required="true" placeholder="必须填写真实姓名">
                        </div>
                    </div>
                    <!--
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>身份证号码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="sfz" id="sfz" class="form-control parsley-validated" data-required="true" placeholder="本人真实身份证号码">
                        </div>
                    </div>-->

                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>手机号码</label>
                        <div class="col-sm-4 m-t-im">
                            <input type="text" name="phone" id="phone" class="form-control parsley-validated" data-required="true" placeholder="便于联系和接收短信">
                        </div>
                        <div class="col-sm-2 m-t-im">
                          <input type="button" id="btn_get_validate" onclick="get_validate_code()" class="btn btn-info" value="获取短信验证码"/>
                        </div>
                    </div>

                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>短信验证码</label>
                        <div class="col-sm-6 m-t-im">
                          <input type="text" name="phonecode" id="phonecode" class="form-control parsley-validated">
                        </div>
                    </div>
                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs"></span></label>
                        <div class="col-sm-6 m-t-im">
                          <input type="checkbox" id="agree" name="agree" value="1"/>&nbsp;同意&nbsp;<a href="#" style="color:red;" onclick="show_m()">诚信通互助金融风险说明书</a>
                        </div>
                    </div>

                  <div class="alert alert-danger" style="display:none;" id="div_warning">
             <strong id="strong_warning">警告！</strong><span id="warning_msg"></span>
          </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im"></label>
                        <div class="col-sm-2 m-t-im">
                          <input type="hidden" id="user_id" name="user_id" value="79"/>
                          <button type="button"  id="btn_reg_user" class="btn btn-info btn-s-xs" onclick="reg_user()">提交</button>
                        </div>
                    </div>
                </div>
                <input type='hidden' name='tiny_token_u_reg' value='wybn8k6qmwuldglmzp1rm5e0bklmvozf'/>
                <!--
        </form>
        -->

            </section>



        </div>


    </div>
</div>
</section>

</section>
</section>
<!-- side content -->

</section>
<script type="text/javascript">
$(document).ready(function(){
  //$("#myModal_kstd").modal();
});
function show_m()
{
  $("#myModal_kstd").modal();
}
function change_show()
{
  var search_text = $("#search_text").val();
  if(search_text != '')
  {
    document.location.href="reg_user.php&condition="+search_text;
  }
  else
  {
    document.location.href="reg_user.php";
  }
}
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
  $.post("/index.php?con=ucenter&act=sms_send",{mobile:mobile},function(result){
        alert(result);
      //resetCode(); //倒计时
        $("#btn_get_validate").attr("disabled", false);
    });


}
//倒计时
function resetCode(){
  var second = 180;
  $('#btn_get_validate').val(second+'S');
  var timer = null;
  timer = setInterval(function(){
    second -= 1;
    if(second >0 ){
      $('#btn_get_validate').val(second+'S');
    }else{
      clearInterval(timer);
    }
  },1000);
}

function reg_user()
{
  var referral = $("#referral").val();
  //var pin_code = $("#pin_code").val();
  var username = $("#username").val();
  var password = $("#password").val();
  var repassword = $("#repassword").val();
  var password2 = $("#password2").val();
  var repassword2=$("#repassword2").val();
  var phone = $("#phone").val();
  var fullname = $("#fullname").val();
  var phonecode = $("#phonecode").val();
  var agree     = $("#agree").val();
/*
  if(tjrname==null || tjrname == '')
  {
    show_msg("推荐人不能为空");
    return false;
  }
  else
  {
    $.post("/index.php?con=ucenter&act=check_user_is_exists",{username:tjrname},function(result){
          if(result == 'fail')
          {
            show_msg("您输入的介绍人不存在");
            return false;
          }
      });
  }

  if(pin_code == '')
  {
    show_msg("PIN码不能为空");
    return false;
  }

  if(name == '')
  {
    show_msg("用户名不能为空");
    return false;
  }

  var name_pattern = /^\w{4,20}$/i;
  if(!name_pattern.test(name))
  {
    show_msg("用户名长度至少为4位");
    return false;
  }
  else
  {
    $.post("/index.php?con=ucenter&act=check_user_is_exists",{username:name},function(result){
          if(result == 'success')
          {
            show_msg("您输入的会员账号已存在");
            return false;
          }
      });
  }

  if(password == '')
  {
    show_msg("登录密码不能为空");
    return false;
  }
  if(repassword == '')
  {
    show_msg("确认登录密码不能为空");
    return false;
  }

  if(password2 == '')
  {
    show_msg("二级密码不能为空");
    return false;
  }

  if(repassword2 == '')
  {
    show_msg("确认二级密码不能为空");
    return false;
  }

  var password_pattern= /^\w{6,20}$/i;
  if(!password_pattern.test(password) || !password_pattern.test(password2))
  {
    show_msg("密码为6-20位字母数字组合");
    return false;
  }
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


  if(xm_name == '')
  {
    show_msg("真实姓名不能为空");
    return false;
  }

  var sfz = $("#sfz").val();
  if(sfz == '')
  {
    show_msg("身份证号码不能为空");
    return false;
  }

  var sfz ='';

  if(mobile == '')
  {
    show_msg("手机号码不能为空");
    return false;
  }
  var mobile_pattern = /^1[3-9]\d{9}$/;
  if(!mobile_pattern.test(mobile))
  {
    show_msg("手机号码不合法");
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
  if(!$("#chk_agree").is(":checked"))
  {
    show_msg('请选择同意用户注册协议');
    return false;
  }
*/
  //点击提交后，提交按钮失效
  $("#btn_reg_user").prop("disabled",true);

  $.post("register_add.php",{username:username,phone:phone,phonecode:phonecode,referral:referral,fullname:fullname,password:password,repassword:repassword,password2:password2,repassword2:repassword2,agree:agree},function(result) {
      if (result.status == 'success')
      {
        alert("操作成功");
        $("#div_warning").attr("class","alert alert-success");
        $("#strong_warning").remove();
        location.reload();
      }
      else
      {
        //show_msg(result['msg']);
        show_msg(result.msg);
        $("#btn_reg_user").prop("disabled",false);
      }

    },"json");

}
</script>
            </section>
        </section>
    </section>
</section>


</script>

</body>
</html>
<!--Powered by TinyRise-->