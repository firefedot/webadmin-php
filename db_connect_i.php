<?php
//header('Refresh: 90; url=' .$_SERVER['PHP_SELF']); 

$db_host = 'localhost';
$db_name = 'user_bd_vpn';
$db_username = 'root';
$db_password = 'nwuPdhCPAfXJ2DhtnhxqpJpDkTTqfEciCH4c6dXRUHVFKNGXEGR57q';
$db_table_to_show = 'all_users';

$connect_to_db = mysqli_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());

mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());
