<?php
session_start();
require "assets/controller/connection.php";
require "assets/controller/function.php";
if (empty($_SESSION['email'])) {

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Yayasan Pendidikan Telkom</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="vendor/fontawesome-free/css/._fontawesome.min.css" rel="stylesheet" type="text/css" />
        <link href="vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="vendor/bootstrap-css/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="vendor/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="vendor/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="vendor/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->

        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->

        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />

    </head>
    <!-- END HEAD -->

    <body class=" login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <img src="img/logo_ypt_copy.png" style="max-width:350px;" />
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" method="POST">
            <h3 class="form-title">Login to your account</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Masukkan username and password. </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" autofocus="" /> </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
            </div>
            <div class="form-group">
                <input name="login" type="submit" class="btn red btn-block" value="LOGIN">
            </div>

        </form>
        <!-- END LOGIN FORM -->

    </div>
    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <div class="copyright"> 2016 &copy; Yayasan Pendidikan Telkom. </div>
    <!-- END COPYRIGHT -->

    <!-- BEGIN CORE PLUGINS -->
    <script src="vendor/jquery.min.js" type="text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="vendor/js.cookie.min.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="vendor/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="vendor/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="vendor/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="vendor/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="vendor/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="vendor/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="js/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="js/login-4.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
    </body>

    </html>
    <?php
    $conn = conn();

    if (isset($_POST['login'])) {
        $qry = mysqli_prepare($conn, "SELECT * FROM user WHERE email_user = ? AND password_user = ?");

        mysqli_stmt_bind_param($qry, "ss", $_POST['email'], md5($_POST['password']));
        mysqli_stmt_execute($qry);
        mysqli_stmt_store_result($qry);

        $check = mysqli_stmt_num_rows($qry);

        if ($check > 0) {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            echo "<script>window.location.href='index.php';</script>";
        } else {
            toastMessageIntent("login.php", "Username Atau Password Salah");
        }
    }
} else {
    header("location: index.php");
}
?>
