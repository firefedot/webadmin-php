<?php

$namerevoked=$_GET['uname'];

//header('Refresh: 90; url=' .$_SERVER['PHP_SELF']); 

$db_host = 'localhost';
$db_name = 'user_bd_vpn';
$db_username = 'root';
$db_password = 'Iovw5Rsy';
$db_table_to_show = 'all_users';

$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());

mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());
$connect=mysql_query("SELECT zim_revoked FROM all_users WHERE `name_vpn`= '".$namerevoked."'");
while($data = mysql_fetch_array($connect)){
   // echo "------".$data['zim_revoked'];
if ($data['zim_revoked']==0){
    $status='locked';
    $textbtn='Блокировать';
    $textTxt='Вы собираетесь заблокировать учетную запись пользователя';
    $textPrichina='Причина блокировки';
}else{
    $status='active';
    $textbtn='Активировать';
    $textTxt='Вы собираетесь активировать заблокированную учетную запись пользователя';
    $textPrichina='Причина разблокировки';
}
}
/*
 * $textbtn='Блокировать';
*/

echo '<form action="zim_revoked_ok.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">';
echo $textTxt.':  <select name="uname">
<option value="'. $namerevoked .'">'. $namerevoked .'</option></select></br>';
echo '<input type="text" name="comment" value="Причина" /><br />';
echo '<input type="text" name="comment2" value='.$status.' hidden/><br />';
echo '<input type="submit" value='.$textbtn.' />';
echo '</form>';

include 'forms_back.php';

?>