<?php
    include_once '../config/database.php';
    include_once '../model/services.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new services($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->name = $_POST['service'];
    $item->comment = $_POST['comment'];
    $item->valid = $_POST['validity'];
    $item->create_date = date('Y-m-d H:i:s');
    $item->sla_id = $_POST['sla_id'];

    
    if($item->createService()){
        echo 'Service added successfully.';
        header("Location: ../Services.php");
    } else{
        echo 'Service could not be added.';
    }
?>