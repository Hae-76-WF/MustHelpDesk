<?php
require_once('./DatabaseConfig.php');
//from  myNotifications.php
function myNotifications()
{

    $db = new dbconnect();

    $results = $db->getData("SELECT notification_event.create_time, comments, subject FROM notification_event 
    JOIN notification_event_message ON notification_event.id = notification_event_message.notification_id 
    JOIN customeruser ON notification_event.valid_id = customeruser.customer_userID WHERE customeruser.customer_userID = {$_SESSION['id']}");

    if (empty($results)) {
        echo "No new nofifications<br><br>";
        return;
    }

    $count = 0;
    echo '<table style="width:100%; border-bottom:solid 1px">';

    foreach ($results as $row) {

        $comment = $row["comments"];
        $name = $row["subject"];
        $time = $row["create_time"];
        echo "
    <tr>
    <a href='' style='text-decoration: none;' >
            <td>O</td>
            <td>
            <strong>$name</strong>
            <p>$comment</p>
            
            </td>
            <td style='align:left;'>
            <p>$time</p>    
            </td>
    </a> 
    </tr>
    ";
    }
    echo '</table>';


    $db->closeConnection();
}

//from  notifications.php
function getNotifications()
{

    $db = new dbconnect();

    $results = $db->getData("SELECT text,subject FROM notification_event_message 
    JOIN notification_event ON notification_event.id = notification_event_message.notification_id 
    JOIN customeruser ON notification_event.valid_id = customeruser.customer_userID WHERE customeruser.customer_userID = {$_SESSION['id']}");

    if (empty($results)) {
        echo "No new nofifications";
        return;
    }
    $count = 1;
    foreach ($results as $row) {

        $name = $row["subject"];
        $comment = $row["comments"];

        echo "
    <div><a href='' style='text-decoration = none;' >
    <strong>$name</strong>
    <p>$comment</p>
    </div>
    </a> 
    <hr>        
    ";

        $count++;
        if ($count == 6) {
            break;
        }
    }
    $db->closeConnection();
}


function getAllNotifications()
{
    $db = new dbconnect();

    $results = $db->getData("SELECT * FROM notifications_event WHERE valid_id = {$_SESSION["id"]}");

    if (empty($results)) {
        echo "No nofifications";
        return;
    }

    foreach ($results as $row) {

        $name = $row["title"];
        $state = $row["message"];
        $time = $row["create_time"];

        echo "
    <tr>
    <td>O</td>
    <td>$name</td>
    <td>$state</td>
    <td>$time</td>
    </tr>    
    ";

    }
    $db->closeConnection();
}

function getServiceCatalog()
{
    $db = new dbconnect();

    $results = $db->getData("SELECT * FROM service");

    if (empty($results)) {
        echo "No services currently";
        return;
    }
    foreach ($results as $row) {


        $name = $row["name"];
        $comment = $row["comment"];

        echo "
    <div><a href='' style='text-decoration = none;' >
    <strong>$name</strong>
    <p>$comment</p>
    </div>
    </a> 
    <hr>        
    ";

    }
    $db->closeConnection();

}


//from ticketList

function allTickets()
{
    $db = new dbconnect();
    $state;
    $results = $db->getData("SELECT * FROM open_tickets WHERE customer_userID='" . (int)$_SESSION["id"] . "'");

    if (empty($results)) {
        echo "No tickets available";
        return;
    }

    foreach ($results as $row) {
        $ticketNumber = $row["ticket_num"];
        $title = $row["title"];
        $created = $row["create_time"];

        if ((int)$row['valid'] == 1) {
            $state = 'OPEN';
        } else {
            $subQ = $db->getData("SELECT state FROM tickets WHERE ticket_num = $ticketNumber")[0];
            $state = $subQ["state"];
        }

        echo "
      <tr height='38'>
        <td>$ticketNumber</td>
        <td>$title</td>
        <td><a href='./showTicket.php?link=$ticketNumber'>$state</a></td>
        <td>$created</td>
      </tr>       
    ";

    }
    $db->closeConnection();

}


function openTickets()
{
    $db = new dbconnect();

    $results = $db->getData("SELECT * FROM open_tickets WHERE customer_userID='" . $_SESSION["id"] . "'");

    if (empty($results)) {
        echo "No tickets available";
        return;
    }

    foreach ($results as $row) {
        if ((int)$row['valid'] == 0) {
            $ticketNumber = $row["ticket_num"];
            $title = $row["title"];
            $created = $row["create_time"];

            $subQ = $db->getData("SELECT state FROM tickets WHERE ticket_num = $ticketNumber");

            foreach ($subQ as $row) {
                if ($row['state'] != "CLOSED") {
                    echo "
        <tr height='38'>
            <td>$ticketNumber</td>
            <td>$title</td>
            <td><a href='./showTicket.php?link=$ticketNumber'>" . $row["state"] . "</a></td>
            <td>$created</td>
        </tr>       
        ";
                }
            }
        } else {
            echo "
        <tr height='38'>
            <td>" . $row["ticket_num"] . "</td>
            <td>" . $row["title"] . "</td>
            <td><a href='./showTicket.php?link=" . $row["ticket_num"] . "'>OPEN</a></td>
            <td>" . $row["create_time"] . "</td>
        </tr>       
        ";
        }
    }
    $db->closeConnection();

}

function closedTickets()
{
    $db = new dbconnect();

    $results = $db->getData("SELECT * FROM open_tickets WHERE valid=0 AND customer_userID='" . (int)$_SESSION["id"] . "'");

    if (empty($results)) {
        echo "No tickets available";
        return;
    }

    foreach ($results as $row) {
        $ticketNumber = $row["ticket_num"];
        $title = $row["title"];
        $created = $row["create_time"];

        $subQ = $db->getData("SELECT state FROM tickets WHERE ticket_num = $ticketNumber");

        foreach ($subQ as $row) {
            if ($row["state"] == "CLOSED") {
                echo "
        <tr height='38'>
            <td>$ticketNumber</td>
            <td>$title</td>
            <td><a href='./showTicket.php?link=$ticketNumber'>" . $row["state"] . "</a></td>
            <td>$created</td>
        </tr>       
        ";
            }
        }
    }

    $db->closeConnection();

}

?>