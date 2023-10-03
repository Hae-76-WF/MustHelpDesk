<?php
session_start();

$location = "New Ticket";

require_once('./functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["textarea"], FILTER_SANITIZE_STRING);
    $createTime = date('Y-m-d H:i:s');
    $createdBy = $_SESSION["id"];
    $userId = $_SESSION["id"];
    $notificationId;
    $ticketStateId;
    $added;
    $db = new dbconnect();

    if (isset($_FILES['file'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $destination = "./uploads/" . $file_name;
        move_uploaded_file($file_tmp, $destination);

        $added = $db->addData("INSERT INTO open_tickets (title,message,body,customer_userID,create_time,attachment,valid) VALUES ('$title','$message','$message','$userId','$createTime','$destination',1);");
    } else {

        $added = $db->addData("INSERT INTO open_tickets (title,message,body,customer_userID,create_time,valid) VALUES ('$title','$message','$message','$userId','$createTime',1);");
    }

    if ($added == "true") {
        $db->CloseConnection();
        //alert("Ticket created successfully");
        sleep(1);

        header("Location: ./homepage.php");
        exit;
    } else {
        echo "Error adding into the database";
    }
}

include("./html/newTicket.html");

?>