<?
$mgroup=2;
include("_header.php");

$list = new stdClass();
$list = ggMyList();
?>

            <section id="content">

<script type="text/javascript" src="./static/zc/ZeroClipboard.js"></script>

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
            <li class="active">我的推广</li>
        </ul>
        <!-- / .breadcrumb -->
        <form class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>我的推广</strong>
                                        &nbsp;&nbsp;
                                        推广链接：<a target="_blank" style="color:#d84646;text-transform:lowercase;" href="/index.php?con=simple&act=reg_user&tjr_id=gaozong" id="to_copy_text">
                        http://www.chengxintongvip.com/index.php?con=simple&act=reg_user&tjr_id=gaozong                     </a>

                </header>
                <!--
                <div class="panel-body" style="padding:0px 0px">
                  <div class="panel-body">
                    <label class="col-sm-2 control-label m-t-im">推广链接</label>
                    <div class="col-sm-4 control-label m-t-im">
                      <a target="_blank" style="color:#d84646;" href="http://www.chengxintongvip.com/reg_user.php?tjr_id=79" id="to_copy_text">http://www.chengxintongvip.com/reg_user.php?tjr_id=79</a>
                    </div>
                      <div class="col-sm-2 m-t-im">

                        <input type="button" id="copy-button" data-clipboard-target="to_copy_text" title="点击复制内容" class="btn btn-info" value="复制"/>
                      </div>
                      <div class="col-sm-3 m-t-im">
                        注意：手机端需点击2次完成复制，复制后，在目标文本输入处长按3秒，选择粘贴即可。
                      </div>

                  </div>
                </div>
                -->
                <div class="panel-body">
                  <!--
                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im">用户名</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="uname" id="uname" class="form-control parsley-validated" data-required="true" placeholder="请输入用户名">
                        </div>

                        <div class="col-sm-2 m-t-im">
                            <button type="button" class="btn btn-info btn-s-xs" onclick="tui_search()">查询</button>
                        </div>
                    </div>
                    -->
                </div>
                <div class="table-responsive" style="border: none">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>用户名</th>
                            <th>真实姓名</th>
                            <th>电话</th>
                            <th>排单币</th>
                            <th>注册时间</th>
                            <th>状态</th>
                        </tr>
                        </thead>
                        <tbody>
                            <? echo $list['body']; ?>
                        </tbody>
                    </table>
                </div>

                <footer class="panel-footer">
                    <div class="text-center text-center-xs">
                      <div style="z-index: 2;
                  color: #788188;
                  cursor: default;
                  border-color: #428BCA;">
                          总计 <? echo $list['count']; ?> 条记录 1 ／ 1 页<a href=my_user.php&p=1>第一页</a> <span href=my_user.php&p=1 class='disabled'>上一页</span> <span href=my_user.php&p=2 class='disabled'>下一页</span> <a href=my_user.php&p=1>最后一页</a> 到第 <select id='select' onchange='window.location.href="my_user.php&p="+this.value'><option value='1' selected>1</option></select> 页                         </div>
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

var clip = new ZeroClipboard( document.getElementById("copy-button"), {
    moviePath: "./static/zc/ZeroClipboard.swf" //swf文件地址，如果和html同目录则不用设置
  } );

  clip.on( 'load', function(client) {
    // alert( "swf文件加载完成" );
  } );

  clip.on( 'complete', function(client, args) {
    //this.style.display = 'none'; // "this" is the element that was clicked
    //alert("内容复制到了剪贴板: " + args.text );
    alert("内容已经复制到了剪贴板");
  } );

function tui_search()
{
  var uname = $("#uname").val();

  var url = "my_user.php";

  if(uname == null || uname == "")
  {
    document.location.href= url;
  }
  else
  {
    document.location.href = url+"&uname="+uname;
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
<?
function ggMyList() {
  global $db, $user;
  $ret = array();

  $rs = $db->query("select * from tblmember where referral = $user->id order by id desc");

  $ret['page'] = 1;
  $ret['count'] = (mysqli_num_rows($rs)>=1)? mysqli_num_rows($rs):"0";
  $ret['body'] = "";
  while ($row = mysqli_fetch_object($rs)) {
    $pin = ggPinUser($row->id,2);
    $ret['body'] .= "
      <tr>
        <td>$row->username</td>
        <td>$row->fullname</td>
        <td>$row->phone</td>
        <td class='text-dark'>$pin</td>
        <td>$row->date_add</td>
        <td>锁定</td>
      </tr>";
  }
  return $ret;
}

function ggPinUser($id,$pin_type) {
  $pin = ggFetchValue("select count(id) as ctr from tblpin".$pin_type." where managerid=$id and status='N'");
  return $pin;
}
?>
<!--Powered by TinyRise-->