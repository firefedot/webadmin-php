<?php
header( "Content-Type: text/html; charset=utf-8" );
//ini_set('display_errors',1);
error_reporting(E_ALL);

$db_host = 'localhost';
$db_name = 'user_bd_vpn';
$db_username = 'root';
$db_password = 'Iovw5Rsy';
$db_table_to_show = 'all_users';

$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());

mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

$userdel=$_POST['uname'];

$qr_result = mysql_query("DELETE FROM `all_users` WHERE `name_vpn`= '".$userdel."'")
or die(mysql_error());

ob_implicit_flush(true);
ob_end_flush();

echo "<pre>";
system ("sudo /etc/openvpn/easy-rsa/2.0/killfile.sh '$userdel'  2>&1");


include 'forms_back.php';
?>
