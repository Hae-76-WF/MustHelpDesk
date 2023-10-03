<?php
session_start();

require_once('./DatabaseConfig.php');


$db = new dbconnect();

$loginTime = $_SESSION["loginTime"];
$id = $_SESSION["id"];
$logoutTime = date('Y-m-d H:i:s');


$db->addData("UPDATE  session_customer_user SET end_time = '$logoutTime' WHERE customer_user_id = '$id' AND start_time = '$loginTime'");


session_destroy();
 header('Location: ./login.php');
 exit;

?>
