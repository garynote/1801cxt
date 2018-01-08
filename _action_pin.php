<?
include ('_dbconfig.php');
include ('_ggFunctions.php');
include ('_ggValidate.php');

$debug=false;

$req = ($debug)? $_GET:$_POST;

if (isset($req['lang'])) {
  $lang = $req['lang'];
}
$pin_type = $req['pin_type'];

$pinqty 	= $req['PinQty'];
$to_user 	= $req['to_user'];
$password2_5 = md5($req['password2']);

$ls = new stdClass();
if ($pin_type==1) {
  $ls->pin_name = array("Activation Pin","激活码","激活碼");
} else if ($pin_type == 2) {
  $ls->pin_name = array("Que Pin","排单币","排單幣");
} else {
  $ls->pin_name = array("PinX","币X","幣X");
}
$ls->ac_bal   = array("You don't have enough pins to transfer", $ls->pin_name[$lang]."余额不足",$ls->pin_name[$lang]."餘額不足");

$ls->to_user_req = array("Share to can not be blank","分享对象不能为空","分享對象不能為空");
$ls->to_user_exist = array("Username not found in system","没有这个账号","沒有這個賬號");
$ls->to_user_self = array("Can not transfer to yourself","不能共享给自己","不能共享給自己");
$ls->password2_eq = array("Invalid second password", "二级密码错误","二級密碼錯誤");

$pin = ggPinCount($pin_type);

$password2 = ggFetchValue("select password2 from tblmember where id = $user->id");
$to_user_c = ggFetchValue("select username from tblmember where username = '$to_user'");
$id_c = ggFetchValue("select id from tblmember where username = '$to_user'");

$v = new FormValidator();
$v->addValidation(1,$to_user,"req",$ls->to_user_req[$lang]);
$v->addValidation(2,$to_user,"eq=".$to_user_c,$ls->to_user_exist[$lang]);
$v->addValidation(3,$id_c,"neq=".$user->id,$ls->to_user_self[$lang]);
$v->addValidation(4,$pin,"gt=1",$ls->ac_bal[$lang]);
$v->addValidation(5,$password2_5,"eq=".$password2,$ls->password2_eq[$lang]);

if (!$v->ValidateForm()) {
  $ret = array("status"=>"fail", "msg"=>$v->getError());
} else {
	$rep = ggPinTransfer($pin_type,$pinqty,$to_user);
	$ret = array('status'=>"success",'msg'=>"done");
}
echo json_encode($ret);

function ggPinTransfer($pin_type,$pinqty,$username) {
	global $db,$user,$ls,$msg, $lang;
	$ret = 0;
  $oth = ggFetchObject("select * from tblmember where username='$username'");
	$oth_id = $oth->id;
	$oth_rank = $oth->rank;
	$tt = ggTransPin($pin_type,$user->id,$oth->id,$user->username,$oth->username,$pinqty);
	return "";
}

function ggTransPin($pin_type,$from,$to,$efrom,$eto,$qty) {
	global $db;
	$date = ggNows(); //ggNow();
	$add1 = $db->query("insert into tblpintran".$pin_type." (idfrom, idto,efrom,eto, qty,trdate) values ($from, $to, '$efrom', '$eto', $qty, '$date')");
	$log = mysqli_insert_id();

	$pin = $db->query("select * from tblpin".$pin_type." where managerid = $from and status = 'N' limit $qty");
	while ($row = mysqli_fetch_object($pin)) {
		$u = $db->query("update tblpin".$pin_type." set managerid=$to, requestdate='$date', note1='$log' where id = $row->id");
	}
}
?>