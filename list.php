<?php
header( "Content-Type: text/html; charset=utf-8" );
ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);
#error_reporting(E_ALL ^ E_DEPRECATED);
$i=0;

include 'db_connect.php';

#Функция names проверяет структуру файла 
#и если есть ошибка в строке, то не будет создавать пользователя
function names($namef, $column){
    #$i++;
    #echo $namef."<br />\n";
    echo "<pre>";
    list($login, $fam, $name, $otch, $land, $obl, $city, $kurator, $sozd)= explode("_", $namef);
    #echo "Функция выполняется <br />\n";
    /*echo "login: ".strlen($login)."<br />\n";
    echo "name: ".strlen($name)."<br />\n";
    echo "otch: ".strlen($otch)."<br />\n";
    echo "fam: ".strlen($fam)."<br />\n";
    echo "land: ".strlen($land)."<br />\n";
    echo "obl: ".strlen($obl)."<br />\n";
    echo "city: ".strlen($city)."<br />\n";
    echo "kurator: ".strlen($kurator)."<br />\n";
    echo "sozd: ".strlen($sozd)."<br />\n";
    echo "sozd = $sozd -- ".gettype($sozd)."<br>";*/
    
    if(strlen($sozd)<3){
        echo "<p><b>Ошибка в строке: ".($column+1)."</b><br />\n";
        $create=0;
    }
    else { 
        echo "______________________________________________________<br />\n";
        echo "<pre>";
        echo "Строка проверена<br />\n";
        echo "Создается пользователь. Пожалуйста подождите...<br />\n";
        $create=1;
        #Создание пользователя и внесение его в базу
        echo '1';
        $connect=mysql_query("SELECT name_vpn FROM all_users WHERE name_vpn = '$login'");
            echo mysql_num_rows($connect). '</br>';
            while($data = mysql_fetch_array($connect)){
                //echo 'Terxt ' . $data['name_vpn'] . '</br>';
            }
        echo '2';
        $start = microtime(true);
        if(mysql_num_rows($connect)==0){
    //echo 'Пользователя '.$name_user.' нет  в базе данных, идет создание...';
        $connect_add=mysql_query("INSERT INTO all_users ( name_vpn, country, oblast, city, name, otchestvo, familiya, kurator, god_name ) values ( '$login', '$land', '$obl', '$city', '$name', '$otch', '$fam', '$kurator', '$sozd' ) ")
        or die(mysql_error());
        echo '3';
        ob_implicit_flush(true);
        ob_end_flush();
        echo "<pre>";
        #system ("sudo /etc/openvpn/easy-rsa/2.0/expect_vpn.sh '$par' 2>&1");
        #system ("sudo /etc/openvpn/easy-rsa/easyrsa3/vpn.sh $login $fam $name $otch 2>&1");
        exec ("sudo /home/netfilter/scripts/vpn.sh $login $fam $name $otch 2>&1");
        echo "<pre>";
        echo "Пользователь создан".'</br>';
        $timeall=round((microtime(true) - $start),2);
        echo '4';
        echo "</pre>";
    } else {
        echo 'Пользователь '.$name_user.' уже создан. Проверьте вводимые данные и повторите попытку';
    }
    
    }
   
    
    
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    if (strlen($login)<1){
        echo '<td bgcolor="#F93E39" align="center">Логин</td>';
        }else{
        echo '<td bgcolor="#0AFF45" align="center">Логин</td>';
    }
    if (strlen($name)<3){
        echo '<td bgcolor="#F93E39" align="center">Имя</td>';
        }else{
        echo '<td bgcolor="#0AFF45" align="center">Имя</td>';
    }
    if (strlen($otch)<3){
        echo '<td bgcolor="#F93E39" align="center">Отчество</td>';
        }else{
        echo '<td bgcolor="#0AFF45" align="center">Отчество</td>';
    }
    if (strlen($fam)<3){
        echo '<td bgcolor="#F93E39" align="center">Фамилия</td>';
        }else{
        echo '<td bgcolor="#0AFF45" align="center">Фамилия</td>';
    }
    if (strlen($land)<1){
        echo '<td bgcolor="#F93E39" align="center">Страна</td>';
        }else{
        echo '<td bgcolor="#0AFF45" align="center">Страна</td>';
    }
    if (strlen($obl)<1){
        echo '<td bgcolor="#F93E39" align="center">Область</td>';
        }else{
        echo '<td bgcolor="#0AFF45" align="center">Область</td>';
    }
    if (strlen($city)<2){
        echo '<td bgcolor="#F93E39" align="center">Город</td>';
        }else{
        echo '<td bgcolor="#0AFF45" align="center">Город</td>';
    }
    if (strlen($kurator)<3){
        echo '<td bgcolor="#F93E39" align="center">Куратор</td>';
        }else{
        echo '<td bgcolor="#0AFF45" align="center">Куратор</td>';
    }
    if (strlen($sozd)<3){
        echo '<td bgcolor="#F93E39" align="center">Создатель</td>';
        }else{
        echo '<td bgcolor="#0AFF45" align="center">Создатель</td>';
    }
    echo '<td bgcolor="#A9E2F3" align="center">Строка в файле</td>';
    if ($create==0){
        echo '<td bgcolor="#F93E39" align="center">Создан</td>';
        }else{
        echo '<td bgcolor="#0AFF45" align="center">Создан</td>';
    }
    echo '<td bgcolor="#A9E2F3" align="center">Время создания</td>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    echo '<tr>';
    echo '<td>'.$login.'</td>';
    echo '<td>'.$name.'</td>';
    echo '<td>'.$otch.'</td>';
    echo '<td>'.$fam.'</td>';
    echo '<td>'.$land.'</td>';
    echo '<td>'.$obl.'</td>';
    echo '<td>'.$city.'</td>';
    echo '<td>'.$kurator.'</td>';
    echo '<td>'.$sozd.'</td>';
    echo '<td align="center">'.($column+1).'</td>';
    if ($create==0){
        echo '<td>Нет</td>';
        }else{
        echo '<td>Да</td>';
    }
    echo '<td align="center">'.$timeall.'</td>';
    echo '</tbody>';
    echo '</table>';    
    #echo "Запуск процесса создания пользователя<br />\n";
    #echo "Проверка структуры данных: <br />\n";
    
    echo "</pre>";
}

$uploaddir="/var/www/html/tmp/";
$uploadfile = $uploaddir . basename($_FILES['userlist']['name']);
#$name_list=$_POST['userlist'];
#$name_list=file_get_contents($_FILES['userlist']['name']);
#echo $name_list;
#echo $_FILES['userlist']['name'];
#echo $uploadfile;
echo '<pre>';

include 'forms_back.php';

if (move_uploaded_file($_FILES['userlist']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}

#echo 'Некоторая отладочная информация:';
#print_r($_FILES);

print "</pre>";
echo "Проверка структуры данных";
$lines = file($uploadfile);
#echo $handle;
foreach ($lines as $line_num => $line) {
   # echo "Строка №<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
    
    echo names($line,$line_num);
}

include 'forms_back.php';
?>

