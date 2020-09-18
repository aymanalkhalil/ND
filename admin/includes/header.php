<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
}
if (isset($_GET['s'])) {
    unset($_SESSION['admin_id'], $_SESSION['admin_name']);
    header("location:login.php?s=true");
}
ini_set('upload_max_filesize', '120M');
ini_set('post_max_size', '120M');
?>


<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="bower_components/morris.js/morris.css"> -->

    <!-- jvectormap -->
    <!-- <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css"> -->

    <!-- Date Picker -->
    <!-- <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->

    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css"> -->
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="plugins/iCheck/all.css">


    <!-- Google Font -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<style>
    /* @font-face {
        font-family: "RB";
        src: url("../../assets/fonts/RB.ttf") format("truetype");
    } */

    * {
        font-family: "RB";
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>DS</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b> Dashboard</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">


                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <?php
                                $get_logged = mysqli_query($conn, "SELECT admin_name from admin where admin_id='{$_SESSION['admin_id']}'");
                                $row = mysqli_fetch_assoc($get_logged);
                                ?>
                                <span class="hidden-xs"><?php echo "Welcome "  . ucfirst($row['admin_name']) ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo "Welcome "  . ucfirst($row['admin_name']) ?>
                                        <!-- <small>Member since Nov. 2012</small> -->
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="index.php?s=1" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <?php
                        $get_logged = mysqli_query($conn, "SELECT admin_name from admin where admin_id='{$_SESSION['admin_id']}'");
                        $row = mysqli_fetch_assoc($get_logged)
                        ?>
                        <p><?php echo "Welcome "  . ucfirst($row['admin_name']) ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>

                    <?php
                    if ($_SESSION['is_super'] == '1') {

                    ?>
                        <li <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "add_admin" ? "class='active'"  : ""; ?>>
                            <a href="add_admin.php">
                                <i class="fa fa-user-plus"></i><span>Add Admin - اضافة ادمن </span>
                            </a>
                        </li>

                        <li <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "manage_sponsors" ? "class='active'"  : ""; ?>>
                            <a href="manage_sponsors.php">
                                <i class="fa fa-user-plus"></i> <span>Add Sponsors - اضافة الرعاة</span>

                            </a>
                        </li>
                        <li <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "manage_merchants" ? "class='active'"  : ""; ?>>
                            <a href="manage_merchants.php">
                                <i class="fa fa-user-plus"></i> <span>Add Merchants - اضافة التجار</span>
                            </a>
                        </li>
                        <li <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "manage_users" ? "class='active'"  : ""; ?>>
                            <a href="manage_users.php">
                                <i class="fa fa-user-plus"></i> <span>Add Users - اضافة مستخدمين</span>

                            </a>
                        </li>
                        <li <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "add_new_contest" ? "class='active'"  : ""; ?>>
                            <a href="add_new_contest.php">
                                <i class="fa fa-upload"></i> <span>Add Contest - اضافة مسابقة </span>
                            </a>
                        </li>
                        <li <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "view_users_contest" ? "class='active'"  : ""; ?>>
                            <a href="view_users_contest.php">
                                <i class="fa fa-upload"></i> <span> عرض أعمال المستخدمين </span>
                            </a>
                        </li>
                        <li <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "view_merchants_contest" ? "class='active'"  : ""; ?>>
                            <a href="view_merchants_contest.php">
                                <i class="fa fa-upload"></i> <span>عرض أعمال اصحاب المنتجات </span>
                            </a>
                        </li>
                        <li <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "view_sponsor_answer" ? "class='active'"  : ""; ?>>
                            <a href="view_sponsor_answer.php">
                                <i class="fa fa-upload"></i> <span>عرض اجابات شركاء النجاح </span>
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "manage_users" ? "class='active'"  : ""; ?>>
                            <a href="manage_users.php">
                                <i class="fa fa-user-plus"></i> <span>Add Users - اضافة مستخدمين</span>

                            </a>
                        </li>
                        <li <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "add_new_contest" ? "class='active'"  : ""; ?>>
                            <a href="add_new_contest.php">
                                <i class="fa fa-upload"></i><span>Add Contest - اضافة مسابقة </span>
                            </a>
                        </li>
                    <?php



                    }
                    ?>




                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>