<?
include("_dbconfig.php");
include("_ggFunctions.php");

$username = $_POST['username'];
$res = ggFetchObject("select username from tblmember where username='$username'");
if ($res->username=="") {
  $ret = 0;
} else if ($user->username == $res->username) {
  $ret = 1;
} else {
  $ret = $res->username;
}
echo $ret;
?>