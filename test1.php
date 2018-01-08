<?

include "_ggValidate.php";

$validator = new FormValidator();
$validator->addValidation("Name","req","");
$validator->addValidation("Name","maxlen=5","Please fill in Name max 5");
$validator->addValidation("Email","req","Please fill in Email");
$validator->addValidation("Age","eq=你好","Age must be = 5");
$validator->addValidation("Password","eqelmnt=Pass2","Password Error");

if ($validator->ValidateForm()) {
    echo "<h2>Validation Success!</h2>";
} else {
    echo "<B>Validation Errors:</B>";

    echo "<br>".$validator->GetError();

    echo "<br>".$validator->GetErrors(0);
}

?>