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
            <li class="active">修改密码</li>
        </ul>
        <!-- / .breadcrumb -->
        <div class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>修改密码</strong>
                </header>
                <div class="panel-body">
                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>类型</label>
                        <div class="col-sm-6 m-t-im">
                            <div class="radio pull-left m-r-lg">
                                <label>
                                    <input type="radio" name="lx" value="1" checked>
                                    登录密码                                </label>
                            </div>
                            <div class="radio pull-left">
                                <label>
                                    <input type="radio" name="lx" value="2">
                                    二级密码                                </label>
                            </div>
                        </div>
                    </div>
                    <!----end form-group--->
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>原密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" class="form-control parsley-validated" name="oldpassword" id="oldpassword" data-required="true" placeholder="请输入原密码">
                        </div>
                    </div>
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>新密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" class="form-control parsley-validated" name="password" id="password" data-required="true" placeholder="请输入新密码">
                        </div>
                    </div>
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"><span class="text-danger m-r-xs">*</span>确认密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" class="form-control parsley-validated" name="repassword" id="repassword" data-required="true" placeholder="请输入确认密码">
                        </div>
                    </div>

          <div class="alert alert-danger" style="display:none;" id="div_warning">
             <!--
             <a href="#" class="close" data-dismiss="alert">
                &times;
             </a>
             -->
             <strong id="strong_warning">警告！</strong><span id="warning_msg"></span>
          </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im"></label>
                        <div class="col-sm-2 m-t-im">
                            <button type="button" class="btn btn-info btn-s-xs" onclick="change_password()">提交</button>
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

function change_password()
{
  //获取被选中的radio的值
  var act = 'pass';
  var lx = $("input[name='lx']:checked").val();
  var oldpassword = $("#oldpassword").val();//原密码
  var password = $("#password").val();//新密码
  var repassword = $("#repassword").val();//确认密码
  var pattern = /^\w{6,20}$/i;

  $.post("_action.php",{act:act,lx:lx,oldpassword:oldpassword,password:password,repassword:repassword},function(result){
        if(result.status == 'success')
        {
          $("#strong_warning").remove();
          $("#warning_msg").html("<b style='color:green;'>操作成功</b>");
          $("#div_warning").show();
          alert("操作成功");
          setTimeout(function(){$("#div_warning").hide();document.location.href = "login.php";},1000);
        }
        else
        {

          show_msg(result.msg);
          /*
          $("#warning_msg").html(result);
          $("#div_warning").show();
          setTimeout(function(){$("#div_warning").hide();document.location.href = document.location.href;},1000);
        */
      }

    },"json");

}
</script>

<?
include("_footer.php");
?>