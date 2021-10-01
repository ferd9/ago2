<?php
// This code was created by phpMyBackupPro  
// 
$_POST['db']=array("ago", );
$_POST['tables']="on";
$_POST['data']="on";
$_POST['drop']="on";
$period=(3600*24)/24;
$security_key="f1fee1d9766c1fd4d2710c705257ec2b";
// This is the relative path to the phpMyBackupPro  directory
@chdir("../../sq/");
@include("backup.php");
?>