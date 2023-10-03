<?php
session_start();
require_once("./DatabaseConfig.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $password = $_POST["password"];
    $email = $_SESSION["email"];

    $db = new dbconnect();
    $db->addData("UPDATE customeruser SET password='$password' WHERE email = '$email'");
    $db->closeConnection();
    header("Location:./login.php");
    exit;

}

include("./html/changePassword.html");
?>