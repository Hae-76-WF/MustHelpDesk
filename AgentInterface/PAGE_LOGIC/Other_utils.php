<?php
//require "../../config/DatebaseConfig.php";

class Other_utils
{
    private dbconnect $database;
    public function __construct()
    {
        $this->database = new dbconnect();
    }

    public function getCustomer(string $userID = ""): array{
        if($userID != "") {
            $rs = $this->database->getData("SELECT * FROM customeruser WHERE customer_userID='" . $userID . "'");
            return $rs[0];
        }else{
            return $this->database->getData("SELECT * FROM customeruser");
        }
    }

    public function getQueue(): array{
        return $this->database->getData("SELECT * FROM queue");
    }

    public function getAgents(string $id=""): array{
        if($id != "")
            return $this->database->getData("SELECT * FROM agent WHERE agentID='".(int)$id."'")[0];
        else
            return $this->database->getData("SELECT * FROM agent");
    }

    public function getSLA(int $id = 0): array{
        if ($id != 0){
            return $this->database->getData("SELECT * FROM sla WHERE sla_id='".$id."'")[0];
        }
        else{
            return $this->database->getData("SELECT * FROM sla");
        }
    }

    public function getService(int $id = 0): array{
        if ($id != 0){
            return $this->database->getData("SELECT * FROM service WHERE serviceID='".$id."'")[0];
        }
        else
            return $this->database->getData("SELECT * FROM service");
    }

    public function getOffice(string $id = ""):array{
        if ($id != ""){
            return $this->database->getData("SELECT * FROM customers WHERE customerID='".$id."'")[0];
        }
        else
            return $this->database->getData("SELECT * FROM customers");
    }

    public function getKnowledgeBase(string $id = ""): array{
        if ($id != ""){
            return $this->database->getData("SELECT * FROM knowledgebase WHERE id='".$id."'")[0];
        }
        else
            return $this->database->getData("SELECT * FROM knowledgebase");
    }

    public function getKnowledgeCategory(string $id = ""): array{
        if ($id != ""){
            return $this->database->getData("SELECT * FROM knowledge_category WHERE category_id='".$id."'")[0];
        }
        else
            return $this->database->getData("SELECT * FROM knowledge_category");
    }


}