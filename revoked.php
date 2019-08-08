<?php
header( "Content-Type: text/html; charset=utf-8" );
ini_set('display_errors',1);
error_reporting(E_ALL);

$namerevoked=$_GET['uname'];
echo '<form action="revoked_ok.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">';
echo 'Вы собираетесь отозвать сертификат пользователя:  <select name="uname">
<option value="'. $namerevoked .'">'. $namerevoked .'</option></select></br>';
echo '<input type="text" name="comment" value="Причина отзыва" /><br />';
echo '<input type="submit" value="Отозвать" />';
echo '</form>';

include 'forms_back.php';

?>