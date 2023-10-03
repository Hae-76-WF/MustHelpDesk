<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin dashboard</title>
    <!-- Include Bootstrap CSS and JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JSPDF CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    
    <?php
    include_once './config/database.php';
    include_once './model/Ticket.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Tickets($db);
    $tickets = $item->getTickets();
    include_once("admin_template.php");
    ?>
</head>
<body>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
            <button id="pdfButton">Generate PDF</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <span data-feather="file"></span>
                <h5 class="card-title">Tickets</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php
                    $sql = 'SELECT COUNT(*) AS num_rows FROM open_tickets';
                    $result = $db->query($sql);
                    $num_rows = $result->fetchColumn();
                    echo ($num_rows);
                    ?></h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span data-feather="briefcase"></span>
                <h5 class="card-title">Services</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    <?php
                    $sql = 'SELECT COUNT(*) AS num_rows FROM service';
                    $result = $db->query($sql);
                    $num_rows = $result->fetchColumn();
                    echo ($num_rows);
                    ?></h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span data-feather="users"></span>
                <h5 class="card-title">Customers</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php
                    $sql = 'SELECT COUNT(*) AS num_rows FROM customers';
                    $result = $db->query($sql);
                    $num_rows = $result->fetchColumn();
                    echo ($num_rows);
                    ?></h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span data-feather="calendar"></span>
                <h5 class="card-title">Queues</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php
                    $sql = 'SELECT COUNT(*) AS num_rows FROM service';
                    $result = $db->query($sql);
                    $num_rows = $result->fetchColumn();
                    echo ($num_rows);
                    ?></h6>
            </div>
        </div>
    </div>

    <h2>Pending Tickets</h2>
    <div class="table-responsive" id="generatePDF">
        <table class="table table-striped table-sm" border="1" bordercolor="gray" >
            <thead>
            <tr>
                <th>Ticket no</th>
                <th>Customer ID</th>
                <th>Message</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tickets as $ticket):?>
                <tr>
                    <td><?php echo $ticket['ticket_num']; ?></td>
                    <td><?php echo $ticket['customer_userID']; ?></td>
                    <td><?php echo $ticket['message']; ?></td>
                    <td><?php echo $ticket['create_time']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<script>
    var button = document.getElementById("pdfButton");
    button.addEventListener("click", function () {
        var doc = new jsPDF("p", "mm", [300, 300]);
        var makePDF = document.querySelector("#generatePDF"); // Correct the selector to match the element ID

        // Generate the PDF from the HTML element
        doc.fromHTML(makePDF, 15, 15); // You can adjust the X and Y coordinates as needed

        // Save the PDF with a specific filename
        doc.save("report.pdf");
    });
</script>
</body>
</html>
 