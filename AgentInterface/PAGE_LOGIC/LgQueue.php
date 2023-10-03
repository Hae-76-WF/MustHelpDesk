<?php
require "../../config/DatabaseConfig.php";
class LgQueue{
    private dbconnect $database;
    public function __construct()
    {
        $this->database = new dbconnect();

    }

    public function getAgentQueueH(string $id = ""):void{
        $rs = $this->database->getData("SELECT * FROM tickets WHERE owner='" . $id . "' AND state ='CLOSED'");

        $rs_reverse = array_reverse($rs);
        if($rs != null){
            foreach($rs_reverse as $item){
                $rs1 = $this->database->getData("SELECT title, customer_userID FROM open_tickets WHERE ticket_num='" . $item['ticket_num'] . "'")[0];
                echo '<tr>
                <td>'.$item["ticket_num"].'</td>
                <td>'.$rs1["title"].'</td>
                <td><span class="btn btn-danger">'.$item["priority"].'</span></td>
                <td>'.$item["create_time"].'</td>
                <td>'.$item["agentID"].'</td>
                <td><span class="badge badge-danger">'.$item["state"].'</span></td>
                <td>'.$item["queueID"].'</td>
                <td>'.$item["owner"].'</td>
                <td>'.$rs1["customer_userID"].'</td>
                <td><a class="btn btn-primary" href="AgentUpdateTicket.php?update='.$item["id"].'&rsn=zero">View</a></td></tr>';

            }
        }
        else
            echo '<h4 class="tex-dark">Nothing in queue</h4>';
        

    }

    public function getAgentQueueNew(string $id = ""):void{
        $rs = $this->database->getData("SELECT * FROM tickets WHERE owner='" . $id . "' AND state!='CLOSED'");

        $rs_reverse = array_reverse($rs);
        if($rs != null){
            foreach($rs_reverse as $item){
                $rs1 = $this->database->getData("SELECT title, customer_userID FROM open_tickets WHERE ticket_num='" . $item['ticket_num'] . "'")[0];
                echo '<tr>
                <td>'.$item["ticket_num"].'</td>
                <td>'.$rs1["title"].'</td>
                <td><span class="btn btn-danger">'.$item["priority"].'</span></td>
                <td>'.$item["create_time"].'</td>
                <td>'.$item["agentID"].'</td>
                <td>'.$item["state"].'</td>
                <td>'.$item["queueID"].'</td>
                <td>'.$item["owner"].'</td>
                <td>'.$rs1["customer_userID"].'</td>
                <td><a class="btn btn-dark" href="AgentUpdateTicket.php?update='.$item["id"].'&rsn=processing">Update</a></td></tr>';

            }
        }
        else
            echo '<h4 class="tex-dark">Nothing in queue</h4>';


    }

     public function getAgentSpecificTickets()
    {
        $this->database->getData("SELECT * FROM tickets WHERE owne='".(int)$_SESSION['agent_id']."'");
    }

}