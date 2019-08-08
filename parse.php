<?php

echo "<link rel='stylesheet' href='css/style.css' />";
echo "<link rel='stylesheet' href='css/jquery-ui.css' />";
echo '<link rel="stylesheet" href="css/jquery.dataTables.min.css" type="text/css"/>';
echo "<script src='js/jquery-1.11.2.js'> </script>";
echo "<script src='js/jquery-ui.js'> </script>";

echo '<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>';
echo '<script type="text/javascript" src="js/table_color.js"></script>';

include 'db_connect.php';

//$mount='/home';
$mount=$_GET['mnt'];
$url = 'http://admin:SYGDkw8O92iWzCNegG0S@10.8.0.1:8888/admin/listclients.xsl?mount='.$mount; 
$url_stats='http://10.8.0.1:8888/statxml.xsl';

echo 'Общие сведения<br>';
$smpl_xml_stats=simplexml_load_file($url_stats);
foreach ($smpl_xml_stats->source as $us){
    $curent_user=$us->listeners;
    $peak_user=$us->listener_peak;
    $mount_list=$us->mount;
    echo 'Точка вещания <b>'.$mount_list.'</b><br>';
    echo 'Сейчас на связи <b>'.$curent_user.'</b> слушателей<br>';
    echo 'Максимальное количество <b>'.$peak_user.'</b>, которое было на связи<br>';
    echo "Посмотреть список: <a href='http://10.8.0.1:8082/parse.php?mnt=$mount_list' /> Посмотреть</a><br><br>";
}

echo '<p>Список тех кто слушает</p>';
echo '<table id="select" border="1">';
echo '<thead>';
echo '<tr>';
echo '<th>ip</th>';
echo '<th>Имя</th>';
echo '<th>Времени слушает</th>';
echo '<th>Город</th>';
echo '<th>ФИО</th>';
echo '<th>Внешний ip</th>';
echo '<th>Действия</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
    
$smpl_xml=simplexml_load_file($url);
$mount = $smpl_xml->mount;
echo "Точка вещания <b>".$mount."</b><br>";

foreach ($smpl_xml->users as $us){
    
    $login=$us->username;
    //settype($login, "string");
    $login= str_replace('(', '', $login);
    $login=  str_replace(')', '', $login);
    $login = trim($login);
    $qr_result = mysql_query("select name_vpn, city, name, otchestvo, familiya, kurator, online, ip_web from all_users WHERE name_vpn = '$login' ")
        or die(mysql_error());
    
    //echo 'Сколько колонок при запросе - '.mysql_num_rows($qr_result).'<br>';
    if(mysql_num_rows($qr_result)==0){
        //echo 'Вводимое имя '.$login.' не существет';
        $city='Нет в базе';
        $fio='Нет в базе';
        $web_ip='Нет в базе';
    }  else {
        while($data = mysql_fetch_array($qr_result)){
            //echo 'Вводимое имя '.$data['name_vpn'].' есть в базе';
            $city=$data['city'];
            $fio=$data['familiya'].' '.$data['name'].' '.$data['otchestvo'];
            $web_ip=$data['ip_web'];
        }
    }
    
    $ip2=$us->ip;
    $time2=(int)$us->time;
    $id2=$us->id;
    
    $time_hour=  floor($time2/3600);
    
    $time_all= date('i:s',$time2);
echo '<tr><td>'.$ip2.'</td>'
        . '<td>'.$login.'</td>'
        . '<td align="center">'.$time_hour.':'.$time_all.'</td>'
        . '<td>'.$city.'</td>'
        . '<td>'.$fio.'</td>'
        . '<td>'.$web_ip.'</td>'
        . '<td><a href="http://10.8.0.1:8888/admin/killclient.xsl?mount=/home&amp;id='.$id2.'" >Кикнуть</a></td>'
        . '</tr>';
}
echo '</tbody>';	
echo '</table>';