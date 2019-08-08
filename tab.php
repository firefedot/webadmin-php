<?php
echo '<link rel="stylesheet" href="style.css" type="text/css"/>';
echo '<script src="table_color.js"></script>';
echo '<script src="js/prototype.js"></script>';
//echo '<script src="js/jquery-1.11.2.min.js"></script>';
echo '<script src="js/tabs.js"></script>';
header('Refresh: 180; url=' .$_SERVER['PHP_SELF']);
include 'forms_back.php';
include 'db_connect.php';
$connect=mysql_query("SELECT * FROM all_users WHERE online = 1 ");
$connect_off=mysql_query("SELECT * FROM all_users WHERE online = 0 ");
$connect_non=mysql_query("SELECT * FROM all_users WHERE last_connect = '0000-00-00 00:00:00' ");

echo "Пользователей online: ".mysql_num_rows($connect)."</br>";
echo "Пользователей не в сети: ".mysql_num_rows($connect_off)."</br>";
echo "Всего пользователей: ".(mysql_num_rows($connect)+mysql_num_rows($connect_off))."</br>";
echo "Пользователей ни разу входивших: ".mysql_num_rows($connect_non)."</br>";
include 'tabs.html';
//include 'tabs_1.php';

include 'forms_back.php';