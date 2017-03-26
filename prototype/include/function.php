
<?php

function gotoInterface($to){
		//echo $to;
		echo "<script language=\"JavaScript\"> window.location = \"".$to."\"</script>";
}

function redirect($to) {
    ob_start();
    header('Location: '.$to);
    ob_end_flush();
    die();
}
		?>