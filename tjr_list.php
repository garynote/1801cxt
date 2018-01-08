<?
$mgroup=2;
include("_header.php");

$pin = ggFetchObject("select count(id) as ctr from tblpin where managerid=$user->id and status='N'");
$ac = $pin->ctr;
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
            <li class="active">推荐图谱</li>
        </ul>
        <!-- / .breadcrumb -->
        <form class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>推荐图谱</strong>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    我的团队人数：2                </header>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im">用户名</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="uname" id="uname" class="form-control parsley-validated" data-required="true" placeholder="请输入会员用户名">
                        </div>
                        <div class="col-sm-2 m-t-im">
                            <button type="button" class="btn btn-info btn-s-xs" onclick="tui_search()">查询</button>
                        </div>
                    </div>
                    <!----end form-group--->
                </div>
                <div class="table-responsive" style="border: none">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                          <!--
                            <th>序号</th>
                            -->
                            <th>用户名</th>
                            <th>真实姓名</th>
                            <th>推荐人</th>
                            <!--
                            <th>会员级别</th>
                            -->
                            <th>直接推荐人数</th>

                            <th>团队诚信付出总金额<br>(已完成/未完成)</th>
                            <th>团队诚信收获总金额<br>(已完成/未完成)</th>

                            <th>注册时间</th>
                            <th>状态</th>
                            <th>操作</th>

                        </tr>
                        </thead>
                        <tbody>
                          <? echo $list['data']?>
                        </tbody>
                    </table>
                </div>

                <footer class="panel-footer">
                    <div class="text-center text-center-xs">
                      <div style="z-index: 2;
                  color: #788188;
                  cursor: default;
                  border-color: #428BCA;">
                      <? echo $list['pagination']; ?>
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

  var url = "tjr_list.php";

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
function doPaging(cond) {
  var page = $("#pg").val();
  if (cond>0) {
     document.location.href = "tjr_list.php?condition="+cond+"&p="+page;
  } else {
     document.location.href = "tjr_list.php?p="+page;
  }
}
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
  global $db, $user,$_REQUEST;

  $rows = 5;
  $ret = array();
  $data = "";

  $p = isset($_REQUEST['p'])? $_REQUEST['p']:1;
  $ret['page'] = $p;

  $condition = 0;
  $url = "tjr_list.php?p";
  if (isset($_REQUEST['condition'])) {
    $condition = $_REQUEST['condition'];
    $ref_id = $_REQUEST['condition'];
    $url = "tjr_list.php?condition=".$condition."&p";
  } else {
    $ref_id = $user->id;
  }
  $ret['count'] = ggFetchValue("select count(id) from tblmember where referral=$ref_id and pin <>''");
  $ret['pages'] = ceil($ret['count'] / $rows);
  $start = ($ret['page']-1)*$rows;
  if ($ret['pages']==1) {
    $ret['pagination'] = "总计 ".$ret['count']." 条记录 ".$ret['page']." ／ ".$ret['pages']." 页 <a href=$url=1><i CLASS='glyphicon glyphicon-step-backward'></i></a> <span href='$url=1' class='disabled'>上一页</span> <span href='$url=1' class='disabled'>下一页</span> <a href=$url=1><i class='glyphicon .glyphicon-step-forward'></i></a> 到第 <select id='select' onchange='window.location.href=tjr_list.php&p=+this.value'><option value='1' selected>1</option></select> 页";
  } else {
    $ret['pagination'] = "总计 ".$ret['count']." 条记录 ".$ret['page']." ／ ".$ret['pages']." 页 <a href=$url=1><i CLASS='glyphicon glyphicon-step-backward'></i></a>&nbsp;";

    if ($p <= 1) {
      $ret['pagination'] .= "<span href='$url=1' class='disabled'><i class='glyphicon glyphicon-chevron-left'></i></span>&nbsp;";
    } else {
      $ret['pagination'] .= "<a href='$url=".($p - 1)."'><i class='glyphicon glyphicon-chevron-left'></i></a>&nbsp;";
    }

    $ret['pagination'] .= "<select id='pg' name='pg' onchange='doPaging($condition)'>";

    $i = 1;
    while ($i <= $ret['pages']) {
      $selected = ($i == $ret['page'])? ' selected':'';
      $ret['pagination'] .= "<option value='$i' $selected>$i</option>";
      $i += 1;
    }
    $ret['pagination'] .= "</select> ";

   if ($p >= $ret['pages']) {
      $ret['pagination'] .= "<span href='$url=1' class='disabled'><i class='glyphicon glyphicon-chevron-right'></i></span>&nbsp;";
    } else {
      $ret['pagination'] .= "<a href='$url=".($p + 1)."'><i class='glyphicon glyphicon-chevron-right'></i></a>&nbsp;";
    }
    $ret['pagination'] .= "<a href=$url=".$ret['pages']."><i class='glyphicon glyphicon-step-forward'></i></a>";
  }
  $rs = $db->query("select * from tblmember where referral=$ref_id and pin<>'' LIMIT $start,$rows");
  while ($row = mysqli_fetch_object($rs)) {
    $rc = ggFetchValue("select count(id) from tblmember where referral=$row->id");
    if ($rc==0) {
      if ($ref_id == $user->id) {
        $action = "";
      } else {
        $ref = ggFetchValue("select referral from tblmember where id= $row->referral");
        $action = '<a href="tjr_list.php?condition='.$ref.'" class="btn btn-info btn-xs">向上</a>';
      }
    } else {
      if ($ref_id <> $user->id) {
        $ref = ggFetchValue("select referral from tblmember where id= $row->referral");
        $action = '<a href="tjr_list.php?condition='.$ref.'" class="btn btn-info btn-sm">向上</a>&nbsp;';
      }
      $action .= '<a href="tjr_list.php?condition='.$row->id.'" class="btn btn-info btn-sm">向下</a>';
    }
    $data .= "<tr><td>$row->username</td><td>$row->fullname</td><td>$row->ref_name</td><td>$rc</td><td><b style='color:red'>0.00/0.00</b></td><td><b style='color:red'>0.00/0.00</b></td><td>$row->date_add</td><td>锁定</td><td>$action</td></tr>";
  }
  $ret['data'] = $data;
  return $ret;
}
?>
<!--Powered by TinyRise-->