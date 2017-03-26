<?php 
$configurationFile='include/config.php';
include($configurationFile);
include('include/function.php');
session_start();



$q = $_GET['q'];
mysql_select_db($database, $virtual_con);
$sql="SELECT * FROM ".$q;

$result = mysql_query($sql);



if($q=="1")
{
	echo " <div class=\"col-md-4 img-portfolio\">
              
               <p>Sort by</p>
				 <div class=\"control-group form-group\">
					 <div class=\"controls\">
					 <form action=\"\"> 
					 <select name=\"sort\" onchange=\"sortReport(this.value)\" class=\"form-control\">
					  <option value=\"\">--- Select ---</option>
					  <option value=\"1\">Equipment ID</option>
					  <option value=\"2\">Equipment Name</option>
					  <option value=\"3\">Equipment Quantity</option>
					  <option value=\"4\">Equipment Price</option>
					  <option value=\"5\">Price Total</option>
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
							  $sql1="SELECT SUM(EquipmentAvgPrice*EquipmentQuantity) FROM equipment Order By Equipment Name";
							  $query=mysql_query($sql1);
								if (!$query) {
									echo '<p>Could not run query: ' . mysql_error().'</p>';
									exit;
								}
							  $record = mysql_fetch_array($query);
								echo "<th>RM&nbsp ".$record[0]."</th>
							</tr>
						  </tfoot>";
}
?>