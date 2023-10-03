<?php
session_start();

require_once('./DatabaseConfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $db = new dbconnect();

    $results = $db->getData("SELECT * FROM customeruser WHERE email='".$username."' AND password='".$password."'");

    if($results != null) {
        $row = $results[0];

        $_SESSION["userName"] = $row["fname"];
        $_SESSION["email"] = $username;
        $_SESSION["id"] = $row["customer_userID"];
        $starttime = date('Y-m-d H:i:s');
        $_SESSION["loginTime"] = $starttime;

        $db->addData("INSERT INTO  session_customer_user (customer_user_id,activity,start_time) VALUES (
        '".$row["customer_userID"]."','Logged in','$starttime')");
        $db->CloseConnection();

        header("Location: ./homepage.php");
        exit;

    }
    echo '<script>alert("Invalid Login details")</script>';
}
include("./html/login.html");
