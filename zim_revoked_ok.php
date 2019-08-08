<?php
header( "Content-Type: text/html; charset=utf-8" );
ini_set('display_errors',1);
error_reporting(E_ALL);
$start = microtime(true);
$par=$_POST['uname'];
$par_comment=$_POST['comment'];
$par_status=$_POST['comment2'];
ob_implicit_flush(true);
ob_end_flush();

echo "<pre>";
system ("sudo /etc/openvpn/easy-rsa/2.0/zim_revoke-full '$par' '$par_comment' '$par_status' 2>&1");
echo "<pre>";
echo "Время выполнения: ".(microtime(true) - $start);

include 'forms_back.php';
?>