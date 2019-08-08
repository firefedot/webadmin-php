<?php
//echo '<script type="text/javascript" src="js/pace.min.js"></script>';
//echo '<link rel="stylesheet" href="css/load.css" type="text/css"/>';

echo "<link rel='stylesheet' href='css/style.css' />";
echo "<link rel='stylesheet' href='css/jquery-ui.css' />";
echo '<link rel="stylesheet" href="css/jquery.dataTables.min.css" type="text/css"/>';
echo "<script src='js/jquery-1.11.2.js'> </script>";
echo "<script src='js/jquery-ui.js'> </script>";

echo '<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>';
echo '<script type="text/javascript" src="js/table_color.js"></script>';
//Скрипт отображения кнопок сверху
echo "<script>";
   echo " $(function() {";
   echo "     $( '#tabs' ).tabs();";
   echo " });";
   echo " function resize_tabs() ";
echo " {";
    echo " $('#tabs').width($('#select_on').width());";
echo " }";
echo "</script>";


//Перезагрузка страници каждые 240 секунд
#######################header('Refresh: 240; url=' .$_SERVER['PHP_SELF']); 
echo "<body onload='resize_tabs()' >";
echo "<div id='tabs'>";

//Подключаемся к базе
include 'db_connect.php';

//Запросы к БД
$connect=mysql_query("SELECT * FROM all_users WHERE online = 1 ");
$connect_off=mysql_query("SELECT * FROM all_users WHERE online = 0 ");
//$connect_non=mysql_query("SELECT * FROM all_users WHERE last_connect = '0000-00-00 00:00:00' ");

echo "<ul>";
echo '<li><a href="&#35tabs-1">Server-1 - '.mysql_num_rows($connect).'</a></li>';
echo '<li><a href="&#35tabs-2">Server-2 - '.mysql_num_rows($connect_off).'</a></li>';
echo '<li><a href="&#35tabs-3">Server-3 - '.(mysql_num_rows($connect)+mysql_num_rows($connect_off)).'</a></li>';
echo '<li><a href="&#35tabs-4">Server-4 </a></li>';
echo '<li><a href="&#35tabs-5">Server-5 - </a></li>';
echo '<li><a href="&#35tabs-6">Server-6 - </a></li>';
echo '<li><a href="&#35tabs-7">Управление</a></li>';
echo "</ul>";

//Список тех. кто в сети
echo "<div id='tabs-1'>";
echo "<p>";
echo "Активных ВМ - ".mysql_num_rows($connect)." ";
echo '<table id="select_on" border="1">';
include 'online.php';
echo "</p>";
echo "</div>";

//Список кто не в сети
echo "<div id='tabs-2'>";
echo "<p>";
echo "Пользователей не в сети - ".mysql_num_rows($connect_off)." ";
echo '<table id="select_off" border="1">';
include 'offline.php';
echo "</p>";
echo "</div>";

//Весь список
echo "<div id='tabs-3'>";
echo "<p> ";
echo "Всего пользователей - ".(mysql_num_rows($connect)+mysql_num_rows($connect_off))." ";
echo '<table id="select_all" border="1">';
include 'listall.php';
echo "</p>";
echo "</div>";
//Список тех. кто ни разу не в ходил
echo "<div id='tabs-4'>";
echo "<p>";
echo "Пользователи, которые ни разу не подключались - ".mysql_num_rows($connect_off)." ";
echo '<table id="select_none" border="1">';
include 'none.php';
echo "</p>";
echo "</div>";

//Создание пользовтеля
echo "<div id='tabs-5'>";
echo "<p>";
echo 'Сервер-5';
echo "</p>";
echo "</div>";

//Создание пользователей списком
echo "<div id='tabs-6'>";
echo 'Сервер-6';
echo "<p>";

echo "</div>";

//Попытки доступа с заблокированных аккаунтов.
echo "<div id='tabs-7'>";
echo "<p>";
echo "Создание новой ВМ <br>";
echo "Примерное время на создание одной ВМ около 30-60 минуту ";
include 'create_user.php';
echo "</p>";
echo "</div>";

echo "</div>";
echo "</body>";
