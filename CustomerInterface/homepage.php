<?php
session_start();
require_once('./functions.php');

$countOpenTickets = 0;
$countAllTickets =0;
$countClosedTickets = 0;

$db = new dbconnect();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searchValue = $_POST["searchValue"];

    echo "
    <p>
    $searchValue
    </p>"
    ;

    $KnowledgeSearch = $db->getData("SELECT * FROM knowledgebase JOIN knowledgebase_contents ON knowledgebase.id = knowledgebase_contents.knowledge_id WHERE (state = 'CUSTOMER' OR state = 'ALL') AND title LIKE '%$searchValue%' LIMIT 5");
    if(isset($KnowledgeSearch)){

    foreach($KnowledgeSearch as $row){
        $knowledgeBase = $row["title"];
        $knowledgeBaseID = $row["id"];
        
        echo"
        <div>
        <a href='./subKnowledgeBase.php?link=$knowledgeBase&link2=$knowledgeBaseID' class='knowledgeBox'>
            <div style='width:50%;position:relative;'>
                <div style='flex: 1; color: rgb(111, 110, 115); padding-left:20px; padding-right:20px;'>
                    <h5>$knowledgeBase</h5>
                </div>
            </div>
            </a> 
        </div>
        ";

    }
}
}



if(isset($_SESSION['id'])){

 $data3 = $db->getData("SELECT COUNT(ticket_num) as num FROM open_tickets WHERE valid = 1 AND customer_userID = {$_SESSION['id']}");
foreach($data3 as $row) $countOpenTickets  = $row['num'];

$data2 = $db->getData("SELECT COUNT(ticket_num) as num FROM open_tickets WHERE valid = 0 AND customer_userID = {$_SESSION['id']}");
foreach($data2 as $row) $countClosedTickets  = $row['num'];

$data = $db->getData("SELECT COUNT(ticket_num) as num FROM open_tickets WHERE customer_userID = {$_SESSION['id']}");
foreach($data as $row) $countAllTickets = $row['num']; 


}else{
    echo "Not logged in.";
}


$KnowledgeResults = $db->getData("SELECT * FROM knowledgebase JOIN knowledgebase_contents ON knowledgebase.id = knowledgebase_contents.knowledge_id WHERE state = 'CUSTOMER' OR state = 'ALL'");

include("./html/homePage.html");
?>


