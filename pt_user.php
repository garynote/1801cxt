<?
$mgroup=2;
include("_header.php");

$pin = ggPinCount(1);

$list = new stdClass();
$list = ggMyList();
?>

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
            <li><a href="/index.php?con=ucenter&act=index"><i class="fa fa-home"></i> 我的主页</a></li>
            <li><a href="javascript:;">会员管理</a></li>
            <li class="active">激活会员</li>
        </ul>
        <!-- / .breadcrumb -->
        <form class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>激活会员</strong>
                    &nbsp;&nbsp;剩余可用激活码：<b style="color:red;"><? echo $pin; ?></b> 个
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
                          <? echo $list['data']; ?>
                        </tbody>
                    </table>
                </div>

                <footer class="panel-footer">
                    <div class="text-center text-center-xs">
                      <div style="z-index: 2;
                  color: #788188;
                  cursor: default;
                  border-color: #428BCA;">
                          总计 <? echo $list['count']; ?> 条记录 1 ／ 1 页<a href=/index.php?con=ucenter&act=pt_user&p=1>第一页</a> <span href=/index.php?con=ucenter&act=pt_user&p=1 class='disabled'>上一页</span> <span href=/index.php?con=ucenter&act=pt_user&p=2 class='disabled'>下一页</span> <a href=/index.php?con=ucenter&act=pt_user&p=1>最后一页</a> 到第 <select id='select' onchange='window.location.href="/index.php?con=ucenter&act=pt_user&p="+this.value'><option value='1' selected>1</option></select> 页                         </div>

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

      alive_user_account(user_id, 153, alive_mode);

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

      alive_user_account(user_id, 153, alive_mode);

    });
  });

function tui_search()
{
  var uname = $("#uname").val();

  var url = "/index.php?con=ucenter&act=pt_user";

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
          document.location.href = "/index.php?con=ucenter&act=pt_user";
        }
        else
        {
          //show_msg(result['msg']);
          alert(result['msg']);
          $("#btn_del").attr("disabled", false);
          //document.location.href = "/index.php?con=ucenter&act=pt_user";
        }

      });
  }

}

function alive_do(user_id)
{
  var act = 'activate';
  var ky_pin_code = parseInt("<? echo $ac; ?>");
  if(ky_pin_code < 1)
  {
    alert("激活码余额不足");
    return false;
  }
  //$("#myModal").modal();
  if(window.confirm("需要消耗您1个激活码，确定要执行此操作吗？"))
  {
    $.post("_action.php",{act:act,$pin:ky_pin_code,user_id:user_id},function(result){
        if(result['status'] == 'success')
        {
          alert("操作成功");
          document.location.href = document.location.href;
        }
        else
        {
          alert(result['msg']);
          document.location.href = document.location.href;
        }

      },"json");
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
    $.post("/index.php?con=simple&act=logout_again",function(){});

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

<?
function ggMyList() {
  global $db, $user;

  $ret = array();
  $data = "";

  $ret['page'] = 1;
  $rs = $db->query("select * from tblmember where referral=$user->id order by date_add desc");
  $ret['count'] = mysqli_num_rows($rs);
  while ($row = mysqli_fetch_object($rs)) {
    if ($row->pin =="") {
      $status = "<b style='color:red'>待激活</b>";
      $action = '<a class="btn btn-info btn-xs" id="btn_alive" onclick="alive_do('.$row->id.')">激活</a>&nbsp;
                <a class="btn btn-info btn-xs" id="btn_del" onclick="del_no_alive_user('.$row->id.')">删除</a>&nbsp;';
    } else {
      $status = "<b style='color:green'>正常</b>";
      $action = "暂无";
    }
    $data .= "<tr><td>$row->username</td><td>$status</td><td>$action</td><td>$row->fullname</td><td>$row->phone</td><td>$row->date_add</td></tr>";
  }
  $ret['data'] = $data;
  return $ret;
}

?>
<!--Powered by TinyRise-->