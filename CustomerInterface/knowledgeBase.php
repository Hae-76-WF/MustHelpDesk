<?php
session_start();
$location = "Knowledge Base";
require_once('./functions.php');

require_once('./DatabaseConfig.php');
    $db = new dbconnect();

    $result = $db->getData("SELECT * FROM knowledgebase JOIN knowledgebase_contents ON knowledgebase.id = knowledgebase_contents.knowledge_id WHERE state = 'CUSTOMER' OR state = 'ALL'");


    


include("./html/knowledgeBase.html");
?>