<?php
require "../PAGE_LOGIC/LgKnowledgeBase.php";
session_start();
if (!isset($_SESSION["agent_names"]) || !isset($_SESSION["agent_id"])) {
    header("location: /AgentInterface/");
    exit();
}

$knowledge = new LgKnowledgeBase();
$knowCat = $knowledge->getKnowledgeCategory();
$content = $knowledge->getKnowledgeBaseContent();
$knwBase = $knowledge->getKnowledgeBase();

if (isset($_POST["submit"])) {
    $sts = $knowledge->addKnowledgeBase();
    if ($sts) echo '<script>alert("KnowledgeBase Added Successfully")</script>'; else '<script>alert("Failed to add KnowledgeBase!")</script>';
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
    <title>Knowledge Base : MUST Help Desk</title>
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
                                <h2 class="fa fa-book"> Knowledge Base|</h2>
                                <button type="button" class="btn btn-dark float-right" data-toggle="modal"
                                        data-target="#addKnowledge"><span class="">Create Knowledge Base</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <div class="rounded border border-white w-100 h-100">
                                <div id="anchor">
                                    <h4 class="text-primary pt-5 text-center">Please select from the listing on your left</h4>
                                </div>

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="title text-dark">
                                        <p>Knowledge Base Categories</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <?php
                                        foreach ($knowCat as $categ) {
                                            echo '
                                            <li class="list-group-item">
                                                <p class="font-weight-bold text-dark">' . $categ["name"] . '</p>';
                                            foreach ($knwBase as $knw) {
                                                if ((int)$knw['categoryID'] == (int)$categ['category_id']) {
                                                    echo '                                           
                                                        <ul class="list-group">
                                                            <li class="list-unstyled"><a href="#" onclick="getKnowledgeBase('.$knw['id'].');" class="nav nav-link text-success">>' . $knw["title"] . '</a></li>
                                                           
                                                        </ul>';
                                                }
                                            }


                                            echo '</li>';
                                        }

                                        ?>


                                    </ul>


                                </div>

                            </div>

                        </div>


                    </div>


                </div>

                <!--Add KnowledgeBase Modal -->
                <div class="modal fade" id="addKnowledge" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #12617c">
                                <h4 class="modal-title text-white" id="exampleModalLabel">Add a KnowledgeBase</h4>
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal"
                                        aria-label="Close">X
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" class="form-group" enctype="multipart/form-data">
                                    <div class="row column1">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="dark_bg full margin_bottom_30">
                                                <div class="full graph_head">
                                                    <div class="heading1 margin_0">
                                                        <h2 class="text-dark">Properties</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <div class="full graph_head">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="text-dark">Title</label>
                                                                        <input type="text" name="title"
                                                                               class="form-control form-control-lg"
                                                                               placeholder="" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="text-dark">State</label>
                                                                        <select name="state"
                                                                                class="form-control form-control-lg"
                                                                                required>
                                                                            <option value="AGENT" selected>
                                                                                Internal(Agent)
                                                                            </option>
                                                                            <option value="CUSTOMER">
                                                                                External(Customer)
                                                                            </option>
                                                                            <option value="ALL">Public(All)</option>
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="text-dark">Keywords</label>
                                                                        <input type="text" name="keywords"
                                                                               class="form-control form-control-lg"
                                                                               placeholder="" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="text-dark">Validity</label>
                                                                        <select type="text" name="valid"
                                                                                class="form-control form-control-lg">
                                                                            <option value="1" selected>Valid</option>
                                                                            <option value="0">Invalid</option>
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="text-dark">Category</label>
                                                                        <select name="category"
                                                                                class="form-control form-control-lg">
                                                                            <option disabled readonly selected>Please
                                                                                Select Category
                                                                            </option>
                                                                            <?php
                                                                            foreach ($knowCat as $item) {
                                                                                echo '<option value="' . $item['category_id'] . '">' . $item['name'] . '</option>';
                                                                            }


                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group collapse">
                                                                        <label class="text-dark">Attachment</label>
                                                                        <!--                                                                        <input type="text" name="attachment"-->
                                                                        <!--                                                                               value="none"-->
                                                                        <!--                                                                               class="form-control"-->
                                                                        <!--                                                                               required>-->
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <fieldset class="row">
                                                                <legend class="col-12 ">
                                                                    <div>
                                                                        <section
                                                                                class="text-dark font-weight-bold mt-3 mb-3">
                                                                            Article Content
                                                                        </section>
                                                                    </div>
                                                                </legend>

                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="text-dark p-1 font-weight-bold">Subtitle</label>
                                                                        <input type="text" class="form-control"
                                                                               name="subtitle" maxlength="200" required>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="text-dark p-1 font-weight-bold">Content</label>
                                                                        <textarea class="form-control" name="content"
                                                                                  rows="10" cols="5"
                                                                                  required></textarea>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="text-dark p-1 font-weight-bold">Upload
                                                                            any Images</label>
                                                                        <input type="file" class="form-control-file"
                                                                               name="attachment" id="attachment">
                                                                    </div>
                                                                </div>

                                                            </fieldset>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pt-2 pb-2">
                                                    <div class="col-12 text-right">
                                                        <button type="submit" name="submit"
                                                                class="btn btn-dark w-25 m-2">Create
                                                        </button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </form>

                            </div>
                            <div class="modal-footer" style="background-color: #12617c">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
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
<script>
    function getKnowledgeBase(id) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                //var data = JSON.parse(this.responseText);
                document.getElementById("anchor").innerHTML = this.responseText;
            }
        };
        xhr.open("GET", "../PAGE_LOGIC/DisplayArticle.php?id="+id, true);
        xhr.send();
    }

</script>
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