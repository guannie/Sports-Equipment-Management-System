<?php 
$configurationFile='include/config.php';
include($configurationFile);
include('include/function.php');
session_start();

if(isset($_GET['id'])) $EquipmentID=$_GET['id'];

if(isset($_POST['EID'])){
	 $EmployeeID=$_POST['EID'];
	 $Price=$_POST['Price'];
	 $Quantity=$_POST['Quantity'];
	 $EquipmentID=$_POST['EquipmentID'];
	$sql=" UPDATE `equipment` 
	 SET `EquipmentAvgPrice`='".$Price."',`EquipmentQuantity`='".$Quantity."' 
	 WHERE idEquipment='".$EquipmentID."'";
	
	$query=mysql_query($sql);
	if (!$query) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}
$sql1="INSERT maintainance (invoiceNo, MaintainanceType, idEquipment, idStaff)
		VALUES ('".$_POST['Invoice']."','UPDATE', '".$_POST['EquipmentID']."', '".$_POST['EID']."')";
	$query=mysql_query($sql1);
	if (!$query) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}
	
	//echo "<script>alert(\"The equipment is updated.\")</script>";
	//echo "<script>window.location.assign('update.php');</script>";
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

    <title>UPDATE FORM</title>
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
                                <a href="lend_return.html">Lending/Returning</a>
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
					
                    <p><span class="glyphicon glyphicon-wrench"></span> &nbsp; UPDATE</p> 
                     <div class="row">
            <div class="col-md-8">
                <form name="sentMessage" id="contactForm" novalidate action="updateform.php" method="post">
					 <div class="control-group form-group">
                        <div class="controls">
                            <label><font color="red" size="4">*</font>ID Number:</label>
                            <input type="text" class="form-control" id="phone" name="EID" value="<?php echo $_GET['eid'] ?>" placeholder="EmployeeID">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Equipment Quantity:</label>
                            <input type="text" class="form-control" id="email" name="Quantity" placeholder="Equipment Quantity">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Equipment Price:</label>
                            <input type="text" class="form-control" id="email" name="Price" placeholder="Equipment Price">
                        </div>
                    </div>
					<div class="control-group form-group">
                        <div class="controls">
                            <label>Invoice No:</label>
                            <input type="text" class="form-control" id="InvoiceNo" name="Invoice" placeholder="InvoiceNo">
                        </div>
                    </div>
					 <input type='hidden' name="EquipmentID" value="<?php echo $EquipmentID?>">
                    
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
				<br><font color="red" size="5">*</font><i face="verdana" size="1"><label>Required</i></label>
            </div>

        </div>
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
