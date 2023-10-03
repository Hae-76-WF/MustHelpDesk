<?php
    include_once '../config/database.php';
    include_once '../model/Services.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Services($db);
    
$serviceID = $_GET['serviceID'];

if ($item->deleteService($serviceID)) {
    echo 'Service deleted successfully.'. $serviceID;
    header("Location: ../Services.php");
} else {
    echo 'Service could not be deleted.';
}

?>