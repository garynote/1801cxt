<?
include ("_dbconfig.php");
include ("./tools//phpqrcode/qrlib.php");
$file = "./upload/".$user->id.".png";
QRcode::png("http://baidu.com/?tjr_id=".$user->username, $file, "H", 10, 2);
$mgroup=7;
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

        </ul>
        <!-- / .breadcrumb -->
        <div class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>推广链接</strong>
                </header>
                <div class="panel-body">

                </div>
                <div class="table-responsive" style="border: none">
                    <table class="table table-striped b-t b-light">

                        <tbody>
                                                  <tr>
                            <td>
                              推广链接：(长按并选择复制)
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <a target="_blank" style="color:#d84646;text-transform:lowercase;" href="./reg_user1.php?tjr_id=gaozong" id="to_copy_text">
                                    http://domain.com/reg_user1.php?tjr_id=<? echo $user->username; ?> </a>

                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img width="250px;" height="250px;" src="<? echo $file; ?>"/>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              扫一扫二维码
                            </td>
                          </tr>

                        </tbody>
                    </table>
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