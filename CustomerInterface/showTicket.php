<?php
session_start();
require_once('./DatabaseConfig.php');
$body;
$title;
$state = '';
$db = new dbconnect();

if (isset($_GET['link'])){

    $link = $_GET['link'];
    $results = $db->getData("SELECT * FROM open_tickets WHERE ticket_num = $link");
    foreach($results as $row){
        $title = $row["title"];
        $body = $row["body"];
        if($row["valid"] == 0){
            $state = 'CLOSED';

        }elseif($row["valid"] == 1){
            $result = $db->getData("SELECT * FROM tickets WHERE ticket_num = $link");
            foreach($result as $row2) {
                $state = $row2["state"];
            }
        }
    }

}

include("./html/showTicket.html");
?>