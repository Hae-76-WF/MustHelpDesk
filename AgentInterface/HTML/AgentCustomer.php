<?php

require "../PAGE_LOGIC/LgCustomer.php";
session_start();
if (!isset($_SESSION["agent_names"]) || !isset($_SESSION["agent_id"])) {
    header("location: /AgentInterface/");
    exit();
}

$customer = new LgCustomer();
if (isset($_POST['submit'])) {
    if ($customer->addCustomer()) header("location: AgentDashboard.php"); else
        echo '<script>alert("Failed to Add Customer")</script>';
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
    <title>Customer : MUST Help Desk</title>
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
                                <h2 class="fa fa-user"> Customer | <span class="btn btn-success">Add Customer</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <form method="POST" class="form-group">
                        <div class="row column1">
                            <div class="col-md-12 col-lg-12">
                                <div class="dark_bg full margin_bottom_30">
                                    <!--                                    <div class="full graph_head">-->
                                    <!--                                        <div class="heading1 margin_0">-->
                                    <!--                                            <h2 class="text-dark">Customer Information</h2>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="full graph_head">
                                                <h4 class="pt-1 pb-1 text-dark">Customer Information</h4>
                                                <div class="form-group">
                                                    <label class="text-dark">Customer (company or authority's full
                                                        names)</label>
                                                    <input type="text" name="customerName"
                                                           class="form-control form-control-lg"
                                                           placeholder="Customer Names" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-dark">Customer ID(company or authority's unique
                                                        name)</label>
                                                    <input type="text" name="customerID"
                                                           class="form-control form-control-lg"
                                                           placeholder="Unique CustomerID or name" required>

                                                </div>
                                                <h4 class="text-dark pt-1 pb-1">Address</h4>
                                                <div class="form-group">
                                                    <label class="text-dark">Street</label>
                                                    <input type="text" name="street"
                                                           class="form-control form-control-lg" placeholder="" required>

                                                </div>
                                                <div class="form-group">
                                                    <label class="text-dark">zip</label>
                                                    <input type="text" name="zip" class="form-control form-control-lg"
                                                           placeholder="" required>

                                                </div>
                                                <div class="form-group">
                                                    <label class="text-dark">City</label>
                                                    <input type="text" name="city" class="form-control form-control-lg"
                                                           placeholder="" required>

                                                </div>
                                                <div class="form-group">
                                                    <label class="text-dark">Country</label>
                                                    <input type="text" name="country"
                                                           class="form-control form-control-lg" placeholder="" required>

                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="full graph_head">
                                                <h4 class="pt-1 pb-1 text-dark">Miscellaneous</h4>
                                                <div class="form-group">
                                                    <label class="text-dark">URL</label>
                                                    <input type="text" name="url" class="form-control form-control-lg"
                                                           placeholder="https://" required>

                                                </div>
                                                <div class="form-group">
                                                    <label class="text-dark">Comment</label>
                                                    <input type="text" name="comment"
                                                           class="form-control form-control-lg"
                                                           placeholder="" required>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row pt-2 pb-2">
                                        <div class="col-12 text-right">
                                            <button type="submit" name="submit" class="btn btn-dark w-25 m-2">Create
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>

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