<?php
require "../../config/DatabaseConfig.php";
require "Other_utils.php";

class LgAgentTicket
{
    private dbconnect $database;
    private Other_utils $other;

    public function __construct()
    {
        $this->database = new dbconnect();
        $this->other = new Other_utils();

    }

    public function addTicket(): bool
    {
        $status = false;
        if (isset($_POST["submit"])) {
            $agent = (int)$_SESSION['agent_id'];
            $cust_user = (int)$_SESSION["customer_userID"];
            //echo '<script>alert("'.$_SESSION["customer_userID"].'")</script>';

            $rs = $this->database->addData("INSERT INTO tickets(ticket_num,agentID,responsible,`owner`,queueID,serviceID,priority,create_time,`state`,`valid`) VALUES('" . $_SESSION["ticket_id"] . "','" . $agent . "','" . $_POST["responsible"] . "','" . $_POST["owner"] . "','" . $_POST["queue"] . "','" . $_POST["service"] . "','" . $_POST["priority"] . "','" . Date("Y-m-d h:i:s") . "','" . $_POST["state"] . "',1)");
            $rs1 = $this->database->addData("INSERT INTO mail_notification(customer_user_ID, agentID,`subject`,`message`,Attachment,create_date,`from`,`to`,`valid`) VALUES('" . $cust_user . "','" . $agent . "','" . $_POST["subject"] . "','" . $_POST["body"] . "','" . $_POST["add_knowledge"] . "','" . Date("Y-m-d h:i:s") . "','" . $_POST["from_user"] . "','" . $_POST["to_customer"] . "',1)");
            $rs2 = $this->database->addData("UPDATE open_tickets SET valid='0' WHERE ticket_num='".$_SESSION["ticket_id"]."'");

            if ($rs && $rs1 && $rs2) $status = true;

        }
        return $status;
    }

    public function viewOpenTickets(): void
    {
        $rs = $this->database->getData("SELECT * FROM open_tickets WHERE valid = 1");
        if ($rs != null) {
            echo '<table class="table table-responsive-lg table-responsive-md table-striped">
                    <tr>
                        <td class="font-weight-bold text-dark">Ticket Number</td>
                        <td class="font-weight-bold text-dark">Customer ID</td>
                        <td class="font-weight-bold text-dark">Title</td>
                        <td class="font-weight-bold text-dark">Create Date</td>
                        <td class="font-weight-bold text-dark">State</td>
                        <td class="font-weight-bold text-dark"></td>
                    </tr>';
            foreach ($rs as $row) {
                echo '<tr>
                        <td>' . $row["ticket_num"] . '</td>
                        <td>' . $row["customer_userID"] . '</td>
                        <td>' . $row["title"] . '</td>
                        <td>' . $row["create_time"] . '</td>
                        <td><span class="badge badge-primary">Open</span></td>
                        <td><a href="AgentTickets.php?tket=' . $row["ticket_num"] . '" class="btn btn-outline-dark">Assign</a></td>
                    </tr>';
            }
            echo '</table>';

        } else {
            echo "<strong class='text-dark'>No Open Tickets Available</strong>";
        }
    }

    public function getTicket(string $ticketID = ""): array
    {
        if ($ticketID != "") {
            return $this->database->getData("SELECT * FROM open_tickets WHERE ticket_num='" . (int)$ticketID . "'")[0];
        } else
            return $this->database->getData("SELECT * FROM open_tickets");

    }

    public function getPendingTicket(string $ticketID = ""): array
    {
        if ($ticketID != "") {
            return $this->database->getData("SELECT * FROM tickets WHERE id='" . (int)$ticketID . "'")[0];
        } else
            return $this->database->getData("SELECT * FROM tickets");

    }

    public function updateTicketStatus(): bool
    {
        $open_tickt = $this->database->getData("SELECT * FROM open_tickets WHERE ticket_num='" . $_SESSION['ticket_num'] . "'")[0];
        $customer_user = $this->other->getCustomer($open_tickt['customer_userID']);

        if (isset($_POST["update_state"])) {
            $rs1 = $this->database->addData("INSERT INTO mail_notification(customer_user_ID, agentID,subject,message,Attachment,create_date,`from`,`to`, `valid`) VALUES('" . (int)$open_tickt['customer_userID'] . "','" . (int)$_SESSION['agent_id'] . "','Ticket Status Update','Ticket is now at: " . $_POST["state"] . "','none','" . date("Y-m-d H:i:s") . "','notify@none','" . $customer_user['email'] . "',1)");
            $rs2 = $this->database->addData("UPDATE tickets SET state='" . $_POST['state'] . "', valid='" . $_POST['valid'] . "' WHERE id='" . (int)$_SESSION["tickets_id"] . "'");

            if ($rs1 && $rs2) return true;
            else return false;

        }

        if (isset($_POST["update_notify"])) {
            $rs = $this->database->addData("INSERT INTO mail_notification(customer_user_ID, agentID,subject,message,Attachment,create_date,`from`,`to`, `valid`) VALUES(" . (int)$open_tickt['customer_userID'] . "," . (int)$_SESSION['agent_id'] . ",'" . $_POST["subject"] . "','" . $_POST["body"] . "','none','" . date("Y-m-d H:i:s") . "','helpdesk@must.ac.ug','" . $customer_user['email'] . "',1)");
            if ($rs) return true;
            else return false;

        }

        return false;

    }
}
