<?php 
$configurationFile='include/config.php';
include($configurationFile);
include('include/function.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DELETE</title>
	<link rel="shortcut icon" href="img/logo.png" >

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<link href="css/table.css" rel="stylesheet">
			<script>
			function sortReport(str) {
			  var xhttp;    
			  if (str == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			  }
			  xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
				  document.getElementById("txtHint").innerHTML = xhttp.responseText;
				}
			  };
			  xhttp.open("GET", "sortreport.php?q="+str, true);
			  xhttp.send();
			}
			</script>
</head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];
mysql_select_db($database, $virtual_con);
$sql="SELECT * FROM ".$q;

$result = mysql_query($sql);



if($q=="equipment")
{
	echo " <div class=\"col-md-4 img-portfolio\">
              
               <p>Sort by</p>
				 <div class=\"control-group form-group\">
					 <div class=\"controls\">
					 <form action=\"\"> 
					 <select name=\"sort\" onchange=\"sortReport(this.value)\" class=\"form-control\">
					  <option value=\"\">--- Select ---</option>
					  <option value=\"0\">Equipment ID</option>
					  <option value=\"1\">Equipment Name</option>
					  <option value=\"2\">Equipment Quantity</option>
					  <option value=\"3\">Equipment Price</option>
					  <option value=\"4\">Price Total</option>
					</select>
					</form> 
					
					</div>
				</div>
				
            </div>";
	echo"<table width=\"1000\" align=\"left\" >
<thead>
<tr>";
	echo "
<th>Equipment ID</th>
<th>Equipment Name</th>
<th>Equipment Quantity</th>
<th>Equipment Price</th>
<th>Price Total</th>

</tr>
</thead>
<tbody>";
while($row = mysql_fetch_array($result)) {
    if($row['EquipmentQuantity']!=0)
	{
	echo"<tr>";
    echo "<td>" . $row['idEquipment'] . "</td>";
    echo "<td>" . $row['EquipmentName'] . "</td>";
	echo "<td>" . $row['EquipmentQuantity']. "</td>";
    echo "<td>" . $row['EquipmentAvgPrice'] . "</td>";
	echo "<td>" . $row['EquipmentQuantity']*$row['EquipmentAvgPrice'] . "</td>";
    }							  
}
echo "<tfoot>
							<tr>
							  <th colspan=\"4\">Total</th>";
							  $sql1="SELECT SUM(EquipmentAvgPrice*EquipmentQuantity) FROM equipment";
							  $query=mysql_query($sql1);
								if (!$query) {
									echo '<p>Could not run query: ' . mysql_error().'</p>';
									exit;
								}
							  $record = mysql_fetch_array($query);
								echo "<th>RM&nbsp ".$record[0]."</th>
							</tr>
						  </tfoot>";
}else if($q=="transaction")
{
	echo"<table width=\"1000\" align=\"left\" >
<thead>
<tr>";
	echo "
<th>Transaction ID</th>
<th>TransactionType</th>
<th>TransactionQuantity</th>
<th>Transaction Date</th>
<th>Transaction Time</th>
<th>Equipment ID</th>
<th>User ID</th>
</tr>
</thead>
<tbody>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['idTransaction'] . "</td>";
    echo "<td>" . $row['TransactionType'] . "</td>";
    echo "<td>" . $row['TransactionQuantity'] . "</td>";
    echo "<td>" . $row['TransactionDate']. "</td>";
	echo "<td>" . $row['TransactionTime']. "</td>";
	echo "<td>" . $row['idEquipment']. "</td>";
	echo "<td>" . $row['idUser']. "</td>";
    echo "</tr>";
}
}else if($q=="maintainance"){
	echo"<table width=\"1000\" align=\"left\" >
<thead>
<tr>";
	echo "
<th>Maintainance ID</th>
<th>Invoice No</th>
<th>Maintainance Type</th>
<th>Equipment ID</th>
<th>Staff ID</th>
</tr>
</thead>
<tbody>";

while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['idMaintainance'] . "</td>";
    echo "<td>" . $row['invoiceNo'] . "</td>";
    echo "<td>" . $row['MaintainanceType'] . "</td>";
    echo "<td>" . $row['idEquipment']. "</td>";
	echo "<td>" . $row['idStaff']. "</td>";
    echo "</tr>";
}
}else if($q=="usertransaction"){
	
	echo"<table width=\"1000\" align=\"left\" >
<thead>
<tr>";
	echo "
<th>Equipment Name</th>
<th>Transaction Quantity</th>
<th>Transaction Type</th>
<th>Transaction Date</th>
<th>User ID</th>
</tr>
</thead>
<tbody>";

$sql="SELECT equipment.EquipmentName, transaction.TransactionType, transaction.TransactionDate, transaction.TransactionQuantity, transaction.idUser FROM equipment RIGHT JOIN transaction ON equipment.idEquipment=transaction.idEquipment ORDER BY TransactionQuantity";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['EquipmentName'] . "</td>";
    echo "<td>" . $row['TransactionQuantity'] . "</td>";
    echo "<td>" . $row['TransactionType'] . "</td>";
    echo "<td>" . $row['TransactionDate']. "</td>";
	echo "<td>" . $row['idUser']. "</td>";
    echo "</tr>";
}
}else if($q=="RecordsCount"){
	echo"<table width=\"1000\" align=\"left\" >
<thead>
<tr>";
	echo "
<th>Numbers Of</th>
<th>Quantity</th>
</tr>
</thead>
<tbody>";
 echo "<tr>";

$sql="SELECT COUNT(idEquipment) FROM equipment WHERE idEquipment!=0"; 
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
	echo "<tr>";
	echo "<td> Equipments </td>";
    echo "<td>" . $row[0] . "</td>";  
	echo "</tr>";
}
$sql="SELECT COUNT(idTransaction) FROM transaction"; 
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
	echo "<tr>";
	echo "<td> Transactions </td>"; 
    echo "<td>" . $row[0] . "</td>"; 
	echo "</tr>";
}
$sql="SELECT COUNT(idMaintainance) FROM maintainance"; 
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
	echo "<tr>";
	echo "<td> Maintainance </td>" ;
    echo "<td>" . $row[0] . "</td>"; 
	echo "</tr>";
}
$sql="SELECT COUNT(idStaff) FROM staff"; 
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
	echo "<tr>";
	echo "<td> Staff </td>" ;
    echo "<td>" . $row[0] . "</td>"; 
	echo "</tr>";
}
$sql="SELECT COUNT(idUser) FROM user"; 
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
	echo "<tr>";
	echo "<td> User </td>" ;
    echo "<td>" . $row[0] . "</td>"; 
	echo "</tr>";
}
}
 echo "</tr>";
echo "</tbody>
</table>";

?>
</body>
</html>