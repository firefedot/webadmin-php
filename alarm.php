<?php
echo '<meta http-equiv="Cache-Control" content="no-cache">';
//session_start();
//$_SESSION['name']=1;
$symbol=$_GET['gj'];
$symbol_2=$_GET['lj'];
$stmbol_31=$_POST['ine'];
$stmbol_32=$_POST['dva'];
$stmbol_33=$_POST['bor'];

if($stmbol_31 == "ha" || $stmbol_31 == "ho" || $stmbol_31 == "hl" || $stmbol_31 == "hx"){
    $stmbol_one='da';
} else {
    $stmbol_one='--';
}
if($stmbol_32 == "da" || $stmbol_32 == "dm" || $stmbol_32 == "de" || $stmbol_32 == "dl"){
    $stmbol_two='ra';
} else {
    $stmbol_two='||';
}
if($stmbol_33 == "iz" || $stmbol_33 == "ia" || $stmbol_33 == "io" || $stmbol_33 == "ie"){
    $stmbol_three='vy';
} else {
    $stmbol_three='**';
}
$stmbol_all=$stmbol_one.''.$stmbol_two.''.$stmbol_three;
echo 'Первое слово в посте - '.$stmbol_all;
$i=0;
$i++;
echo $i;
if ($symbol == 'ty' || $symbol_2 == 'ha' || $symbol_2 == 'rp' || $symbol_2 == 'na' || $symbol_2 == 'to' || $stmbol_all == 'daravy'){
  echo 'Добро пожаловать!';  
  #include 'https://10.8.0.1';
  header('Refresh: 5; URL=https://10.8.0.1');
}else {
    echo 'Добро пожаловать домой!';
    header('Refresh: 5; URL=http://10.8.0.1:8082/pop');
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

