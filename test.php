<?
    include("validate.php");

    $u_validate =  new Validate();

    $pass ="122";
    $data  = array(
        array("username"=>"",
            "username1"=>"你好",
            "phone"=>"1122",
            "age"=>"15",
            "age1"=>"15a",
            "pass2"=>"2",
            "name4"=>"admin173.com",
            "password"=>"123",
            "sex"=>"X",
            "pin"=>"10",
            "referral"=>0)
);

    $rules = array(
        array('name'=>"username","func"=>"required","msg"=>"用户姓名不能为空","options"=>array("on"=>true)),
        array('name'=>"username1","func"=>"zh","msg"=>"用户名只接受英文字符"),
        array('name'=>"phone","func"=>'rangelen',"params"=>array(6,8),"msg"=>"电话号码必须是{0}到{1}个字符"),
        array('name'=>"phone","func"=>'strlen',"params"=>11,"msg"=>"电话号码必须是{0}个字符"),
        array('name'=>"age","func"=>"range","params"=>array(18,40),"msg"=>"年龄必须是{0}到{1}岁之间"),
        array('name'=>"age1","func"=>"int","params"=>1,"msg"=>"年龄必须是数字"),
        array('name'=>"email","func"=>"email","params"=>1,"msg"=>"邮箱格式不对"),
        array('name'=>"password","func"=>"equal","params"=>"$pass","msg"=>"密码错误"),
        array('name'=>"sex","func"=>"in","params"=>array("M","F"),"msg"=>"性别必须是 M 或者 F"),
        array('name'=>"pin","func"=>"max","params"=>"1","msg"=>"激活码不足"),
        array('name'=>"referral","func"=>"min","params"=>"1","msg"=>"推荐人账号不存在")
    );

    if (!$u_validate->check($data, $rules)) {
        echo $u_validate->getError();
    }
?>
