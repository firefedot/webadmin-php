<?php
echo '<meta http-equiv="Cache-Control" content="no-cache">';
session_start();
$ip=$_SERVER['REMOTE_ADDR'];
echo $ip;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$r = rand(1, 3);
#echo $r;
if ($r == 1){
    include 'sec_1.php';
} else if ($r == 2){
    include 'sec_2.php';
} else if ($r == 3){
    include 'sec_3.php';
}
