<?php 
include('setting.php');
$test='include/config.php';
//echo $myurl;
//echo $test;
include($test);
include('include/function.php');
session_start();
$userid=$_GET['txtuserid'];
$password=$_GET['txtpassword'];
$UserType=$_GET['UserType'];
$Name=$_GET['txtName'];
$MobileNumber=$_GET['txtphone'];

//$sql="INSERT tbluser (UserID, Password, UserType, Name, MobileNumber ) 
//VALUES ('".$userid."', `'".$password."', '".$UserType."', '".$Name."', '".$MobileNumber."')";

	$sql="UPDATE tbluser SET Password='".$password."', UserType='".$UserType."', Name='".$Name."', MobileNumber='".$MobileNumber."' WHERE UserID='".$userid."'";

	//SQL STATEMENT END
	$db=mysql_select_db($database,$virtual_con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
		$to='listuser.php';
	
		gotoInterface($to);
		
		
	
?>

