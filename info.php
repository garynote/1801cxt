<?
$mgroup = 4;
include("_header.php");
?>

            <section id="content">
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
            <li><a href="javascript:;">账号设置</a></li>
            <li class="active">个人资料</li>
        </ul>
        <!-- / .breadcrumb -->
        <div class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>个人资料</strong>
                </header>

                <div class="panel-body">
                   <!--
                    <div class="alert alert-danger">
                        资料和支付信息都只能完善一次，请认真核实，如果需要再次修改，请咨询网站管理员                    </div>
                    -->

                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-group m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">用户名</label>
                                <div class="col-sm-6 m-t-im">
                                  <label class="control-label"><? echo $user->username; ?></label>
                                  <!--
                                    <input type="text" class="form-control parsley-validated" disabled placeholder="zzzzzzz">
                                    -->
                                </div>
                            </div>
                            <!----end form-group--->
                            <!--
                            <div class="form-group  m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">昵称</label>
                                <div class="col-sm-6 m-t-im">
                                    <input type="text" class="form-control parsley-validated" data-required="true" value="tianxieqing">
                                </div>
                                <label class="col-sm-4 m-t-im text-muted" style="padding-top: 7px;">显示在系统中的名称</label>
                            </div>
                            -->
                            <div class="form-group  m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">真实姓名</label>
                                <div class="col-sm-6 m-t-im">
                                    <input type="text" readonly id="xm_name" class="form-control parsley-validated" data-required="true" name="xm_name" value="<? echo $user->fullname; ?>" placeholder="">
                                </div>
                                <label class="col-sm-4 m-t-im text-muted" style="padding-top: 7px;">如实填写，付款时核对用，必填</label>
                            </div>
                            <!--
                            <div class="form-group  m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">身份证号</label>
                                <div class="col-sm-6 m-t-im">
                                    <input type="text" class="form-control parsley-validated" data-required="true" value="410185199902332177">
                                </div>
                            </div>
                            -->
                            <div class="form-group  m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">电话</label>
                                <div class="col-sm-6 m-t-im">
                                  <input type="text" class="form-control" <? echo ($user->phone=="")? "":"readonly"; ?> value="<? echo $user->phone; ?>">
                                  <!--
                                    <input type="text" class="form-control parsley-validated" data-required="true" value="13673552648" placeholder="">
                                    -->
                                </div>
                            </div>
                            <!--
                            <div class="form-group  m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">身份证号码</label>
                                <div class="col-sm-6 m-t-im">
                                  <label class="control-label"></label>

                                    <input type="text" class="form-control parsley-validated" data-required="true" value="13673552648" placeholder="">

                                </div>
                            </div>
                             -->
                            <div class="form-group m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">开户行</label>
                                <div class="col-sm-6 m-t-im">
                                    <input type="text" name="bank_info" id="bank_info" class="form-control parsley-validated" data-required="true" <? echo ($user->bankname=="")? "":"readonly"; ?> value="<? echo $user->bankname; ?>">
                                </div>
                                <label class="col-sm-4 m-t-im text-muted" style="padding-top: 7px;">填写开户银行及银行地址，必填</label>
                            </div>
                            <div class="form-group m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">银行卡号</label>
                                <div class="col-sm-6 m-t-im">
                                    <input type="text" name="bank_kh" id="bank_kh" class="form-control parsley-validated" data-required="true" <? echo ($user->bankaccount=="")? "":"readonly"; ?> value="<? echo $user->bankaccount; ?>">
                                </div>
                                <label class="col-sm-4 m-t-im text-muted" style="padding-top: 7px;">请填写16或19位卡号，必填</label>
                            </div>
                            <div class="form-group m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">支付宝</label>
                                <div class="col-sm-6 m-t-im">
                                    <input type="text" name="zfb" id="zfb" class="form-control parsley-validated" data-required="true" <? echo ($user->alipay=="")? "":"readonly"; ?> value="<? echo $user->alipay; ?>">
                                </div>
                                <label class="col-sm-4 m-t-im text-muted" style="padding-top: 7px;">为方便支付，请填写支付宝账号，选填</label>
                            </div>
                            <div class="form-group m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">微信</label>
                                <div class="col-sm-6 m-t-im">
                                    <input name="wzf" id="wzf" type="text" <? echo ($user->wechat=="")? "":"readonly"; ?> value="<? echo $user->wechat; ?>" class="form-control parsley-validated" data-required="true" >
                                </div>
                                <label class="col-sm-4 m-t-im text-muted" style="padding-top: 7px;">为方便支付，请填写微信账号，选填</label>
                            </div>
              <!--
                            <div class="form-group m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">居住地址</label>
                                <div class="col-sm-6 m-t-im">
                                    <input name="head_pic" id="head_pic" type="text" value="" class="form-control parsley-validated" data-required="true" >
                                </div>
                                <label class="col-sm-4 m-t-im text-muted" style="padding-top: 7px;"></label>
                            </div>
                            -->

                            <div class="form-group m-b-xs">
                                <label class="col-sm-2 control-label m-t-im">二级密码</label>
                                <div class="col-sm-6 m-t-im">
                                    <input type="password" name="password" id="password" class="form-control parsley-validated" data-required="true">
                                </div>
                                <label class="col-sm-4 m-t-im text-muted" style="padding-top: 7px;">修改资料需要二级密码，必填</label>
                            </div>
                        </div>




                        <!--
                        <div class="col-lg-3">
                            <div class="m-b thumb-md thumb-im">
                                <img src="images/u.gif" class="img-full" />
                                <a href="#userImg_modal" data-toggle="modal" class=" m-t btn btn-default btn-sm"><i class="fa fa-cloud-upload m-r-xs"></i>上传头像</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="m-b thumb-md thumb-im">
                                <img src="images/zfb.gif" class="img-full" />
                                <a href="#zhifubao_modal" data-toggle="modal" class=" m-t btn btn-default btn-sm">支付宝二维码</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="m-b thumb-md thumb-im">
                                <img src="images/wx.gif" class="img-full" />
                                <a href="#weixin_modal" data-toggle="modal" class=" m-t btn btn-default btn-sm">微支付二维码</a>
                            </div>
                        </div>
                        -->
                        <div class="clearfix"></div>
                        <div class="line line-dashed b-b"></div>


                        <div class="alert alert-danger" style="display:none;" id="div_warning">
                           <!--
                           <a href="#" class="close" data-dismiss="alert">
                              &times;
                           </a>
                           -->
                           <strong id="strong_warning">警告！</strong><span id="warning_msg"></span>
                        </div>


                        <div class="col-lg-9">


                                                                                                <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-2">
                                            <button type="submit" id="btn_info_save" class="btn btn-info btn-s-xs" onclick="return info_save()">保存</button>
                                        </div>
                                    </div>

                                                                                    </div>

                    </div>

                </div>


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
function show_msg(msg)
{
  $("#warning_msg").html(msg);
  $("#div_warning").show();
  setTimeout(function(){$("#div_warning").hide();},1000);
}
function info_save()
{
  var act = "info";
  var xm_name = $("#xm_name").val();
  var bank_info = $("#bank_info").val();
  var bank_kh = $("#bank_kh").val();
  var password = $("#password").val();
  var zfb = $("#zfb").val();
  var wzf = $("#wzf").val();

    $("#btn_info_save").prop('disabled', true);

    $.post("_action.php",{act:act,fullname:xm_name,bank_info:bank_info,bank_kh:bank_kh,alipay:zfb,wechat:wzf,password:password},function(result){
      if(result['status'] == 'success')
      {
        //show_msg("修改成功");
        alert("操作成功");
        location.reload();
      }
      else
      {
        $("#warning_msg").html(result.msg);
        $("#div_warning").show();
        setTimeout(function(){$("#div_warning").hide();},1000);
        $("#btn_info_save").prop('disabled', false);
      }

  },'json');
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