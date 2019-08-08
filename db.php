<?php

header('Refresh: 90; url=' .$_SERVER['PHP_SELF']); 


$name_user= "aafedotov";
$db_host = 'localhost';
$db_name = 'user_bd_vpn';
$db_username = 'root';
$db_password = 'Iovw5Rsy';
$db_table_to_show = 'all_users';

$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());

mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());
$connect=mysql_query("SELECT name_vpn FROM all_users WHERE name_vpn = '$name_user'");
    echo mysql_num_rows($connect). '</br>';
    while($data = mysql_fetch_array($connect)){
        echo 'Terxt ' . $data['name_vpn'] . '</br>';
    }
if(mysql_num_rows($connect)==0){
    echo 'Пользователя '.$name_user.' нет';
} else {
    echo 'Пользователь '.$name_user.' уже есть';
}
