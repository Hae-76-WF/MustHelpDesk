<?php
require_once("./DatabaseConfig.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     

    $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
    $pw = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $createTime = date('Y-m-d H:i:s');
    $createdBy= "Self";

    $db = new dbconnect();
    $added = $db->addData("INSERT INTO customeruser (fname,lname,email,create_time,password) VALUES ('$firstName','$lastName','$email','$createdBy','$pw');");

    if($added == "true"){
    $db->CloseConnection();
    header('Location: ./twoFactorAuthentication.php');
    exit;
    }
}

include("./html/signUp.html");
?>