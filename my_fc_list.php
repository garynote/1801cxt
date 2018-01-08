<?
$mgroup = 1;
include("_header.php");

$list = fc_list();

?>
<section id="content">
<section class="hbox stretch">
<section>
<section class="vbox">
<section class="scrollable w-f-md" id="bjax-target">


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body" id="myModalContent">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel2"></h4>
      </div>
      <div class="modal-body" id="myModalContent2">




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>




<div class="m-t m-b-lg">
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <!-- .breadcrumb -->
        <ul class="breadcrumb" style="height:42px;">
            <li><a href="/index.php?con=ucenter&act=index"><i class="fa fa-home"></i> 我的主页</a></li>
            <li><a href="javascript:;">互助管理</a></li>
            <li class="active">付出明细</li>
        </ul>
        <!-- / .breadcrumb -->
        <form class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <strong>付出明细</strong>
                </header>
                <div class="panel-body" style="padding-bottom: 0">
                    <div class="form-group">
                    &nbsp;&nbsp;
                      诚信付出总金额:&nbsp;<b style="color:red;">￥<? echo $list['total']; ?></b>
            <!--
                        <label class="col-sm-2 control-label m-t-im">请选择第一代直推会员</label>
                        <div class="col-sm-2 m-t-im">
                            <select name="account" class="form-control m-b">
                                <option>====请选择====</option>
                            </select>
                        </div>
                        -->
                    </div>
                    <div class="form-group">
                    &nbsp;&nbsp;
                      完成付出单:&nbsp;<b style="color:red;"><? echo $list['count']; ?></b>

                    </div>

                </div>

                <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#helpOne" data-toggle="tab">完成付出单</a></li>

                    </ul>
                </header>
                <div class="tab-content m-t">
                    <div class="tab-pane active animated fadeIn" id="helpOne">
                        <div class="table-responsive" style="border: none">
                            <table class="table table-striped b-t b-light">
                              <? echo $list['data']; ?>
                            </table>
                        </div>


                        <footer class="panel-footer">

                            <div class="text-center text-center-xs">
                              <div style="z-index: 2;
                  color: #788188;
                  cursor: default;
                  border-color: #428BCA;">
                              总计 2 条记录 1 ／ 1 页<a href=/index.php?con=ucenter&act=my_fc_list&p=1>第一页</a> <span href=/index.php?con=ucenter&act=my_fc_list&p=1 class='disabled'>上一页</span> <span href=/index.php?con=ucenter&act=my_fc_list&p=2 class='disabled'>下一页</span> <a href=/index.php?con=ucenter&act=my_fc_list&p=1>最后一页</a> 到第 <select id='select' onchange='window.location.href="/index.php?con=ucenter&act=my_fc_list&p="+this.value'><option value='1' selected>1</option></select> 页                              </div>
                            </div>
                        </footer>

                    </div>

                </div>


            </section>
        </form>




    </div>
</div>
</section>

</section>
</section>
<script type="text/javascript">
function show_fc_detail(id)
{
  $("#myModalLabel").html("付出单详情");
  $.post("/index.php?con=ucenter&act=get_wan_fc_detail",{id:id},function(result){
    var result = eval("("+result+")");
    var str ='';
    for(var i=0; i < result.length; i++)
    {

      str += "<p>受益人姓名："+result[i]['js_uname']+"<br>";
      str += "受益人电话："+result[i]['mobile']+"<br>";
      str += "推荐人姓名："+result[i]['js_tuname']+"<br>";
      str += "推荐人电话：" + result[i]['tmobile']+"<br>";
      str += "金额："+result[i]['je']+"<br>";
      str += "打款时间："+result[i]['fc_time']+"<br>";
      str += "支付凭证：<a href='"+result[i]['pz_pic']+"' target='_blank' class='btn btn-info'>查看</a>";
      str += "</p>";
    }

    $("#myModalContent").html(str);
    });
}
function show_js_detail(id)
{
  $("#myModalLabel2").html("收获单详情");
  $.post("/index.php?con=ucenter&act=get_wan_js_detail",{id:id},function(result){
    var result = eval("("+result+")");
    var str = '';
    for(var i=0; i < result.length; i++)
    {
      str += "<p>";
      str += "打款人姓名："+result[i]['fc_uname']+"<br>";
      str += "打款人电话："+result[i]['mobile']+"<br>";
      str += "推荐人姓名："+result[i]['fc_tuname']+"<br>";
      str += "推荐人电话："+result[i]['tmobile']+"<br>";
      str += "金额："+result[i]['je']+"<br>";
      str += "打款时间："+result[i]['fc_time']+"<br>";
      str += "支付凭证：<a href='"+result[i]['pz_pic']+"' target='_blank' class='btn btn-info'>查看</a>";
      str += "</p>";
    }

    $("#myModalContent2").html(str);
    });
}
</script>
            </section>
        </section>
    </section>
</section>


</body>
</html>
<?
function fc_list() {
  global $db, $user;
  $res = new stdClass();

  $rs = $db->query("select * from tblhelp where mem_id = $user->id and g_type='P' and status='D' order by id desc");

  $ret['total'] = 0;
  $ret['data'] = "<thead><tr><th>单号</th><th>金额</th><th>下单时间</th><th>匹配时间</th><th>完成时间</th><th>详情</th><th>类型</th></tr></thead><tbody>";
  while ($row = mysqli_fetch_object($rs)) {
    $row->id = md5($row->id);
    $ret['total'] += $row->g_amount;
    $ret['data'] .= "<tr><td>$row->id</td><td>$row->g_amount</td><td>$row->g_date</td><td>$row->g_date</td><td>$row->g_date</td><td><a href='javascript:;' style='padding:2px 5px;' class='btn btn-info' data-container='body' data-toggle='modal' data-target='#myModal' onclick='show_fc_detail(257)''>查看</a></td><td>正常排单</td></tr>";
  }
  $ret['data'] .= "</tbody>";
  $ret['count'] = mysqli_num_rows($rs);
  if ($ret['count']=="") {
    $ret['count'] = 0;
  }
  return $ret;
}
?>
