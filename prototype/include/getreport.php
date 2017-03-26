<?php 
$configurationFile='include/config.php';
include($configurationFile);
include('include/function.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
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
$q = intval($_GET['q']);
mysql_select_db($database, $virtual_con);
$sql="SELECT * FROM equipment WHERE id = '".$q."'";
echo $result = mysql_query($sql);

echo "<table>
<tr>
<th>Equipment ID</th>
<th>Equipment Name</th>
<th>Equipment Price</th>
<th>Equipment Quantity</th>
</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['idEquipment'] . "</td>";
    echo "<td>" . $row['EquipmentName'] . "</td>";
    echo "<td>" . $row['EquipmentAvgPrice'] . "</td>";
    echo "<td>" . $row['EquipmentQuantity'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysql_close();
?>
</body>
</html>