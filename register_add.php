<?
include ('_dbconfig.php');
include ('_ggFunctions.php');
include ('_ggValidate.php');

$debug = false;
$req = ($debug)? $_GET:$_POST;

$user = load_user(0);
$setup = load_setup();
$setup->maxaccount 	= 1;
$setup->maxphone 		= 1;
$setup->username_len = 4;
$setup->phone_len 	= 11;
$setup->password_min = 6;

$username 	= $req['username'];
$email 		= "";
$password 		= $req['password'];
$repassword 	= $req['repassword'];

$password2 		= $req['password2'];
$repassword2 	= $req['repassword2'];

$fullname 		= $req['fullname'];
$phone 				= $req['phone'];
$referral 		= $req['referral'];
$phonecode 		= $req['phonecode'];
$country 			= "";
//$pin 				= $req['pin'];
$password_5 = md5($req['password']);
$agree        = $req['agree'];


$lang=1;
$ls = new stdClass();
$ls->username_req = array("Username can not be blank","用户名不能为空","用戶名不能為空");
$ls->username_min = array("Username must be $setup->username_len characters and above", "用户名不合格（".$setup->username_len."-20位字符、数字组合）","用戶名不合格（".$setup->username_len."-20位字符，數字組合）");
$ls->username_regexp = array("Username contain only alphabets, numbers and '-' sign, eg. abc-001", "用户名不合格 - 只接受英文字母, 数字和 '-' 例如：abc-001","用戶名不合格 只接受英文字母,數字和 '-' 例如：abc-001");
$ls->username_dupe = array("Username already exist in system", "您输入的用户名已存在", "您輸入的用戶名已存在");
$ls->phone_num    = array("Phone No can only contain numbers", "手机号码不合规格","手機號碼不合規格");
$ls->phone_min    = array("Phone No must be $setup->phone_len characters", "手机号码必须是 $setup->phone_len 个数字","手機號碼必須是 $setup->phone_len 個數字");
$ls->phone_max    = array("Phone No can only register ".$setup->maxaccount." accounts", "手机号码只能注册".$setup->maxaccount."个账户","手机号码只能注册".$setup->maxaccount."个账户");
$ls->password_req = array("Password can not be blank", "密码不能为空","密碼不能為空");
$ls->password_min = array("Password must be $setup->password_min characters and above", "密码必须 $setup->password_min 个字符以上","密碼必須 $setup->password_min 個字符以上");
$ls->password_eq  = array("Password and confirm not match", "确认密码不匹配","確認密碼不匹配");
$ls->password2_req = array("Second Password can not be blank", "二级密码不能为空","二級密碼不能為空");
$ls->password2_min = array("Second Password must be $setup->password_min characters and above", "二级密码必须 $setup->password_min 个字符以上","二級密碼必須 $setup->password_min 個字符以上");
$ls->password2_eq  = array("Second Password and confirm not match", "二级密码确认密码不匹配","二級密碼確認密碼不匹配");

$ls->country_e1 = array("[Country] Please nominate your country", "请选择国家","請選擇國家");
$ls->pin_req      = array("Invalid Register PIN", "激活码无效","激活碼無效");
$ls->referral_req = array("Sponsor can not be blank", "推荐人账号不能為空","推薦人賬號不能為空");
$ls->referral_eq = array("Sponsor can not find this sponsor", "找不到这个推荐人账号","找不到這個推薦人賬號");
$ls->fullname_req = array("Fullname can not be blank","真实姓名不能为空","真實姓名不能為空");
$ls->phone_regexp = array("Invalid phone number", "手机号码不合規格","手機號碼不合規格");
$ls->phone_req    = array("Phone number can not be blank", "手机号码不能为空","手機號碼不能為空");
$ls->phonecode_err = array("Invalid Phone validation code", "短信验证码错误","短信验证码错误");
$ls->agree_chk		= array("You must thick agree to proceed","请勾选同意条款","請勾選同意條款");


$username_c = ggFetchValue("select count(username) from tblmember where username='$username'");
$referral_c = ggFetchValue("select count(id) from tblmember where username='$referral'");

/*
if ($pin=="") {
	$pin = ggFetchValue("select pin from tblpin where managerid=$user->id and status='N'");
} else {
	$pin = ggFetchValue("select pin from tblpin where managerid=$user->id and status='N' and pin='$pin'");
}
*/

$v = new FormValidator();
$v->addValidation(1,$username,"req",$ls->username_req[$lang]);
$v->addValidation(2,$username_c,"lt=1",$ls->username_dupe[$lang]);
$v->addValidation(3,$username,"minlen=4",$ls->username_min[$lang]);
$v->addValidation(4,$username,"regexp=/^[A-Za-z0-9-]{4,20}$/",$ls->username_regexp[$lang]);
$v->addValidation(5,$password,"req",$ls->password_req[$lang]);
$v->addValidation(6,$password,"minlen=".$setup->password_min,$ls->password_min[$lang]);
$v->addValidation(7,$password,"eqelmnt=repassword",$ls->password_eq[$lang]);
$v->addValidation(8,$password2,"req",$ls->password2_req[$lang]);
$v->addValidation(9,$password2,"minlen=".$setup->password_min,$ls->password2_min[$lang]);
$v->addValidation(10,$password2,"eqelmnt=repassword2",$ls->password2_eq[$lang]. "$password2 $repassword2");
$v->addValidation(11,$referral,"req",$ls->referral_req[$lang]);
$v->addValidation(12,$referral_c,"elemnt=referral",$ls->referral_eq[$lang]);
//$v->addValidation(9,$phone,"minlen=8",$ls->phone_min[$lang]);
$v->addValidation(13,$fullname,"req",$ls->fullname_req[$lang]);
$v->addValidation(14,$phone,"req",$ls->phone_req[$lang]);
$v->addValidation(15,$phone,"regexp=/^[1][3-9][0-9]{9}/",$ls->phone_regexp[$lang]);
$v->addValidation(16,$pcount,"lt=2",$ls->phone_max[$lang]);
$v->addValidation(17,$phonecode,"eq=123456",$ls->phonecode_err[$lang]);
$v->addValidation(18,$agree,"shouldselchk=1",$ls->agree_chk[$lang]);

//$v->addValidation($pin,"req",$ls->pin_req[$lang]);
//$v->addValidation("verifyCode","eq=".$_SESSION['captcha_code'],"验证码错误");

if (!$v->ValidateForm()) {
  $ret = array("status"=>"fail", "msg"=>$v->getError());
} else {
	$dummy = ggAddMember($email,$username,$phone,$referral,$password);
	$ret = array('status'=>"success", 'msg'=>'操作成功','username'=>$username);
}

echo json_encode($ret);


function ggAddMember($email,$username,$phone,$referral,$password) {
	global $db,$user,$ls,$msg, $lang;
	$ret = 0;

	$ref = ggFetchObject("select id,rank,username from tblmember where username='$referral'");
	$ref_id = $ref->id;
	$ref_name = $ref->username;

	$username = $username;
	//$password = generatePassword(8);
	$password5 = md5($password);

	// Default to Manager if register by Senior Manager and above
	$mgr_id = $user->id;
	$mgr_name = $user->username;
	$rs = $db->query("INSERT INTO tblmember (id,username, password,phone,referral,manager,ref_name, mgr_name,date_add,rank,status)
		VALUES (NULL ,'$username','$password5','$phone',$ref_id,$mgr_id,'$ref_name','$mgr_name',NOW(),1, 'A')") or die("err ".$db->error);
	$nid = $db->insert_id;
	$nuser = load_user($nid);
		//$rs1 = $db->query("update tblpin set useby = '$nuser->username',usedate=NOW(), status='U' where managerid=$mgr_id and status='N' and pin = '$pin'");

	ggRegister1($nid,$username);
	ggAccessLog1($user->username,"NEW","$nid $username $country $ref_id $mgr_id");

	//send_welcome($email,$fullname,$password,'en');

	return "";
}

?>