<?php
	session_start();
	include("./tools/phpcaptcha/phptextClass.php");

	/*create class object*/
	$phptextObj = new phptextClass();
	/*phptext function to genrate image with text*/
	$phptextObj->phpcaptcha('#520029','#e4f72f',120,35,0,50);
 ?>