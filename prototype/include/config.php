<?php 

$hostname='localhost'; //Localhost
$database='db_szbnr'; //Database name
$userdb='szbnr';
$passdb='a14cs0139';

$virtual_con=mysql_pconnect($hostname,$userdb,$passdb) or trigger_error(mysql_error(),E_USER_ERROR); //Connection to dtabase

//ABOVE IS TO DO DECLARATION OF DB

?>
