<?php
echo '<script type="text/javascript" src="js/jquery-1.11.2.js"></script>';
echo '<script type="text/javascript" src="js/jquery.blockUI.js"></script>';


//echo "<script data-pace-options='{ 'ajax': false }' src='js/pace.min.js'></script>";

echo '<link rel="stylesheet" href="css/style.css" type="text/css"/>';
echo '<link rel="stylesheet" href="css/basic.css" type="text/css"/>';
echo '<link rel="stylesheet" href="css/jquery.dataTables.min.css" type="text/css"/>';
echo '<script src="table_color.js"></script>';
echo '<script type="text/javascript" src="js/jquery.simplemodal.js"></script>';
echo '<script type="text/javascript" src="js/basic.js"></script>';
echo '<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>';
echo '<script type="text/javascript" src="js/table_color.js"></script>';
//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.cssecho '<script type="text/javascript" src="js/pace.min.js"></script>';
echo '<link rel="stylesheet" href="css/load.css" type="text/css"/>';
echo '<script type="text/javascript" src="js/pace.min.js"></script>';
echo '<link rel="stylesheet" href="css/load.css" type="text/css"/>';
echo '<body>';

include 'forms_back.php';
if(isset($a)){
    echo 'non';
} else {
    echo 'nnne';
}
echo "text".isset($name)." gh";
header('Refresh: 240; url=' .$_SERVER['PHP_SELF']); 

//

$db_host = 'localhost';
$db_name = 'user_bd_vpn';
$db_username = 'root';
$db_password = 'Iovw5Rsy';
$db_table_to_show = 'all_users';

$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());

mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());
$connect=mysql_query("SELECT * FROM all_users WHERE online = 1 ");
    
$qr_result = mysql_query("select name_vpn, city, name, otchestvo, familiya, kurator, god_name, data_create
, notes, note2, online, last_connect, revoked, date_revoked, why_otozvan, zim_revoked, zim_date_revoked, zim_why_revoked, ip_vpn, ip_web, block, date_block, why_block from " . $db_table_to_show . " WHERE online = 0 order by name_vpn ")
or die(mysql_error());
echo "Пользователей online: ".mysql_num_rows($connect);
#echo '<form action="revoked.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">';

//цикл для обхода по всем товарам
/*foreach ($yml->offers->offer as $offer) {
        echo '<h1>'.$offer->id.'</h1>';       //выводим на печать артикул 
        echo $offer->price;        //выводим на печать цену
}*/
echo "<br>";
echo '<div id="container">';
echo '<div id="content">';

echo '<table id="select" border="1">';
echo '<thead>';
echo '<tr>';
echo '<th>Имя_VPN</th>';
echo '<th>ФИО</th>';
echo '<th>Город</th>';
echo '<th>Куратор</th>';
echo '<th>Создатель</th>';
echo '<th>Дата создания</th>';
echo '<th>Скачать</th>';
echo '<th>Блокировать/Активировать</th>';
echo '<th>Дата блокировки</th>';
echo '<th>Причина блокировки</th>';
echo '<th>В сети</th>';
echo '<th>Последний вход</th>';
echo '<th>Отозван</th>';
echo '<th>Дата отзыва</th>';
echo '<th>Причина отзыва</th>';
echo '<th>Отозвать/Удалить</th>';
echo '<th>ip адреса</th>';
echo '<th>Временно забанить/Восстановить</th>';
echo '<th>Дата бана</th>';
echo '<th>Причина бана/Восстановления</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while($data = mysql_fetch_array($qr_result)){
echo '<form method="post" enctype="multipart/form-data" accept-charset="uft-8">';
echo '<tr>';
echo '<td><select name="uname">
    <option value="'. $data['name_vpn'] .'">'. $data['name_vpn'] .'</option>
    </select></td>';
echo '<td><nobr>' . $data['familiya'] .' '. $data['name'] .' '. $data['otchestvo'] . '</nobr></td>';
echo '<td align="center">' . $data['city'] . '</td>';
echo '<td>' . $data['kurator'] . '</td>';
echo '<td>' . $data['god_name'] . '</td>';
echo '<td><nobr>' . $data['data_create'] . '</nobr></td>';
echo '<td align="center"><a href=' . $data['notes'] . '>kee</a> | <a href=' . $data['note2'] . '>tcp</a></td>';
if ($data['zim_revoked']==0){
    echo '<td><input type="submit" value="Блокировать" formaction="zim_revoked.php" class="button_3"/>'
    . '<input type="submit" value="Активировать" formaction="zim_revoked.php" class="button_3" disabled/></td>';
}else{
    echo '<td><input type="submit" value="Блокировать" formaction="zim_revoked.php" class="button_3" disabled/>'
    . '<input type="submit" value="Активировать" formaction="zim_revoked.php" class="button_3"/></td>';
}
echo '<td>' . $data['zim_date_revoked'] . '</td>';
echo '<td>' . $data['zim_why_revoked'] . '</td>';
if ($data['online']==0){
echo '<td bgcolor="#F93E39" align="center">Не в сети</td>';
}else{
  //  $connect++;
echo '<td bgcolor="#0AFF45" align="center">В СЕТИ</td>';
}
if($data['last_connect']=='0000-00-00 00:00:00'){
    echo '<td>Вход не выполнялся</td>';
}else{
    echo '<td>' . $data['last_connect'] . '</td>';
}
if ($data['revoked']==0){
    echo '<td bgcolor="#FCFDAA" align="center">Нет</td>';
}else{
    echo '<td bgcolor="red" align="center">ОТОЗВАН</td>';
}
if($data['date_revoked']=='0000-00-00 00:00:00'){
    echo '<td>--------------------</td>';
}else{
    echo '<td>' . $data['date_revoked'] . '</td>';
}
echo '<td>' . $data['why_otozvan'] . '</td>';

echo '<div id="revoke-modal">';
   
//echo '<input type="submit" name="basic" value="test" class="basic"/>';
  /* 
if ($data['revoked']==0){
    echo '<td><input type="submit" name="basic" value="Отозвать" formaction="revoked.php" class="basic"/>'
    . '<input type="submit" name="basic" value="Удалить" formaction="deleted.php" class="basic" disabled/></td>';
}else{
    echo '<td><input type="submit" name="basic" value="Отозвать" formaction="revoked.php" class="basic" disabled/>'
    . '<input type="submit" name="basic" value="Удалить" formaction="deleted.php" class="basic"/></td>';
}*/

if ($data['revoked']==0){
    echo '<td><input type="submit" name="basic" value="Отозвать" class="basic"/>';
    //. '<input type="submit" name="basic" value="Удалить" class="basic" disabled/></td>';
}else{
   // echo '<td><input type="submit" name="basic" value="Отозвать" class="basic" disabled/>'
    //. '<input type="submit" name="basic" value="Удалить" class="basic"/></td>';
}

echo "<div style='display:none'>";
			echo "<img src='img/basic/x.png' alt='' />";
		echo '</div>';

echo '</div>';

echo '<td>' . $data['ip_vpn'] . '</br>' . $data['ip_web'] . ' </td>';
if ($data['block']==0){
    echo '<td><input type="submit" value="Блокировать доступ" formaction="blocked.php" class="button_5"/>'
    . '<input type="submit" value="Восстановить доступ" formaction="blocked.php" class="button_5" disabled/></td>';
}else{
    echo '<td><input type="submit" value="Блокировать доступ" formaction="blocked.php" class="button_5" disabled/>'
    . '<input type="submit" value="Восстановить доступ" formaction="blocked.php" class="button_5"/></td>';
}
echo '<td>' . $data['date_block'] .' </td>';
echo '<td>' . $data['why_block'] .' </td>';
echo '</tr>';
echo '</form>';
}
 echo '</tbody>';
 echo '</table>';
 echo '</div>'; // конец дива контента
echo '</div>'; // Конед дива контейнера
 mysql_close($connect_to_db);

echo "Сегодня дата- ".date("Y-m-d")."<br>";
include 'forms_back.php';
//
echo '</body>';
?>