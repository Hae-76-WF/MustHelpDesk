<?php
include "../../config/DatabaseConfig.php";
session_start();
function login(){
    if (isset($_POST["agent_login"])){
        if(str_contains($_POST['email'], "@")){
            $con = new dbconnect();
            $results = $con->getData("SELECT * FROM agent WHERE email='".$_POST["email"]."' AND pasword='".$_POST["password"]."';");

            if($results != null){
                $_SESSION["agent_email"] = $_POST["email"];
                if(isset($_SESSION['login_status'])) unset($_SESSION['login_status']);
                $con->CloseConnection();
                header("location: ../HTML/AgentDashboard.php");
            }
            else{
                $_SESSION['login_status'] = 'invalid';
                $con->CloseConnection();
                header("location: ../index.php");
            }

        }else{
            $_SESSION['login_status'] = 'invalid';
            header("location: ../index.php");
        }
    }else{
        header("location: ../index.php");
    }
}
