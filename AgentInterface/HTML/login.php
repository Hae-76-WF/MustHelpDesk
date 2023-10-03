<?php
//include("../PAGE_LOGIC/Accounts.php");
session_start();
if (isset($_SESSION['agent_id']) || isset($_SESSION['agent_email'])) {
    header("location: HTML/AgentDashboard.php");
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../Assets/images/logo.png" type="image/png"/>
    <title>Agent : Must Help Desk</title>
    <!-- <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css"> -->
    <?php
    include("linkers/header.php"); ?>

</head>
<body>

<div class="container" style="font-family: Georgia, 'Times New Roman', Times, serif;">
    <div class="row justify-content-center m-5 ">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card w-50 text-center mb-auto mr-auto ml-auto" style="margin-top: 15%">
                <div class="card-header">
                    <div class="card-title">
                        <div class="logo">
                            <img src="../Assets/images/logo.png" alt="Logo" style="height: 20%; width: 20%">
                        </div>
                        <div>
                            <h4 class="text-dark">Login</h4>
                            <p>Please enter your credentials below</p>
                            <p>
                                <?php if (isset($_SESSION["login_status"])) {
                                    if ($_SESSION['login_status'] == 'invalid') {
                                        echo '<span class="text-danger">Invalid Login Details!</span>';
                                    }
                                } ?>
                            </p>
                        </div>

                    </div>
                    <div class="card-body">
                        <form method="POST" action="/AgentInterface/linkers/login.php">
                            <div class="form-group">
                                <input class="form-control form-control-sm" type="email" name="email"
                                       placeholder="Email" required>

                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-sm" type="password" name="password"
                                       placeholder="Password" required>

                            </div class="form-group">
                            <div>
                                <button class="btn btn-dark" type="submit" name="agent_login" style="width: 70%;">
                                    Login
                                </button>
                                <br>

                            </div>
                        </form>
                        <a href="#" class="nav-link text-primary">Forgot password?</a>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("linkers/footer.php") ?>
<!-- <script src="../Assets/bootstrap/js/bootstrap.min.js"></script> -->
<style>

</style>
</body>
</html>'

