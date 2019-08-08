<?php

$db_host = 'localhost';
$db_name = 'user_bd_vpn';
$db_username = 'root';
$db_password = 'Iovw5Rsy';
$db_table_to_show = 'alarm_revoked';

$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());

mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

$qr_result = mysql_query("SELECT uname, ip, date_revoke from alarm_revoked ORDER BY uname")
or die(mysql_error());

echo '<table border="1">';
echo '<thead>';
echo '<tr>';
echo '<th>Имя отозванного сертификата</th>';
echo '<th>ip адресс</th>';
echo '<th>Дата попытки доступа</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while($data = mysql_fetch_array($qr_result)){
echo '<form action="revoked.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">';
echo '<tr>';
echo '<td>' . $data['uname'] . '</td>';
echo '<td>' . $data['ip'] . '</td>';
echo '<td>' . $data['date_revoke'] . '</td>';
}
echo '</tbody>';
echo '</table>';
  
mysql_close($connect_to_db);

echo "Сегодня: ".date("Y-m-d")."<br>";

//include 'forms_back.php';
?>