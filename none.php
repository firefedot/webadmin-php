<?php
//echo '<link rel="stylesheet" href="style.css" type="text/css"/>';
//echo '<script src="table_color.js"></script>';
//header('Refresh: 90; url=' .$_SERVER['PHP_SELF']); 
include 'db_connect.php';
//$connect=mysql_query("SELECT * FROM all_users WHERE online = 1 ");
    
$qr_result = mysql_query("select name_vpn, city, name, otchestvo, familiya, kurator, god_name, data_create
, notes, note2, online, last_connect, revoked, date_revoked, why_otozvan, zim_revoked, zim_date_revoked, zim_why_revoked, ip_vpn, ip_web, block, date_block, why_block from " . $db_table_to_show . " WHERE last_connect = '0000-00-00 00:00:00' order by name_vpn ")
or die(mysql_error());
//echo "Пользователей online: ".mysql_num_rows($connect);
include 'db_table.php';
?>