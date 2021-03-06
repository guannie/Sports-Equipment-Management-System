

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REPORT</title>
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
<script>
function showReport(str) {
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
  xhttp.open("GET", "getreport.asp?q="+str, true);
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
                    <li class="active">Report</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="jumbotron">
					
                    <p>REPORT</p>
								<hr>
                     <div class="row">
           
		   <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4 img-portfolio">
                </div>
            <div class="col-md-4 img-portfolio">
              
               <p>Choose the type of report</p>
				 <div class="control-group form-group">
					 <div class="controls">
					 <form> 
					 <select name="reports" onchange="showReport(this.value)" class="form-control">
					  <option value="">--- Select ---</option>
					  <option value="1001">Transaction Report</option>
					  <option value="1010">Finance Report</option>
					  <option value="1031">Maintenance Report</option>
					  <!--<option value="Transaction Report">Transaction Report</option>
					  <option value="Finance Report">Finance Report</option>
					  <option value="Maintenance Report">Maintenance Report</option>
					  -->
					</select>
					</form> 
					
					</div>
				</div>
				<div class="control-group form-group">
						<div id="txtHint">Choose a report to continue...</div>
				</div>
            </div>
            <div class="col-md-4 img-portfolio">
               </div>
        </div>
        <!-- /.row -->

        <hr>

        


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
