<?php 
//DATABASE CONFIGURATION SETTING
$configurationFile='include/config.php';
include($configurationFile);
include('include/function.php');
session_start();


// STATEMENT FOR DISPLAYING VARIABLES
$TransactionType=$_POST['type'];
$UserID=$_POST['UserID'];
$EquipmentID=$_POST['EId'];
$EquipmentQuantity=$_POST['EQuantity'];
$Date=$_POST['txtDateLeft'];
$Time=$_POST['txtTimeLeft'];
	



$sql="SELECT `AvailableEquipment` FROM `equipment` WHERE `idEquipment`='".$EquipmentID."'";
	$query=mysql_query($sql);
	$record = mysql_fetch_array($query);
	$AvailableQuantity=$record['AvailableEquipment'];
	if($AvailableQuantity<='0'){
		if(($AvailableQuantity-$EquipmentQuantity)<0)
		echo "<script>alert(\"The equipment is either insuffiecient or currently unavailable.\")</script>";
	$to='lend_return.php';
		gotoInterface($to);	
	}
	else{
	if($TransactionType == 'Lending')
	{	$AvailableQuantity=$AvailableQuantity-$EquipmentQuantity;
	}else if($TransactionType == 'Returning'){
		$AvailableQuantity=$AvailableQuantity+$EquipmentQuantity;
	}
	$sql="UPDATE `equipment`
			SET AvailableEquipment='".$AvailableQuantity."'
			WHERE idEquipment='".$EquipmentID."'";
	$query=mysql_query($sql);
	if (!$query) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}

	
$sql="SELECT idUser FROM `user` WHERE idUser='".$UserID."'" ;
$query=mysql_query($sql);
	
		if(!$record = mysql_fetch_array($query)){
			echo "<script>alert(\"The User ID is incorrect\");</script>";
			 echo "<script>window.location.assign('lend_return.php');</script>";	
		}

//SQL STATEMENT
	$sql="INSERT INTO `transaction`(`TransactionType`, `TransactionQuantity`, `TransactionDate`, `TransactionTime`, `idEquipment`, `idUser`) 
		VALUES ('".$TransactionType."','".$EquipmentQuantity."','".$Date."','".$Time."','".$EquipmentID."','".$UserID."')";

//SQL STATEMENT END
$db=mysql_select_db($database,$virtual_con);

	
	$sql="INSERT INTO `transaction`(`TransactionType`, `TransactionQuantity`, `TransactionDate`, `TransactionTime`, `idEquipment`, `idUser`) 
		VALUES ('".$TransactionType."','".$EquipmentQuantity."','".$Date."','".$Time."','".$EquipmentID."','".$UserID."')";
	$query=mysql_query($sql);
	if (!$query) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	
	
	
	
	echo "<script>alert(\"The transaction was successful recorded.\")</script>";
	}
	$to='lend_return.php';
		gotoInterface($to);	







?>