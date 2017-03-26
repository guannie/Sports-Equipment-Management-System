<?php 
$configurationFile='include/config.php';
include($configurationFile);
include('include/function.php');
session_start();

//DATABASE CONNECTION
$db=mysql_select_db($database,$virtual_con);
	
	
$sql="SELECT idStaff FROM `staff` WHERE idStaff='".$_POST['eid']."'";
$query=mysql_query($sql);
	
		if(!$record = mysql_fetch_array($query)){
			echo "<script>alert(\"The Employee ID is incorrect\");</script>";
			 echo "<script>window.location.assign('confirmIDupdate.html');</script>";	
		}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UPDATE</title>
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

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.html">StingRay</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   <li>
                        <a href="home.html">Home</a>
                    </li>
					<li>
                        <a href="about.html">About</a>
                    </li>
                    
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="insert.html">Insert</a>
                            </li>
                            <li>
                                <a href="update.html">Update</a>
                            </li>
                            <li>
                                <a href="delete.html">Delete</a>
                            </li>
							<li>
                                <a href="lend_return.php">Lending/Returning</a>
                            </li>
							<li>
                                <a href="report.html">Report</a>
                            </li>
                            
                        </ul>
                    </li>
                   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Teachers/Students <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            
							<li>
                                <a href="lend_return.php">Lending/Returning</a>
                            </li>
                           
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>Sports Equipment Management System</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.html">Home</a>
                    </li>
                    <li class="active">Update</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="jumbotron">

                    <p><span class="glyphicon glyphicon-wrench"></span> &nbsp; UPDATE</p><hr>
		
		
		<table width="1000" align="center">
						  <caption>Sports Equipment</caption>
						  <thead>
							<tr>
							  <th>Equipment ID</th>
							  <th>Equipment Name</th>
							  <th>Quantity</th>
							  <th>Price Per Unit</th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
									<?php 
								$sql="SELECT * FROM equipment";

								//SQL STATEMENT END
								//$db=mysql_select_db($database, $virtual_con);
								mysql_select_db($database, $virtual_con);
								$query=mysql_query($sql);
								if (!$query) {
									echo '<p>Could not run query: ' . mysql_error().'</p>';
									exit;
								}
							  while ($record = mysql_fetch_array($query))
							{
								echo "<TR>\n";
								echo "<TD>". $record["idEquipment"]. "</TD>".
								"<TD>".$record["EquipmentName"]. "</TD>".
								"<TD>".$record["EquipmentQuantity"]. "</TD>".
								"<TD>".$record["EquipmentAvgPrice"]. "</TD>";
								echo "<TD><button type='button' onclick=\"window.location='updateform.php?id=". $record["idEquipment"]."&eid=".$_POST['eid']."'\" value='update'>Update</button></TD>";
								echo "</TR>\n";
							}
							   ?>			
					
							
						  </tbody>
						  <tfoot>
							<tr>
							  <th colspan="2">Total</th>
							  <th></th>
							  <?php
							  $sql1="SELECT SUM(EquipmentAvgPrice*EquipmentQuantity) FROM equipment";
							  $query=mysql_query($sql1);
								if (!$query) {
									echo '<p>Could not run query: ' . mysql_error().'</p>';
									exit;
								}
							  $record = mysql_fetch_array($query);
								echo "<th>RM&nbsp ".$record[0]."</th>";
		
							  
							 ?>
							  <th></th>
							</tr>
						  </tfoot>
						</table>
                    
                </div>
            </div>

        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; StingRay 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

  
