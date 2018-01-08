<?php
	session_start();
	include("./tools/phpcaptcha/phptextClass.php");

	/*create class object*/
	$phptextObj = new phptextClass();
	/*phptext function to genrate image with text*/
	$phptextObj->phpcaptcha('#000','#FEC',120,35,5,80);
 ?>