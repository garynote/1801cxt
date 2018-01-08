<?
$mgroup = 1;
include("_header.php");

$pin = ggFetchObject("select count(id) as ctr from tblpin where managerid=$user->id and status='N'");
$user->direct = 10;
$user->wallet_a1 = 0.01;
$user->wallet_a2 = 0.02;
$user->wallet_p1 = 0.03;
$user->wallet_p2 = 0.04;
$user->pin1 = ggPinCount(1);
$user->pin2 = ggPinCount(2);

$phlist = new StdClass();
$phlist = ggPhList();

$ghlist = new StdClass();
$ghlist = ggGhList();
?>
<section id="content">
<? include ("inc/_db_ads.php"); ?>
<? include ("inc/_db_modal.php"); ?>
<? include ("inc/_db_modal2.php"); ?>
<? include ("inc/_db_modal_kstd.php"); ?>
<? include ("inc/_db_modal_zysc.php"); ?>
<? include ("inc/_db_modal3.php"); ?>
<? include ("inc/_db_uppz_modal.php"); ?>
<? include ("inc/_db_modal_zhifu.php"); ?>
<? include ("inc/_db_modal_report.php"); ?>
<? include ("inc/_db_modal_hxbz.php"); ?>
<? include ("inc/_db_modal_article.php"); ?>

<div class="row" style="margin:20px 10px 0px 10px;">
    <div class="col-xs-12 col-lg-6">
        <? include("inc/_db_info.php"); ?>
    </div>

    <div class="col-xs-12 col-lg-6">
        <? include("inc/_db_news.php"); ?>
    </div>
</div>

<? include("inc/_db_main_buttons.php"); ?>

                <section class="hbox stretch">
                    <section>
                        <section class="vbox">
                            <section class="scrollable padder">                                                                                            <section class="panel panel-default">
                                    <header class="panel-heading bg-light">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li class="active"><a href="#help" data-toggle="tab" style="color:red;font-size:25px;">进行中的付出单<label style="color:red;">&nbsp;<? echo $phlist['count']; ?></label></a></li>
                                            <li class=""><a href="#shelp" data-toggle="tab" style="color:green;font-size:25px;" onclick="shelp_do()">进行中的收获单<label style="color:green;">&nbsp;<? echo $ghlist['count']; ?></label></a></li>
                                        </ul>
                                    </header>
                                    <div id="div_scroll" class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane animated fadeIn active" id="help">
                                                <div class="list-group no-radius row">
                                                    <? echo $phlist['list']; ?>

                                                </div>
                                            </div>

                                            <div class="tab-pane animated fadeIn" id="shelp">
                                                <div class="list-group no-radius row">
                                                    <? echo $ghlist['list']; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>



                            </section>
                        </section>
                    </section>
                    <!-- side content -->
                </section>
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>

<?
include("inc/_db_script.php");

include("footer.php");

function ggPhList() {
  global $db,$user;
  $rs = $db->query("select * from tblhelp where mem_id = $user->id and g_type='P' and status<>'D' and status<>'X' order by id desc;");
  $ret = array();
  $ret['count'] = ($rs=="")? 0:mysqli_num_rows($rs);
  $ret['list'] = "";
  $list1 = "";
  while ($row = mysqli_fetch_object($rs)) {
      $row->g_amount1 = number_format($row->g_amount*1.15,2);
      $row->g_amount = number_format($row->g_amount,2);
      $status = new stdClass();
      $status = ggStatus1($row);
      $ret['list'] .= "<a class='list-group-item clearfix' href='javascript:;'>
        <span class='col-lg-3 block'><i class='fa fa-dot-circle-o m-r-sm text-primary'></i>单号：".md5($row->id)."</span>
        <span class='col-lg-2 block'>金额：<span class='text-danger'>￥$row->g_amount</span></span>
        <span class='col-lg-3 block'>预期收益：$row->g_amount1</span>
        <span class='col-lg-3 block'>时间：$row->g_date</span>
        <span class='col-lg-2 block'>分配受单数：0</span>
        <span class='col-lg-3 block'>已打款单数：0</span>
        <span class='col-lg-2 block'>等待天数： $status->days</span>
        </a>";
        $rs1 = $db->query("select * from tblhelpdetail where help_id = ".$row->id." and g_type='P' order by id desc");
        while ($row1 = mysqli_fetch_object($rs1)) {
            $user_o = load_user($row1->oth_id);
            $user_m = load_user($user_o->referral);
            $status = ggStatus2($row1);
            $upload = ($row1->stage=='0')? "<input type='button' class='btn btn-info' value='上传付款凭证' data-toggle='modal' data-target='#uppz_modal' onclick='show_upload_pz($row1->id)'/>&nbsp;&nbsp;":"";
            $list1 .= "<a class='list-group-item clearfix' href='javascript:;' style='background:rgb(227,185,222);'>
              <span class='col-lg-3 block'>用户名：<span class='text-danger'>$user_o->username</span></span>
              <span class='col-lg-3 block'>受益人姓名：<span class='text-danger'>$user_o->fullname</span></span>
              <span class='col-lg-3 block'>受益人电话：$user_o->phone</span>
              <span class='col-lg-3 block'>金额：<b style='color:red;'>$row1->g_amount</b></span>
              <span class='col-lg-3 block'>推荐人姓名：$user_m->fullname</span>
              <span class='col-lg-3 block'>推荐人电话：$user_m->phone</span>
              <span class='col-lg-3 block'>付款时限：$row1->g_date</span>
              <span class='col-lg-3 block'>状态：<b style='color:red;'>$status->status</b></span>
              <span class='col-lg-4 block'>$upload
              <input type='button' class='btn btn-info' value='支付详情' onclick=\"show_fc_detail('2000.00','郭亚兴','2017-12-26 15:01:59','3小时57分18秒','17764119919','','康平支行','6228481628545103472')\">
              </span></a>";
        }
    }
  $ret['list'] .= $list1 . "<br><br><br><br><br>";
  return $ret;
}
function ggGhList() {
  global $db,$user;
  $rs = $db->query("select * from tblhelp where mem_id = $user->id and g_type='G' and status<>'X' order by id desc;");
  $ret = array();
  $ret['count'] = mysqli_num_rows($rs);
  $ret['list'] = "";
  while ($row = mysqli_fetch_object($rs)) {
      $row->id = md5($row->id);
      $row->g_amount1 = number_format($row->g_amount*1.15,2);
      $row->g_amount = number_format($row->g_amount,2);
      $status = new stdClass();
      $status = ggStatus1($row);
      $ret['list'] .= "<a class='list-group-item clearfix' href='javascript:;'>
        <span class='col-lg-3 block'><i class='fa fa-dot-circle-o m-r-sm text-primary'></i>单号：".md5($row->id)."</span>
        <span class='col-lg-2 block'>金额：<span class='text-danger'>￥$row->g_amount</span></span>
        <span class='col-lg-3 block'>预期收益：$row->g_amount1</span>
        <span class='col-lg-3 block'>时间：$row->g_date</span>
        <span class='col-lg-2 block'>分配受单数：0</span>
        <span class='col-lg-3 block'>已打款单数：0</span>
        <span class='col-lg-2 block'>等待天数： $status->status</span>
        </a>";
  }
  $rs = $db->query("select * from tblhelpdetail where mem_id = $user->id and g_type='G' order by id desc");
  while ($row = mysqli_fetch_object($rs)) {
      $user_o = load_user($row->oth_id);
      $user_m = load_user($user_o->referral);
      $status = ggStatus2($row);
      $upload = ($row->stage=='1')? "<input type='button' class='btn btn-info' value='付款凭证确认' data-toggle='modal' data-target='#uppz_modal' onclick='show_upload_pz($row->id)'/>&nbsp;&nbsp;":"";
      $ret['list'] .= "<a class='list-group-item clearfix' href='javascript:;' style='background:rgb(227,185,222);'>
        <span class='col-lg-3 block'>用户名：<span class='text-danger'>$user_o->username</span></span>
        <span class='col-lg-3 block'>受益人姓名：<span class='text-danger'>$user_o->fullname</span></span>
        <span class='col-lg-3 block'>受益人电话：$user_o->phone</span>
        <span class='col-lg-3 block'>金额：<b style='color:red;'>$row->g_amount</b></span>
        <span class='col-lg-3 block'>推荐人姓名：$user_m->fullname</span>
        <span class='col-lg-3 block'>推荐人电话：$user_m->phone</span>
        <span class='col-lg-3 block'>付款时限：$row->g_date</span>
        <span class='col-lg-3 block'>状态：<b style='color:red;'>$status->status</b></span>
        <span class='col-lg-4 block'>$upload
        <input type='button' class='btn btn-info' value='支付详情' onclick=\"show_fc_detail('2000.00','郭亚兴','2017-12-26 15:01:59','3小时57分18秒','17764119919','','康平支行','6228481628545103472')\">
        </span></a>";
  }
  $ret['list'] .= "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
  return $ret;
}

function ggStatus1($row) {
      $ret = new stdClass();
      $now = new DateTime("NOW");
      $g_date = new DateTime($row->g_date);
      $interval = $now->diff($g_date);
      $days = $interval->format("%d");
      $pending1 = "";
      $pending2 = "";

      if ($row->status=="X") {
         $color = 'silver';
         $status = "已取消";
      } else if ($row->status=="P") {
         $color = '#bcd979';
         $status = "配对中";
         $pending1 = "待配对<br>";
         $pending2 = number_format($row->g_pending)."  人民币<br>";
      } else if ($row->status=="C") {
         $color = '#bcd979';
         $status = "已经配对";
      } else if ($row->status=="D") {
         $color = '#bcd979';
         $status = "已经完成";
      } else if ($row->status=="F") {
         $color = '#bcd979';
         $status = "<b class=red>订单失效</b>";
      } else if ($row->status=="B") {
         $color = '#bcd979';
         $status = "<b class=red>订单已被封锁</b>";
      } else {
         $color = '#bcd979';
         $status = "等待中 （$days 天）";
      }
      $cancel = "";
      if ($row->status=="O" and $days < 7) {
          $cancel = "<br><a ref='#' class='btn btn-danger' onclick='doCancel($row->id)'>取消</a>";
      }
      $ret->status = $status;
      $ret->color = $color;
      $ret->pending = $pending1.' '.$pending2;
      $ret->cancel = $cancel;

      $ret->days = $days.' 天';

      return $ret;
}

function ggStatus2($row) {
      $ret = new stdClass();
      $now = new DateTime("NOW");
      $g_date = new DateTime($row->g_date);
      $interval = $now->diff($g_date);
      $days = $interval->format("%d");
      $pending1 = "";
      $pending2 = "";

      if ($row->stage=="0") {
         $color = 'silver';
         $status = "已配对，等待打款";
      } else if ($row->stage=="1") {
         $color = '#bcd979';
         $status = "已打款，等待确认";
      } else if ($row->stage=="2") {
         $color = '#bcd979';
         $status = "已确认收款";
      } else {
         $color = '#bcd979';
         $status = "$row->stage 等待中 （$days 天）";
      }
      $cancel = "";
      if ($row->status=="O" and $days < 7) {
          $cancel = "<br><a ref='#' class='btn btn-danger' onclick='doCancel($row->id)'>取消</a>";
      }
      $ret->status = $status;
      $ret->color = $color;
      $ret->pending = $pending1.' '.$pending2;
      $ret->cancel = $cancel;

      $ret->days = $days.' 天';

      return $ret;
}
?>