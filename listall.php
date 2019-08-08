<?php
//echo '<link rel="stylesheet" href="style.css" type="text/css"/>';
//echo '<script src="table_color.js"></script>';
//header('Refresh: 180; url=' .$_SERVER['PHP_SELF']); 
include 'db_connect.php';
//$connect=mysql_query("SELECT * FROM all_users WHERE online = 1 ");
    
$qr_result = mysql_query("select server, name_vm, ip, login, passwd, client, online, download, ext_ip, emulation, activate, data_active from " . $db_table_to_show . " order by name_vm ")
or die(mysql_error());
//echo "Пользователей online: ".mysql_num_rows($connect);
include 'db_table.php';

?>