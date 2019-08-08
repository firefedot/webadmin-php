<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo '<meta http-equiv="Cache-Control" content="no-cache">';
$r = rand(0, 13);
echo 'Истина где-то рядом!';
#echo '<a href=alarm.php?gj=ty>click</a>';
#include './pages/demo1/index.html';
$array_string = array("foo", "bar", "hello", "world", "ty", "dom", "zimbra", "dgh", "sdfgh", "dfg");
$lst_str = sizeof($array_string)-1;
//echo $lst_str;
//echo $array_string[4];
$array_image = array("./images/sec/avedesk.png",
    "./images/sec/avedesk.png",
    "./images/sec/bin_full.png",
    "./images/sec/folder_downloads.png",
    "./images/sec/folder_mac.png",
    "./images/sec/folder_pink.png",
    "./images/sec/folder_win.png",
    "./images/sec/full_r_bin_.png",
    "./images/sec/httrack.png",
    "./images/sec/ichat_smilie.png",
    "./images/sec/ichat_squared.png",
    "./images/sec/mm_fireworks_02.png",
    "./images/sec/notepad_01.png",
    "./images/sec/peevish.png",
    "./images/sec/mm_flash_02.png");
$lst_img = sizeof($array_image)-1;
$array_image_2 = array("./images/sec/bin_empty.png",
    "./images/sec/hl2_01.png",
    "./images/sec/hl2_02.png",
    "./images/sec/hl2_03.png",
    "./images/sec/skype_red.png",
    "./images/sec/skype_green.png",
    "./images/sec/skype_blue.png");
$lst_img_2 = sizeof($array_image_2)-1;
$sw='width="64"';
$line_begin='<td><a href=alarm.php?gj=ty><img src="./images/sec/avedesk.png" ';
$line_begin_1='<td><a href=alarm.php?gj=';
$line_begin_2='><img src="./images/sec/avedesk.png"';
$line_end='width="64" /></a></td>';
$line1='<tr>'
        . '<td><a href=alarm.php?gj='.$array_string[0].'><img src='.$array_image[0].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[3].'><img src='.$array_image[1].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[2].'><img src='.$array_image[2].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[1].'><img src='.$array_image[3].' '.$line_end.''  
        . '<td><a href=alarm.php?gj='.$array_string[0].'><img src='.$array_image[4].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[9].'><img src='.$array_image[5].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[8].'><img src='.$array_image[6].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[7].'><img src='.$array_image[7].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[6].'><img src='.$array_image[9].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[5].'><img src='.$array_image[8].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[3].'><img src='.$array_image[10].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[2].'><img src='.$array_image[9].' '.$line_end.''  
        . '<td><a href=alarm.php?gj='.$array_string[6].'><img src='.$array_image[0].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[6].'><img src='.$array_image[10].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[6].'><img src='.$array_image[9].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[7].'><img src='.$array_image[0].' '.$line_end.''
        . '</tr>';
$line2='<tr>'
        . '<td><a href=alarm.php?gj='.$array_string[2].'><img src='.$array_image[3].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[2].'><img src='.$array_image[2].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[14].'><img src='.$array_image[2].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[2].'><img src='.$array_image[3].' '.$line_end.''  
        . '<td><a href=alarm.php?gj='.$array_string[4].'><img src='.$array_image_2[rand(0, $lst_img_2)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[2].'><img src='.$array_image_2[rand(0, $lst_img_2)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[0].'><img src='.$array_image_2[rand(0, $lst_img_2)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[2].'><img src='.$array_image_2[rand(0, $lst_img_2)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[3].'><img src='.$array_image_2[rand(0, $lst_img_2)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[6].'><img src='.$array_image[rand(0, $lst_img)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[7].'><img src='.$array_image[rand(0, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[8].'><img src='.$array_image[rand(0, $lst_img)].' '.$line_end.''  
        . '<td><a href=alarm.php?gj='.$array_string[9].'><img src='.$array_image[rand(0, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[9].'><img src='.$array_image[rand(0, $lst_img)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[6].'><img src='.$array_image[rand(0, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[5].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '</tr>';
$line3='<tr>'
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''  
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''  
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '</tr>';
$line4='<tr>'
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''  
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''  
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''   
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '<td><a href=alarm.php?gj='.$array_string[rand(5, $lst_str)].'><img src='.$array_image[rand(5, $lst_img)].' '.$line_end.''
        . '</tr>';
echo '<table border="0">';
$array_lines = array("$line1","$line2","$line3","$line4");
shuffle($array_lines);
echo $array_lines[0];
echo $array_lines[1];
echo $array_lines[2];
echo $array_lines[3];
echo '</table>';