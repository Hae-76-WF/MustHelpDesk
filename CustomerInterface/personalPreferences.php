<?php
session_start();

$location = "Personal Preferences";
require_once('./functions.php');

require_once("./DatabaseConfig.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_SESSION["email"];
    $password = $_POST["newPassword"];

    $passwordToBeReset;
    $db = new dbconnect();
    $result = $db->getData("SELECT password FROM customeruser WHERE email = '$email'");
    if (empty($result)) {

    }
    foreach($result as $row){
        $passwordToBeReset = $row["password"];
    }


    if($_POST["oldPassword"] !=  $passwordToBeReset){
        echo "Invalid password";
        exit;
    }

    $db = new dbconnect();
    $db->addData("UPDATE customeruser SET password='$password' WHERE email = '$email'");
    $db->closeConnection();
    header("Location:./login.php");
    exit;

}


include("./html/personalPreferences.html");

?>