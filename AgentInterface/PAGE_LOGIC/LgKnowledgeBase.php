<?php
require "../../config/DatabaseConfig.php";
class LgKnowledgeBase{
    private dbconnect $database;
    public function __construct(){
        $this->database = new dbconnect();
    }

    public function addKnowledgeBase(){
        // Loop through each uploaded file
        $rs = null;
        $fileName = $_FILES['attachment']['name'];
        $fileTmpName = $_FILES['attachment']['tmp_name'];

        // Move the uploaded file to the uploads/knowledgeBase folder
        $uploadDir = '../../Uploads/knowledgeBase/';
        $newFileName = date('YmdHis') . '_' . $fileName;
        $uploadFile = $uploadDir . $newFileName;
        move_uploaded_file($fileTmpName, $uploadFile);

        $attach_link = $newFileName;
        $rs = $this->database->addData("INSERT INTO knowledgebase(categoryID,`title`,`keywords`,`state`,`valid`,`attachment`,create_date) VALUES('" . (int)$_POST['category'] . "','" . $_POST['title'] . "','" . $_POST['keywords'] . "','" . $_POST['state'] . "','" . (int)$_POST['valid'] . "','NONE','" . date("Y-m-d H:i:s") . "')");
        $rs = (int)$this->database->conn->lastInsertId();
        $rs = $this->database->addData("INSERT INTO knowledgebase_contents(knowledge_id,section_title,content,images) VALUES('$rs','".$_POST['subtitle']."','".$_POST['content']."','$attach_link')");

        $this->database->CloseConnection();
        if($rs) return true;
        else return false;
    }

    public function getKnowledgeCategory(){
        return $this->database->getData("SELECT * FROM knowledge_category");
    }

    public function getKnowledgeBase(string $category_id = "", string $know_id = ""){
        if($category_id != "" && $know_id != ""){
            return $this->database->getData("SELECT * FROM knowledgebase WHERE categoryID='".(int)$category_id."' AND id='".(int)$know_id."'")[0];
        }else if($category_id != ""){
            return $this->database->getData("SELECT * FROM knowledgebase WHERE categoryID='".(int)$category_id."'");
        }else if($know_id != ""){
            return $this->database->getData("SELECT * FROM knowledgebase WHERE id='".(int)$know_id."'")[0];
        }
        return $this->database->getData("SELECT * FROM knowledgebase");

    }

    public function getKnowledgeBaseContent(string $know_id=""){
        if($know_id != ""){
            return $this->database->getData("SELECT * FROM knowledgebase_contents WHERE knowledge_id='".(int)$know_id."'")[0];
        }

        return $this->database->getData("SELECT * FROM knowledgebase_contents");

    }


}
