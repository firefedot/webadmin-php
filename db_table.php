<?php

//echo '<table id="select" border="1">';
echo '<thead>';
echo '<tr>';
echo '<th>Сервер</th>';
echo '<th>Имя ВМ</th>';
echo '<th>ip-подключения</th>';
echo '<th>Логин</th>';
echo '<th>Пароль</th>';
echo '<th>Клиент</th>';
echo '<th>В сети</th>';
echo '<th>Скачать</th>';
echo '<th>Выходной ip</th>';
echo '<th>Эмулировать</th>';
echo '<th>Блокировать/Активировать</th>';
echo '<th>Дата блокировки/активации</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while($data = mysql_fetch_array($qr_result)){
    $namev=$data['name_vm'];
echo '<form method="post" enctype="multipart/form-data" accept-charset="uft-8">';
echo '<tr>';
echo '<td align="center">' . $data['server'] . '</td>';
echo '<td>' . $data['name_vm'] . '</td>';
echo '<td>' . $data['ip'] . '</td>';
echo '<td><nobr>' . $data['login'] . '</nobr></td>';
echo '<td><nobr>' . $data['passwd'] . '</nobr></td>';
echo '<td><nobr>' . $data['client'] . '</nobr></td>';
if ($data['online']==0){
echo '<td bgcolor="#F93E39" align="center">Не активна</td>';
}else{
    //$connect++;
echo '<td bgcolor="#0AFF45" align="center">Активна</td>';
}
echo '<td align="center"><a href=' . $data['download'] . '>.rdp</a></td>';
echo '<td>' . $data['ext_ip'] . '</td>';
if ($data['online']==1){?>
    <td><input type='submit' value='Эмулировать' onClick='revoke_vpn("<?php echo $namev ?>")' name='button_3' class='button_3'/></td>

<?php    }else{ ?>
    <td><input type="submit" value="Эмулировать"name="button_3" class="button_3" disabled/></td>
<?php
    }
if ($data['online']==0){ ?>
    <td><input type="submit" value="Блокировать" onClick='revoked_zim_user("<?php echo $namev ?>")' class="button_1"/>
    <input type="submit" value="Активировать" formaction="zim_revoked.php" class="button_2" disabled/></td>
<?php }else{ ?>
    <td><input type="submit" value="Блокировать" formaction="zim_revoked.php" class="button_1" disabled/>
    <input type="submit" value="Активировать" onClick='revoked_zim_user("<?php echo $namev ?>")' class="button_2"/></td>
<?php }

echo '<td>' . $data['data_active'] . '</td>';

echo '</tr>';
echo '</form>';
}
 echo '</tbody>';
 echo '</table>';

 mysql_close($connect_to_db);

echo "Сегодня дата - ".date("Y-m-d")."<br>";
