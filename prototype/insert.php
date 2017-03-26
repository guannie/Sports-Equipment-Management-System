<?php 
//DATABASE CONFIGURATION SETTING
$configurationFile='include/config.php';
include($configurationFile);
include('include/function.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 





// STATEMENT FOR DISPLAYING VARIABLES
$userid=$_POST['ID'];
$EquipmentName=NULL;
$EquipmentPrice=$_POST['Price'];
$EquipmentQuantity=$_POST['Quantity'];
$InvoiceNo=$_POST['Invoice'];
$MaintainanceType="INSERT";
$EquipmentID=NULL;


	//DATABASE CONNECTION
	$db=mysql_select_db($database,$virtual_con);
	
	
	$sql="SELECT idStaff FROM `staff` WHERE idStaff='".$_POST['ID']."'";
	$query=mysql_query($sql);
	
		if(!$record = mysql_fetch_array($query)){
			echo "<script>alert(\"The Employee ID is incorrect\");</script>";
			 echo "<script>window.location.assign('insert.html');</script>";	
		}
	//SQL STATEMENT
	$sql="SELECT * FROM `equipment` WHERE 1";
	//SQL STATEMENT END
	$query=mysql_query($sql);
	if (!$query) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	while ($record = mysql_fetch_array($query))
	{
		if($record['EquipmentName'] == $_POST['Name']){
			 $EquipmentID=$record['idEquipment'];
			 $EquipmentName=$record['EquipmentName'];
		}
	}
	if($EquipmentName==NULL ){
		$EquipmentName=$_POST['Name'];
		$sql1="INSERT equipment (EquipmentName, EquipmentAvgPrice, EquipmentQuantity, AvailableEquipment) 
			VALUES ('".$EquipmentName."', '".$EquipmentPrice."', '".$EquipmentQuantity."', '".$EquipmentQuantity."')";
			$query1=mysql_query($sql1);
			if (!$query) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}
			
			$sql2="SELECT `idEquipment` FROM `equipment` WHERE `EquipmentName`= '".$EquipmentName."'";
			$query2=mysql_query($sql2);
			if (!$query) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}		
			$record2 = mysql_fetch_array($query2);
				 $EquipmentID=$record2[0];
	
	
	
			$sql3="INSERT maintainance (invoiceNo, MaintainanceType, idEquipment, idStaff)
			VALUES ('".$InvoiceNo."','".$MaintainanceType."', '".$EquipmentID."', '".$userid."')";	
			
			$query=mysql_query($sql3);
			if (!$query) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}

		echo "<script>alert(\"The data was inserted successful\")</script>"; 
		
	}else{	
		echo "<script>alert(\"The specified Equipement is already in the database.Please proceed to the update form.\")</script>";
		echo "<script>window.location.assign('confirmIDupdate.html');</script>";	
	}
		echo "<script>window.location.assign('insert.html');</script>";	
?>

</body>
</html>