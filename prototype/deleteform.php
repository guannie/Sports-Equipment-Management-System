<?php 
$configurationFile='include/config.php';
include($configurationFile);
include('include/function.php');
session_start();



// STATEMENT FOR DISPLAYING VARIABLES
 $EquipmentID=$_GET['id'];
 $MaintainanceType="DELETE";
 $userid=$_GET['eid'];


//SQL STATEMENT
 $sql1="UPDATE `equipment` 
	 SET `EquipmentQuantity`='0'
	 WHERE idEquipment='".$EquipmentID."'";
$sql2="INSERT maintainance(invoiceNo, MaintainanceType,idStaff,idEquipment)
VALUES ('NULL','".$MaintainanceType."','".$userid."', '".$EquipmentID."')";

//SQL STATEMENT END
$db=mysql_select_db($database,$virtual_con);


	$result=mysql_query($sql1);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	
	$result=mysql_query($sql2);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	
	$to='delete.php?eid='.$userid;
		gotoInterface($to);	



?>
