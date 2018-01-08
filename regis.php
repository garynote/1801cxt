<?
if (isset($_POST['user_id']) or isset($_POST['name'])) {
  $user_id = $_POST['user_id'];
  $validate_code = $_POST['validate_code'];
  $tjrname = $_POST['tjrname'];
  $name = $_POST['name'];
  $xm_name = $_POST['xm_name'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  echo json_encode(array("status"=>"success",'msg'=>'Success Msg'));
} else {
  echo json_encode(array("status"=>"fail",'msg'=>'Error Msg'));
}
?>