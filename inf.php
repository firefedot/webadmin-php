<?php
header( "Content-Type: text/html; charset=utf-8" );
//ini_set('display_errors',1);
error_reporting(E_ALL);
$start = microtime(true);
$login=$_POST['username'];
$name=$_POST['surname'];
$otch=$_POST['otchestvo'];
$fam=$_POST['familiya'];
$land=$_POST['country'];
$obl=$_POST['oblast'];
$city=$_POST['gorod'];
$sozd=$_POST['godname'];
$kurator=$_POST['kurator'];
#$date_today=strftime('%Y-%m-%d %H:%M:%S');
echo "Логин: ".$login.'</br>';
echo "Имя: ".$name.'</br>';
echo "Отчество: ".$otc.'</br>';
echo "Фамилия: ".$fam.'</br>';
echo "Создатель: ".$sozd.'</br>';
echo "Кто дал разрешение: ".$kurator.'</br>';
#echo "Data: ".$date_today.'</br>';

//header('Refresh: 90; url=' .$_SERVER['PHP_SELF']); 


//$name_user= "aafedotov";
include 'db_connect.php';


$connect=mysql_query("SELECT name_vpn FROM all_users WHERE name_vpn = '$login'");
    echo mysql_num_rows($connect). '</br>';
    while($data = mysql_fetch_array($connect)){
        //echo 'Terxt ' . $data['name_vpn'] . '</br>';
    }
if(mysql_num_rows($connect)==0){
    //echo 'Пользователя '.$name_user.' нет  в базе данных, идет создание...';
    /*$connect_add=mysql_query("INSERT INTO $db_table_to_show (name_vpn, country, oblast, city, "
            . "name, otchestvo, familiya, kurator, god_name) "
            . " values  ('$name_user', '$country', '$oblast', '$city', '$surname', '$otchestvo', "
            . "'$familiya', '$kurator', '$godname') ")
            or die(mysql_error());*/
    #$par='NAME='.$name_user.'; ZIM='.$surname.'; ZIM_O='.$otchestvo.'; ZIM_F='.$familiya.'; RU='.$country.'; OBL='.$oblast.'; CITY='.$city.'; COMP="RABOta"; OTDEL="otdel)"; NS="NameServer"; KURATOR='.$kurator.'; GODS='.$godname.'';
    $par=$login.' '.$fam.' '.$name.' '.$otch;
$connect_add=mysql_query("INSERT INTO all_users ( name_vpn, country, oblast, city, name, otchestvo, familiya, kurator, god_name ) values ( '$login', '$land', '$obl', '$city', '$name', '$otch', '$fam', '$kurator', '$sozd' ) ")
        or die(mysql_error());
    
echo $par;
    ob_implicit_flush(true);
    ob_end_flush();
    echo "<pre>";
    #system ("sudo /etc/openvpn/easy-rsa/2.0/expect_vpn.sh '$par' 2>&1");
    
    system ("sudo /home/netfilter/scripts/vpn.sh $login $fam $name $otch 2>&1");
    #system ("sudo PYTHONIOENCODING=utf-8 /etc/openvpn/easy-rsa/easyrsa3/vpn.py $name_user $familiya $surname $otchestvo 2>&1");
    #system("PYTHONIOENCODING=utf-8 python3.4 -c 'print(u\"усский\")' >output.txt");
    echo "<pre>";
    echo "Пользователь создан".'</br>';
    echo "Время выполнения: ".(microtime(true) - $start);
} else {
    echo 'Пользователь '.$name_user.' уже создан. Проверьте вводимые данные и повторите попытку';
}


echo "<pre>";
echo "<form action='index.php' method='post' enctype='multipart/form-data' accept-charset='uft-8'>";
echo "<input type='submit' value='Вернуться к спискам' />";
echo "</form>";
//

?>
