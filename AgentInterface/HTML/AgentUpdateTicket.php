<?php
session_start();
if(!isset($_SESSION["agent_names"]) || !isset($_SESSION["agent_id"])) {
    header("location: /AgentInterface/");
    exit();
}

$_SESSION["tickets_id"] = $_GET['update'];
include "../PAGE_LOGIC/LgAgentTicket.php";
$othr = new Other_utils();
$views = new LgAgentTicket();

$ticket = $views->getPendingTicket($_GET['update']);
$rsn = $_GET['rsn'];

$_SESSION['ticket_num'] = $ticket['ticket_num'];
if (isset($_POST['update_state']) || isset($_POST['update_notify'])){
    $tick_update = $views->updateTicketStatus();
    if($tick_update)
        echo '<script>alert("Update Successful");</script>';
    else echo '<script>alert("Failed to update");</script>';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Ticket Update : MUST Help Desk</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="../../Assets/images/logo.png" type="image/png"/>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../Assets/bootstrap/css/bootstrap.min.css"/>

    <!-- responsive css -->
    <link rel="stylesheet" href="../../Assets/css/responsive.css"/>
    <!-- color css -->
    <link rel="stylesheet" href="../../Assets/css/color_2.css"/>
    <!-- select bootstrap -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap-select.css"/>
    <!-- scrollbar css -->
    <link rel="stylesheet" href="../../Assets/css/perfect-scrollbar.css"/>
    <!-- custom css -->
    <link rel="stylesheet" href="../../Assets/css/custom.css"/>
    <link rel="stylesheet" href="../../Assets/font-awesome/css/font-awesome.min.css"/>
    <!-- site css -->
    <link rel="stylesheet" href="../../Assets/css/style.css"/>

</head>
<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar" class="">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section" style="background-color: #304f5a">
                        <a href="AgentDashboard.php">
                            <img class="logo_icon img-responsive" src="../../Assets/images/person.png"
                                 style="border-radius: 90px"
                                 alt="#"/>
                        </a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="../../Assets/images/person.png" alt="#"/>
                        </div>
                        <div class="user_info">
                            <h6><?php echo $_SESSION["agent_names"] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">
                <!--                <h4>General</h4>-->
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="AgentDashboard.php"><i
                                    class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                        <!--                        <ul class="collapse list-unstyled" id="dashboard">-->
                        <!--                            <li>-->
                        <!--                                <a href="dashboard.html">> <span>Default Dashboard</span></a>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <a href="dashboard_2.html">> <span>Dashboard style 2</span></a>-->
                        <!--                            </li>-->
                        <!--                        </ul>-->
                    </li>
                    <li><a href="AgentQueue.php"><i class="fa fa-first-order orange_color"></i>
                            <span>My Queue</span></a>
                    </li>
                    <li>
                        <a href="#tickets" data-toggle="collapse" aria-expanded="false"><i
                                    class="fa fa-ticket purple_color"></i> <span>Tickets</span>
                        </a>
                        <ul class="collapse list-unstyled" id="tickets">
                            <li><a href="ViewOpenTickets.php"> <span>Open Tickets</span></a></li>
<!--                            <li><a href="AgentTickets.php"> <span>Assign Tickets</span></a></li>-->

                        </ul>
                    </li>
                    <li>
                        <a href="#customers" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-table purple_color2"></i>
                            <span>Customers</span>
                    <li class="dropdown-menu"></li>
                    </a>
                    <ul class="collapse list-unstyled" id="customers">
                        <li><a href="AgentCustomer.php" class=""><span>Customer</span></a></li>
                        <li><a href="AgentCustomerUser.php" class=""><span>Customer User</span></a></li>

                    </ul>
                    </li>
                    <li>
                        <a href="AgentKnowledgeBase.php"><i
                                    class="fa fa-archive blue2_color"></i> <span>Knowledge Base</span></a>
                        <!--                        <ul class="collapse list-unstyled" id="apps">-->
                        <!--                            <li><a href="email.html">> <span>Email</span></a></li>-->
                        <!--                            <li><a href="calendar.html">> <span>Calendar</span></a></li>-->
                        <!--                            <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>-->
                        <!--                        </ul>-->
                    </li>
                    <li><a href="destroy.php"><i class="fa fa-sign-out yellow_color"></i> <span>Log Out</span></a></li>
                </ul>
            </div>
        </nav>
        <!-- end sidebar -->
        <!-- right content -->
        <div id="content">
            <!-- topbar -->
            <div class="topbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i>
                        </button>
                        <div class="logo_section">
                            <a href="index.html"><img class="img-responsive" src="../../Assets/images/logo.png"
                                                      alt="#"/></a>
                        </div>
                        <div class="right_topbar">
                            <div class="icon_info">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-bell-o"></i>
                                            <span class="badge">2</span></a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-envelope-o">
                                            </i>
                                            <span class="badge">3</span></a>
                                    </li>
                                </ul>
                                <ul class="user_profile_dd">
                                    <li>
                                        <a data-toggle="dropdown">
                                            <span class="name_user"><?php echo explode(" ", $_SESSION["agent_names"])[0] ?></span>
                                            <span class="dropdown-toggle"></span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="profile.html">My Profile</a>
                                            <a class="dropdown-item" href="destroy.php"><span>Log Out</span> <i
                                                        class="fa fa-sign-out"></i></a>

                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
                <div class="container-fluid">
                    <div class="row column_title">
                        <div class="col-md-12">
                            <div class="page_title">
                                <h2 class="fa fa-ticket"> Tickets | <span class="btn btn-success">Open</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="row column1">
                        <div class="col-md-12 col-lg-12">
                            <div class="dark_bg full margin_bottom_30">
                                <div class="full graph_head">
                                    <div class="heading1 margin_0">
                                        <h2 class="text-dark">Ticket Properties</h2>
                                    </div>
                                </div>
                                <div class="full graph_head">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-dark">TICKET#</h5>
                                            <span class="pt-2 pb-3"><?php echo $ticket["ticket_num"]; ?></span>

                                        </div>

                                    </div>
                                    <div class="row pt-2 pb-2">
                                        <div class="col-4">
                                            <h5 class="text-dark">CREATED</h5>
                                            <span class="pt-2 pb-3"><?php echo $ticket["create_time"]; ?></span>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="text-dark">ASSIGNED BY</h5>
                                            <span class="pt-2 pb-3"><?php echo $othr->getAgents($ticket["owner"])["username"]; ?></span>

                                        </div>
                                        <div class="col-4">
                                            <h5 class="text-dark">VALIDITY</h5>
                                            <span class="pt-2 pb-3"><?php if((int)$ticket["valid"] == 1) echo "Valid"; else echo "Invalid"; ?></span>

                                        </div>

                                    </div>
                                    <div class="row pt-2 pb-2">
                                        <div class="col-4">
                                            <h5 class="text-dark">PRIORITY</h5>
                                            <span class="pt-2 pb-3"><?php echo $ticket["priority"]; ?></span>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="text-dark">QUEUE</h5>
                                            <span class="pt-2 pb-3"><?php echo $ticket["queueID"]; ?></span>

                                        </div>
                                        <div class="col-4">
                                            <h5 class="text-dark">STATUS</h5>
                                            <span class="pt-2 pb-3"><?php echo $ticket["state"]; ?></span>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div style="display: <?php if ($rsn=="zero") echo 'none'; else echo 'contents';?> ;">
                            <div class="col-md-12 col-lg-12">
                                <div class="dark_bg full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2 class="text-dark">Update Ticket Status</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_head">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="text-dark font-weight-bold">State</label>
                                                <select name="state" class="form-control form-control-md w-50">
                                                    <?php
                                                        if($ticket["state"] == "PENDING"){
                                                            echo '<option value="PENDING" selected>PENDING</option>
                                                    <option value="PROCESSING">PROCESSING</option>
                                                    <option value="CLOSED">CLOSED</option>';
                                                        }else if($ticket["state"] == "PROCESSING"){
                                                            echo '<option value="PENDING">PENDING</option>
                                                    <option value="PROCESSING" selected>PROCESSING</option>
                                                    <option value="CLOSED">CLOSED</option>';
                                                        }else{
                                                            echo '<option value="PENDING">PENDING</option>
                                                    <option value="PROCESSING">PROCESSING</option>
                                                    <option value="CLOSED" selected>CLOSED</option>';
                                                        }
                                                    ?>


                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark font-weight-bold">Validity</label>
                                                <select name="valid" class="form-control form-control-md w-50">
                                                    <?php
                                                    if ((int)$ticket['valid'] == 1)
                                                        echo '<option value="1" selected>Valid</option>
                                                    <option value="0">Invalid</option>';
                                                    else
                                                        echo '<option value="1">Valid</option>
                                                    <option value="0" selected>Invalid</option>'

                                                    ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="update_state"
                                                        class="btn btn-outline-danger m-1 w-25">
                                                    update
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="dark_bg full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2 class="text-dark">Send Notification to Customer</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_head">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="text-dark">From</label>
                                                <input type="email" name="from_user" class="form-control form-control-lg"
                                                       value="helpdesksupport@must.ac.ug" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark">To</label>
                                                <input type="text" name="to_customer" class="form-control form-control-lg"
                                                       value="<?php  ?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark">Subject</label>
                                                <input type="text" name="subject" class="form-control form-control-lg"
                                                       placeholder="Enter Subject" required>

                                            </div>
                                            <!--                                                <div class="form-group">-->
                                            <!--                                                    <label class="text-dark">Add Knowledge Base Article</label>-->
                                            <!--                                                    <select name="add_knowledge" class="form-control">-->
                                            <!--                                                        <option readonly disabled selected>Select</option>-->
                                            <!--                                                        --><?php
                                            //                                                        foreach ($others->getKnowledgeBase() as $item){
                                            //                                                            echo '<option value="'.$item['id'].'">'.$item['title'].'</option>';
                                            //
                                            //                                                        }
                                            //
                                            //                                                        ?>
                                            <!--                                                    </select>-->
                                            <!---->
                                            <!--                                                </div>-->
                                            <div class="form-group">
                                                <label class="text-dark">Body</label>
                                                <textarea class="form-control form-control-lg" name="body" cols="10"
                                                          rows="5"></textarea>

                                            </div>

                                            <div class="form-group text-right">
                                                <button type="submit" name="update_notify"
                                                        class="btn btn-outline-danger m-1 w-25">
                                                    Send
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer -->
                <div class="container-fluid">
                    <div class="footer">
                        <p>
                            Copyright © <?php echo Date("Y") . " "; ?>All rights reserved.<br><br>
                        </p>
                    </div>
                </div>
            </div>
            <!-- end dashboard inner -->
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="../../Assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="../../Assets/js/popper.min.js"></script>
<script src="../../Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- wow animation -->
<script src="../../Assets/js/animate.js"></script>
<!-- select country -->
<script src="../../Assets/js/bootstrap-select.js"></script>
<!-- owl carousel -->
<script src="../../Assets/js/owl.carousel.js"></script>
<!-- chart js -->
<script src="../../Assets/js/Chart.min.js"></script>
<script src="../../Assets/js/Chart.bundle.min.js"></script>
<script src="../../Assets/js/utils.js"></script>
<script src="../../Assets/js/analyser.js"></script>
<!-- nice scrollbar -->
<script src="../../Assets/js/perfect-scrollbar.min.js"></script>
<script>
    var ps = new PerfectScrollbar('#sidebar');
</script>
<!-- custom js -->
<script src="../../Assets/js/custom.js"></script>
<script src="../../Assets/js/chart_custom_style1.js"></script>
</body>
</html>