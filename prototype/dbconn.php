<html>
<body background="1.jpg" align="center">

<?php
// login to MySQL Server from PHP
$conn = mysql_connect("localhost","abta","a14cs0156");

// If login failed, terminate the page (using function 'die')
if (!$conn) die("Error when connecting to MySQL: ". mysql_error() );

// Login was successful. Then choose a database to work with
$selected = mysql_select_db("db_abta",$conn);

// If required database cannot be used, terminate the page
if (!$selected) die ("Cannot use database: " . mysql_error() );
?>

</body>
</html>