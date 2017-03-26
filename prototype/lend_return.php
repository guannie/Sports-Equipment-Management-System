<?php 
//DATABASE CONFIGURATION SETTING
$configurationFile='include/config.php';
include($configurationFile);
include('include/function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LENDING/RETURNING</title>
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
	
	<script language="Javascript">
           var today = new Date(); 
           var day = today.getDate(); 
           var month = today.getMonth()+1;        
           var year = today.getFullYear(); 
           var date =  day+ "/" + month + "/" + year; 
           var time = today.getHours() + ":" + today.getMinutes() + ":"+ today.getSeconds(); 
           
	   function currentDateAndTime(){
           sentMessage.txtDateLeft.value=(date); 
           sentMessage.txtTimeLeft.value=(time);
	   
           }
	   
         </script>
		 <script>
		 
function showAvailableQuantity(str) {
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
  xhttp.open("GET", "getquantity.php?q="+str, true);
  xhttp.send();
}
</script>

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
                    <li class="active">Lending/Returning</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="jumbotron">
					
                    <p>Lending/Returning</p> <hr>
                     <div class="row">
            <div class="col-md-8">
                <form name="sentMessage" id="contactForm" action="lendreturn.php" method="post">
					 <div class="control-group form-group">
                        
						<div class="controls">
						<label><font color="red" size="4">*</font>Choose input type:</label><br>
						<input type="radio" name="type" value="Lending">Lending &nbsp;
						<input type="radio" name="type" value="Returning">Returning
						</div> 
					</div>
				
					<div class="control-group form-group">	
						<div class="controls">
                            <label><font color="red" size="4">*</font>ID Number:</label>
                            <input type="text" class="form-control" id="id" name="UserID" placeholder="User ID" required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><font color="red" size="4">*</font>Equipment Name:</label>
                            <select class="form-control" id="name" name="EId" placeholder="Equipment Name" onchange="showAvailableQuantity(this.value)">
									<option  value="">--- Select ---</option>
									<?php
									$db=mysql_select_db($database,$virtual_con);
									$sql="SELECT * FROM equipment";
									$query=mysql_query($sql);
									if (!$query) {
												echo 'Could not run query: ' . mysql_error();
												exit;
											}
									while ($record = mysql_fetch_array($query))
									{		
									echo "<option value=\"".$record['idEquipment']."\">".$record['EquipmentName']."</option>";
									}
									?>
							</select>
                            <p class="help-block"></p>
							 
                        </div>
                    </div>
					<div class="control-group form-group">
                        <div class="controls">
							<div id="txtHint"></div>
					     </div>
                    </div>
					<div class="control-group form-group">
                        <div class="controls">
                            <label><font color="red" size="4">*</font>Equipment Quantity:</label>
                            <input type="text" class="form-control" id="quantity" name="EQuantity" placeholder="Equipment Quantity" required>
                        </div>
                    </div>
					<div class="control-group form-group">	
						<div class="controls">
                        
						
						  <label><font color="red" size="4">*</font>Lending/Returning Date:</label><br>
						 <input type="text" class="form-control" name="txtDateLeft" size="20" placeholder="Day/Month/Year" required> <br>
						  <label><font color="red" size="4">*</font>Lending/Returning Time:</label><br>
						  <input type="text" class="form-control" name="txtTimeLeft" size="20" placeholder="Hour:Minute:Second" required><br><br>
						
						 <input type="button" onClick="currentDateAndTime()" name="txtCurTime" size="30" value="Get current date and time">   
						
						</div>
                    </div>
                    
                    
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
