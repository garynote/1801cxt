<?
include_once("inc/ggDbconfig.php");
$user = load_user(0);

if ($user->logged==1) {
  header("location: dashboard.php");
} else {
  header("location: login.php");
}
?>