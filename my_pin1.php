<?
$mgroup = 3;
include("_header.php");

$pin_type = 1;
$pin1 = ggPinCount($pin_type);
$list1 = ggPinList1();
$list2 = ggPinList2();
$list3 = ggPinList3();

if ($pin_type == 1) {
  $ls->pin_name = array("Activation Pin","激活码","激活碼");
} else if ($pin_type == 2) {
  $ls->pin_name = array("Que Pin","排单币","排單幣");
} else {
  $ls->pin_name = array("PinX","币X","幣X");
}
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
            <li><a href="javascript:;">财务管理</a></li>
            <li class="active">我的<? echo $ls->pin_name[$lang]; ?></li>
        </ul>
        <!-- / .breadcrumb -->

        <div class="form-horizontal">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>我的<? echo $ls->pin_name[$lang]; ?></strong>
                </header>
                <div class="panel-body" style="padding-bottom: 0">
                    <div class="alert alert-info">
                        可用<? echo $ls->pin_name[$lang]; ?>: <b class="text-lg m-l-xs m-r-xs"><? echo $pin1; ?></b>，可分享<? echo $ls->pin_name[$lang]; ?>: <b class="text-lg m-l-xs m-r-xs"><? echo $pin1; ?></b>
                    </div>

                    <div class="alert alert-danger" style="display:none;" id="div_warning">
             <strong id="strong_warning">警告！</strong><span id="warning_msg"></span>
          </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="col-sm-3 control-label m-t-im">分享给</label>
                                <div class="col-sm-6 m-t-im">
                                    <input type="text" id="to_user"  class="form-control parsley-validated" data-required="true" placeholder="输入要分享的用户名">
                                </div>
                                <div class="col-sm-2 m-t-im">
                                    <input class="btn btn-info btn-s-xs" type="button" value="检查用户" onclick="check_user()"/>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="col-sm-3 control-label m-t-im">数量</label>
                                <div class="col-sm-6 m-t-im">
                                    <input type="text" name="share_pin_nums" id="share_pin_nums" class="form-control parsley-validated" data-required="true" placeholder="输入要分享的数量">
                                </div>
                              <div class="col-sm-2 m-t-im">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              </div>

                            </div>

                              <div class="col-sm-6">
                                <label class="col-sm-3 control-label m-t-im">二级密码</label>
                                  <div class="col-sm-6 m-t-im">
                                      <input type="password" id="passwordtwo" name="passwordtwo"  class="form-control parsley-validated" data-required="true" placeholder="请输入二级密码">
                                  </div>
                                  <div class="col-sm-2 m-t-im">
                                      <button class="btn btn-info btn-s-xs" onclick="submit_share(<? echo $pin1; ?>)">提交</button>
                                  </div>
                              </div>

                        </div>

                        <!-- 隐藏域 -->
                        <input type="hidden" name="hidStatus" id="hidStatus" value="0"/>
                        <input type="hidden" name="pin_type" id="pin_type" value="<? echo $pin_type; ?>"/>

                    </div>

                </div>

                <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#used" data-toggle="tab">使用记录</a></li>
                        <li><a href="#shared" data-toggle="tab">共享记录</a></li>
                        <li><a href="#input" data-toggle="tab">转入记录</a></li>
                    </ul>
                </header>
                <div class="tab-content m-t">
                    <div class="tab-pane active animated fadeIn" id="used">
                        <div class="table-responsive" style="border: none">
                            <table class="table table-striped b-t b-light">
                                <? echo $list1['data']; ?>
                            </table>
                        </div>

                        <footer class="panel-footer">

                            <div class="text-center text-center-xs">
                              <div style="z-index: 2;
                  color: #788188;
                  cursor: default;
                  border-color: #428BCA;">
                              总计 3 条记录 1 ／ 1 页<a href=my_vb.php&p=1>第一页</a> <span href=my_vb.php&p=1 class='disabled'>上一页</span> <span href=my_vb.php&p=2 class='disabled'>下一页</span> <a href=my_vb.php&p=1>最后一页</a> 到第 <select id='select' onchange='window.location.href="my_vb.php&p="+this.value'><option value='1' selected>1</option></select> 页                               </div>
                              <!--
                                <ul class="pagination pagination-sm m-t-none m-b-none">
                                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                                 -->
                            </div>
                        </footer>

                    </div>
                    <div class="tab-pane animated fadeIn" id="shared">
                        <div class="table-responsive" style="border: none">
                            <table class="table table-striped b-t b-light">
                                <? echo $list2['data']; ?>
                            </table>
                        </div>

                        <footer class="panel-footer">

                            <div class="text-center text-center-xs">
                              <div style="z-index: 2;
                  color: #788188;
                  cursor: default;
                  border-color: #428BCA;">
                              总计 0 条记录 1 ／ 0 页<a href=my_vb.php&p=1>第一页</a> <span href=my_vb.php&p=1 class='disabled'>上一页</span> <span href=my_vb.php&p=2 class='disabled'>下一页</span> <a href=my_vb.php&p=0>最后一页</a> 到第 <select id='select' onchange='window.location.href="my_vb.php&p="+this.value'></select> 页                              </div>

                            </div>
                        </footer>
                    </div>

                    <div class="tab-pane animated fadeIn" id="input">
                        <div class="table-responsive" style="border: none">
                            <table class="table table-striped b-t b-light">
                              <? echo $list3['data']; ?>
                            </table>
                        </div>

                        <footer class="panel-footer">

                            <div class="text-center text-center-xs">
                              <div style="z-index: 2;
                  color: #788188;
                  cursor: default;
                  border-color: #428BCA;">
                              总计 2 条记录 1 ／ 1 页<a href=my_vb.php&p=1>第一页</a> <span href=my_vb.php&p=1 class='disabled'>上一页</span> <span href=my_vb.php&p=2 class='disabled'>下一页</span> <a href=my_vb.php&p=1>最后一页</a> 到第 <select id='select' onchange='window.location.href="my_vb.php&p="+this.value'><option value='1' selected>1</option></select> 页                               </div>

                            </div>
                        </footer>
                    </div>

                </div>


            </section>
            </div>
        <!--
        </form>
    -->



    </div>
</div>
</section>

</section>
</section>
<!-- side content -->

</section>
<script type="text/javascript">
function check_user()
{
  var to_user = $("#to_user").val();
  if(to_user == '')
  {
    $("#warning_msg").html("分享用户名不能为空");
    $("#div_warning").show();
    setTimeout(function(){$("#div_warning").hide();},1000);
  }
  else
  {
    var username=$("#to_user").val();
    var user_id = 79;

    //利用ajax post方式发送数据
    $.post("_check_user.php",{username:username,user_id:user_id},function(result){
        if(result == 0)
        {
          $("#hidStatus").val("0");

          $("#warning_msg").html("您输入的分享用户名不存在");
          $("#div_warning").show();
          setTimeout(function(){$("#div_warning").hide();},1000);

          return;
        }
        else if(result == 1)
        {
          $("#hidStatus").val("0");
          $("#warning_msg").html("分享用户不能是自己");
        $("#div_warning").show();
        setTimeout(function(){$("#div_warning").hide();},1000);

          return;
        }
        else
        {
          $("#hidStatus").val("1");
          $("#strong_warning").remove();
          //$("#warning_msg").html("<b style='color:green;'>OK!</b>");
          $("#warning_msg").html("<b style='color:green;'>接收人真实姓名："+result+"&nbsp;&nbsp;OK!</b>");
        $("#div_warning").show();
        setTimeout(function(){$("#div_warning").hide();},2000);

          return;
        }
      });
  }
}



function submit_share(nums)
{
  var n = nums;
  var act = 'pin1';
  var share_pin_nums = $("#share_pin_nums").val();
  var passwordtwo = $("#passwordtwo").val();
  var to_user = $("#to_user").val();
  var hidStatus = $("#hidStatus").val();
  var pin_type = $("#pin_type").val();

  if(n == 0)
  {

      $("#warning_msg").html("无可用的激活码");
    $("#div_warning").show();
    setTimeout(function(){$("#div_warning").hide();},1000);
    return false;
  }

  if(hidStatus == 0)
  {

      $("#warning_msg").html("请先检查分享用户名");
    $("#div_warning").show();
    setTimeout(function(){$("#div_warning").hide();},1000);
    return false;
  }
  else
  {


    if(share_pin_nums == '')
    {
      $("#warning_msg").html("请输入分享的激活码数量");
      $("#div_warning").show();
      setTimeout(function(){$("#div_warning").hide();},1000);
      return false;
    }
    else
    {
      if(isNaN(share_pin_nums))
      {

          $("#warning_msg").html("只能输入数字");
        $("#div_warning").show();
        setTimeout(function(){$("#div_warning").hide();},1000);
        return false;
      }
      else
      {


        if(passwordtwo=='')
        {
          $("#warning_msg").html("二级密码不能为空");
          $("#div_warning").show();
          setTimeout(function(){$("#div_warning").hide();},1000);
          return false;
        }

        if(n > 0)
        {
          if(share_pin_nums > n)
          {

            $("#warning_msg").html("最多可分享数量:"+n);
            $("#div_warning").show();
            setTimeout(function(){$("#div_warning").hide();},1000);
            $("#share_pin_nums").val(n);
            return false;
          }
          if(share_pin_nums <= 0)
          {

              $("#warning_msg").html("至少得分享1个激活码");
            $("#div_warning").show();
            setTimeout(function(){$("#div_warning").hide();},1000);
            $("#share_pin_nums").val("1");
            return false;
          }
          //转出用户id
          //ajax访问后台方法
          $.post("_action_pin.php",{act:act,pin_type:pin_type,to_user:to_user,PinQty:share_pin_nums,password2:passwordtwo},function(result){
              if(result.status == 'success')
              {
                $("#strong_warning").remove();
                $("#warning_msg").html("<b style='color:green;'>操作成功!</b>");
                $("#div_warning").show();
                alert("操作成功");
                setTimeout(function(){$("#div_warning").hide();document.location.href = document.location.href;},1000);

              }
              else
              {
                $("#warning_msg").html(result.msg);
                $("#div_warning").show();
                setTimeout(function(){$("#div_warning").hide();},20000);
              }
          },"json");
        }
      }
    }

  }

}
</script>
            </section>
        </section>
    </section>
</section>


</body>
</html>

<?

function ggPinList1() {
  global $db, $user, $pin_type;
  $ret = array();
  $ret['data'] = "<thead><tr><th>编码</th><th>生成时间</th><th>状态</th><th>使用时间</th></tr></thead><tbody>";
  $rs = $db->query("select * from tblpin".$pin_type." where managerid = $user->id and (status ='N' or status='U') order by status, requestdate desc");
  while ($row = mysqli_fetch_object($rs)) {
    if ($row->status=="N") {
      $row->usedate = "";
      $row->status = "<b style='color: green'>未使用</b>";
    } else {
      $row->status = "<b style='color: red'>已使用</b>";
    }
    $ret['data'] .= "<tr><td>$row->pin</td><td>$row->requestdate</td><td>$row->status</td><td>$row->usedate $row->usedby</td></tr>";
  }
  $ret['data'] .= "</tbody></table>";
  return $ret;
}

function ggPinList2() {
  global $db, $user, $pin_type;
  $ret = array();
  $ret['data'] = "<thead><tr><th>分享用户</th><th>数量</th><th>时间</th></tr></thead><tbody>";

//  $rs = $db->query("select * from tblpin where managerid = $user->id and (status ='N' or status='U') order by status, requestdate desc");
  $rs = $db->query("select * from tblpintran".$pin_type." where idfrom=$user->id") or die("err ".$db->error);
  while ($row = mysqli_fetch_object($rs)) {
    $ret['data'] .= "<tr><td>$row->eto</td><td>$row->qty</td><td>$row->trdate</td></tr>";
  }
  $ret['data'] .= "</tbody></table>";
  return $ret;
}

function ggPinList3() {
  global $db, $user,$pin_type;
  $ret = array();
  $ret['data'] = "<thead><tr><th>用户名</th><th>数量</th><th>时间</th></tr></thead><tbody>";

//  $rs = $db->query("select * from tblpin where managerid = $user->id and (status ='N' or status='U') order by status, requestdate desc");
  $rs = $db->query("select * from tblpintran".$pin_type." where idto=$user->id") or die("err ".$db->error);
  while ($row = mysqli_fetch_object($rs)) {
    $ret['data'] .= "<tr><td>$row->efrom</td><td>$row->qty</td><td>$row->trdate</td></tr>";
  }
  $ret['data'] .= "</tbody></table>";
  return $ret;
}
?>
<!--Powered by TinyRise-->