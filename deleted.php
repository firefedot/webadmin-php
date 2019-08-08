<?php
echo 'Удаление пользователя удалит его из базы '
. 'если нужно полностью удалить, то не забудте его сначвала отозвать.';
$namedeleted=$_GET['uname'];
echo '<form action="delete_ok.php" method="post" enctype="multipart/form-data" accept-charset="uft-8">';
echo 'Удалить пользователя:  <select name="uname">
<option value="'. $namedeleted .'">'. $namedeleted .'</option></select></br>';
echo '<input type="submit" value="Удалить" />';
echo '</form>';

include 'forms_back.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

