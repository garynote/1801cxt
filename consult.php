<?
session_start();
$mgroup = 5;
include("_header.php");
$rs = $db->query("select * from tblsupport where mem_id=$user->id order by mdate desc");
$tbl_content = "";
while ($row = mysqli_fetch_object($rs)) {
  if ($row->rcontent=="") {
    $row->rdate = "";
  }
  $tbl_content .= "<tr><td>$row->content</td><td>$row->mdate</td><td>$row->rcontent</td><td>$row->rdate</td></tr>";
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
                      <li><a href="/index.php?con=ucenter&act=index"><i class="fa fa-home"></i> 我的主页</a></li>
                      <li><a href="javascript:;">信息管理</a></li>
                      <li class="active">在线留言</li>
                    </ul>
                    <!-- / .breadcrumb -->
                    <div class="form-horizontal" data-validate="parsley">
                      <section class="panel panel-default">
                        <header class="panel-heading"> <strong>在线留言</strong> </header>
                        <div class="panel-body">

                          <div class="form-group  m-b-xs">
                            <label class="col-sm-2 control-label m-t-im">留言内容</label>
                            <div class="col-sm-6 m-t-im">
                              <!--
                              <div class="form-control" style="overflow:scroll;height:150px;max-height:150px" contenteditable="true" id="content">
                              </div>
                              -->
                              <textarea class="form-control" style="overflow:scroll;height:150px;max-height:150px" id="cccc" name="cccc"></textarea>

                            </div>
                          </div>
                          <div class="form-group  m-b-xs">
                            <label class="col-sm-2 control-label m-t-im">验证码</label>
                            <div class="col-sm-1 m-t-im">
                              <input type="text" name="verifyCode" id="verifyCode" class="form-control parsley-validated" data-required="true" placeholder="">
                            </div>
                            <!--
                            <div class="col-sm-2 m-t-im"> <img src="images/index.jpg"> </div>
                            -->
                            <div class="col-sm-2 m-t-im">
                            <img id="captcha_img" src="captcha.php">
                          <a href="javascript:void(0)" class="red" onclick="document.getElementById('captcha_img').src='captcha.php&random='+Math.random()">
                          换一张</a>
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
                              <button type="button" class="btn btn-info btn-s-xs" onclick="sub_zixun()">提交</button>
                            </div>
                          </div>

                        </div>

                      </section>
                    </div>








        <div class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>在线留言</strong>
                </header>
                <!--
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im">输入账号</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="uname" id="uname" class="form-control parsley-validated" data-required="true" placeholder="输入要查询的会员账号">
                        </div>
                        <div class="col-sm-2 m-t-im">
                            <button type="button" class="btn btn-info btn-s-xs" onclick="tui_search()">查询</button>
                        </div>
                    </div>


                </div>-->
                <div class="table-responsive" style="border: none">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:400px;">留言内容</th>
                            <th>留言时间</th>
                            <th>回复内容</th>
                            <th>回复时间</th>

                        </tr>
                        </thead>
                        <tbody>
                          <? echo $tbl_content; ?>
                        </tbody>
                    </table>
                </div>

                <footer class="panel-footer">
                    <div class="text-center text-center-xs">
                      <div style="z-index: 2;
                  color: #788188;
                  cursor: default;
                  border-color: #428BCA;">
                          总计 1 条记录 1 ／ 1 页<a href=/index.php?con=ucenter&act=consult&p=1>第一页</a> <span href=/index.php?con=ucenter&act=consult&p=1 class='disabled'>上一页</span> <span href=/index.php?con=ucenter&act=consult&p=2 class='disabled'>下一页</span> <a href=/index.php?con=ucenter&act=consult&p=1>最后一页</a> 到第 <select id='select' onchange='window.location.href="/index.php?con=ucenter&act=consult&p="+this.value'><option value='1' selected>1</option></select> 页                         </div>
                    </div>
                </footer>

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


function sub_zixun()
{
  var content = $("#cccc").val();
  var verifyCode = $("#verifyCode").val();
  var act = 'consult';

  $.post("_action.php",{act:act,content:content,verifyCode:verifyCode},function(result){
        if(result.status == 'success')
        {
          alert(result.msg);
          document.location.href = document.location.href;
        }
        else
        {
          show_msg(result.msg);
        }
    },"json");


}
</script>
            </section>
        </section>
    </section>
</section>

</body>
</html>
<!--Powered by TinyRise-->