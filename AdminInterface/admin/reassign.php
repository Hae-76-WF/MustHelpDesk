<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure you have a database connection
    include_once 'config/database.php';
    $database = new Database();
    $db = $database->getConnection();
    
    // Get the ticket number and agent ID from the form submission
    $ticketNumber = $_POST['ticketNumber'];
    $agentID = $_POST['agentSelect'];
    
    // Update the ticket in the "tickets" table with the new agent ID
    $updateQuery = "UPDATE ticket SET agentid = :agent_id WHERE ticket_num = :ticket_num";
    
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(':agent_id', $agentID, PDO::PARAM_INT);
    $stmt->bindParam(':ticket_num', $ticketNumber, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        // Ticket reassignment was successful
        header('Location: dashboard.php'); // Redirect to the previous page or another appropriate location
        exit();
    } else {
        // Error occurred during reassignment
        echo "Error reassigning the ticket.";
    }
} else {
    // Handle invalid request (not a POST request)
    echo "Invalid request method.";
}
?>
