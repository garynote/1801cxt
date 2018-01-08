<?
$mgroup = 3;
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
            <li><a href="javascript:;">财务管理</a></li>
            <li class="active">奖金明细</li>
        </ul>
        <!-- / .breadcrumb -->
        <div class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>奖金明细</strong>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im">单号</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" name="search_text" value="" id="search_text" class="form-control parsley-validated" data-required="true" placeholder="输入要查询的来源单号">
                        </div>
                        <div class="col-sm-2 m-t-im">
                          <!--
                            <button type="button" class="btn btn-info btn-s-xs" onclick="search_jj()">查询</button>
                            -->
                            <input type="button" class="btn btn-info btn-s-xs" onclick="search_jj()" value="查询"/>
                        </div>
                    </div>
                    <!----end form-group--->
                </div>
                <div class="table-responsive" style="border: none">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>生成时间</th>
                            <th>奖金来源</th>
                            <th>静态奖</th>
                            <th>销售奖</th>
                            <th>新人体验奖</th>
                            <th>是否到帐</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <footer class="panel-footer">
                    <div class="text-center text-center-xs">
                      <div style="z-index: 2;
              color: #788188;
              cursor: default;
              border-color: #428BCA;">
                           总计 0 条记录 1 ／ 0 页<a href=account.php&p=1>第一页</a> <span href=account.php&p=1 class='disabled'>上一页</span> <span href=account.php&p=2 class='disabled'>下一页</span> <a href=account.php&p=0>最后一页</a> 到第 <select id='select' onchange='window.location.href="account.php&p="+this.value'></select> 页                         </div>
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
        </div>




    </div>
</div>
</section>

</section>
</section>
<!-- side content -->

</section>
<script type="text/javascript">
function search_jj()
{
  var search_text = $("#search_text").val();
  var url = "account.php";
  if(search_text == null || search_text == "")
  {
    document.location.href = url;
  }
  else
  {
    document.location.href = url+"&condition="+search_text;
  }
  /*
  var search_text = $("#search_text").val();
  alert(search_text);return;
  if(search_text == null || search_text == '')
  {
    document.location.href = account.php;
  }
  else
  {
    document.location.href = account.php+"&condition/"+search_text;
  }
  */
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