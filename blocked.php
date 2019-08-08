<?php

$namerevoked=$_GET['uname'];

include 'db_connect.php';

$connect=mysql_query("SELECT block, ip_vpn FROM all_users WHERE `name_vpn`= '".$namerevoked."'");
while($data = mysql_fetch_array($connect)){
    $ip=$data['ip_vpn'];
   // echo "------".$data['zim_revoked'];
if ($data['block']==0){
    $status='block';
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

echo '<form action="blocked_ok.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">';
echo $textTxt.':  <select name="uname">
<option value="'. $namerevoked .'">'. $namerevoked .'</option></select></br>';
echo '<input type="text" name="comment" value="Причина" /><br />';
echo '<input type="text" name="comment2" value='.$status.' hidden /><br />';
echo '<input type="text" name="ip" value='.$ip.' hidden /><br />';
echo '<input type="submit" value='.$textbtn.' />';
echo '</form>';

include 'forms_back.php';

?>