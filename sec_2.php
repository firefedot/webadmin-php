<?php
echo '<meta http-equiv="Cache-Control" content="no-cache">';
session_start();

echo '<style type="text/css">';
   echo 'a {color: green};';
  echo '</style>';
    
echo 'Список тем для само развития';
$array_pensiya=array("Первый","Новый","Счастье","Пенсия","Робость","Старость","Совбез","Страна","Блокнот","Ночь","Смерть","Чайка");
$array_sobes=array("вновь","вскользь","прочь","навзничь","бегло","быстро","бодро","долго","зачем","потому","когда","была");
$array_s=array("на","и","а","но","из","под","про","из-под");
$array_link=array("hа","du","fu","hj","t6","qw","jk","ty","po","op");
$array_link_need=array("ha","rp","na","to");
$array_pri=array("должно","красивое","нужное","сомобытное","причастие","верность","замешательство","серебрянный","оловянный","медленный","разноцветный","жми","наковальня","большой","квадратный");
$array_need=array("Молодость","Молоко","Робот","Час","Дранники");
shuffle($array_pensiya);
shuffle($array_sobes);
shuffle($array_s);
shuffle($array_link);
shuffle($array_pri);
shuffle($array_need);
$lst_pen = sizeof($array_pensiya)-1;
$lst_sob = sizeof($array_sobes)-1;
$lst_s = sizeof($array_s)-1;
$lst_link = sizeof($array_link)-1;
$lst_pri = sizeof($array_pri)-1;
$lst_need = sizeof($array_need)-1;
$lst_link_need = sizeof($array_link_need)-1;

$line1 = '<p><a href=alarm.php?lj='.$array_link[rand(0, 9)].'>'.$array_pensiya[0].' '.$array_sobes[0].' '.$array_s[0].' '.$array_pri[0].'</a></p>';
$line2 = '<p><a href=alarm.php?lj='.$array_link[rand(0, 9)].'>'.$array_pensiya[1].' '.$array_sobes[1].' '.$array_s[1].' '.$array_pri[1].'</a></p>';
$line3 = '<p><a href=alarm.php?lj='.$array_link[rand(0, 9)].'>'.$array_pensiya[2].' '.$array_sobes[2].' '.$array_s[2].' '.$array_pri[2].'</a></p>';
$line4 = '<p><a href=alarm.php?lj='.$array_link[rand(0, 9)].'>'.$array_pensiya[3].' '.$array_sobes[3].' '.$array_s[3].' '.$array_pri[3].'</a></p>';
$line5 = '<p><a href=alarm.php?lj='.$array_link_need[rand(0, $lst_link_need)].'>'.$array_need[rand(0, $lst_need)].' '.$array_sobes[4].' '.$array_s[4].' '.$array_pri[4].'</a></p>';
$line6 = '<p><a href=alarm.php?lj='.$array_link[rand(0, 9)].'>'.$array_pensiya[5].' '.$array_sobes[5].' '.$array_s[5].' '.$array_pri[5].'</a></p>';
$line7 = '<p><a href=alarm.php?lj='.$array_link[rand(0, 9)].'>'.$array_pensiya[6].' '.$array_sobes[6].' '.$array_s[6].' '.$array_pri[6].'</a></p>';
$line8 = '<p><a href=alarm.php?lj='.$array_link[rand(0, 9)].'>'.$array_pensiya[7].' '.$array_sobes[7].' '.$array_s[7].' '.$array_pri[7].'</a></p>';
$line9 = '<p><a href=alarm.php?lj='.$array_link[rand(0, 9)].'>'.$array_pensiya[8].' '.$array_sobes[8].' '.$array_s[8].' '.$array_pri[8].'</a></p>';

$array_lines=array("$line1","$line2","$line3","$line4","$line5","$line6","$line7","$line8","$line9");
shuffle($array_lines);
echo $array_lines[0];
echo $array_lines[1];
echo $array_lines[2];
echo $array_lines[3];
echo $array_lines[4];
echo $array_lines[5];
echo $array_lines[6];
echo $array_lines[7];
echo $array_lines[8];