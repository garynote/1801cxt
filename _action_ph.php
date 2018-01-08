<?

include("_dbconfig.php");
include("_ggFunctions.php");
include("_ggValidate.php");

$debug = false;
$req = ($debug)? $_GET:$_POST;

//$setup = load_setup();
//$user = load_user(0);

$now = new datetime("now");
$hour = $now->format("H");
$min = $now->format("i");

$amount = $req['HelpAmount'];
$password2_5 = md5($req['pass2']);

$pin = ggPinCount(2);
$password2 = ggFetchValue("select password2 from tblmember where id=$user->id");

$g_date = ggFetchValue("select g_date from tblhelp where mem_id=$user->id and g_type='P' and status<>'X' and status<>'C' order by id desc limit 0,1");
if ($g_date=="") {
	$days = 99;
} else {
	$date = new datetime($g_date);
	$days = ggDaysDiff($date);
}

$setup->phdays=2;
$v = new FormValidator();
$v->addValidation(1,$amount,"inlist=1000,2000","金額只開放 1000 和 2000 $amount");
$v->addValidation(2,$pin,"gt=1","排单币余额不足");
$v->addValidation(3,$password2_5,"eq=".$password2,"二级密码错误");
if ($setup->phdays>0) {
	$v->addValidation(4,$days,"gt=".$setup->phdays,"距离上次挂单还没有超过".$setup->phdays."天");
}

if (!$v->ValidateForm()) {
  $ret = array("status"=>"fail", "msg"=>$v->getError());
} else {
	$plan="1";
	$user_id = $user->id;
	$gID = ggPH($user_id,$amount,$plan);
	ggAccessLog1($user->username,"PH","$gID $amount $plan");

	$ret = array("status"=>"success","msg"=>"操作成功");
}
echo json_encode($ret);


function ggPH($mem_id,$amt,$plan) {
	global $setup,$db;
	$now = new DateTime("NOW");
	$user = load_user($mem_id);

	$hlp = ggFetchObject("select id from tblhelp order by id desc limit 1");
//	if ($hlp=="" or $hlp->id < 1) {
//		$hlp->id=0;
//	}

	//$nid = $hlp->id + 1;
	$nid = $hlp->id + rand(1,1);
	$res = $db->query("INSERT INTO `tblhelp` (id, g_type, mem_id, mgr_id, g_date, g_plan, g_amount, g_pending, status, reentry, date_match, date_close, note) VALUES
						($nid, 'P', $mem_id, $user->manager, '".$now->format('Y-m-d H:i:s')."', $plan, $amt, $amt, 'O', 1, '0000-00-00', '0000-00-00', '')") or die("Insert Help: ".$db->error);
	$gID = $db->insert_id;

  $pin = ggFetchValue("select pin from tblpin2 where managerid = $user->id and status='N' limit 1");
  $rs1 = $db->query("update tblpin2 set status='U',usedate=now(), useby = '$gID' where managerid=$user->id and pin='$pin'");

	$res = ggPH1($gID, $mem_id,$amt,$now,$plan);

	return $gID;
}

?>