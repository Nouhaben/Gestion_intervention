<?php
	$hostname = "localhost";
	$database = "tic_suivi";
	$username = "root";
	$password = "";
	
	$connect = mysql_pconnect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR);

	mysql_select_db($database);	
?>