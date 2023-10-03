<?php
session_start();
$location = "Knowledge Base";
$category = $_GET["link"];
$id = $_GET["link2"];


require_once('./functions.php');
require_once('./DatabaseConfig.php');

$db = new dbconnect();
$result = $db->getData("SELECT * FROM knowledgebase JOIN knowledgebase_contents ON knowledgebase.id = knowledgebase_contents.knowledge_id WHERE knowledgebase.id = $id");

include("./html/subKnowledgeBase.html");

?>