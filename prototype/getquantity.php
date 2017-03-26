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
$sql="SELECT `AvailableEquipment` FROM `equipment` WHERE `idEquipment`='".$q."'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result)) {
	echo "<div class=\"control-group form-group\">	
						<div class=\"controls\">
                            <label><font color=\"red\" size=\"4\"></font>Available Quantity:</label>
							".$row[0]."
                        </div>
                    </div>";
	
}	



?>
</body>
</html>