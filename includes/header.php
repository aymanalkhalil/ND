<?php
session_start();
include_once('includes/connection.php');
// session_destroy();
ini_set('upload_max_filesize', '120M');
ini_set('post_max_size', '120M');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content=" احتفالات اليوم الوطني السعودي التسعون, منصة اليوم الوطني السعودي ٩٠ , اليوم الوطني السعودي التسعون , مسابقات اليوم الوطني التسعون" />
    <meta name="description" content=" منصة اليوم الوطني السعودي ٩٠" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title><?php require_once('title.php') ?></title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="assets/images/primary/green.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- inject css start -->
    <link href="assets/css/theme-plugin.css" rel="stylesheet" />
    <link href="assets/css/theme.min.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- inject css end -->
</head>
<style>
    .position-absolute {
        position: absolute !important;
    }
</style>

<body>
    <!-- page wrapper start -->
    <div class="page-wrapper">
        <!-- preloader start -->
        <div id="ht-preloader">
            <div class="loader clear-loader">
                <span></span>
                <p><img src="assets/images/primary/green.png" width="250px" alt="" srcset=""></p>
            </div>
        </div>
        <!-- preloader end -->
        <!--header start-->
        <header class="site-header navbar-dark">
            <div id="header-wrap" class="position-absolute w-100 z-index-1">
                <div class="container">
                    <div class="row">
                        <!--menu start-->
                        <div class="col d-flex align-items-center justify-content-between">
                            <a class="navbar-brand logo text-white h2 mb-0 bs" href="index.php" style="max-width:70%">
                                <span><img src="assets/images/primary/nav-gray-logo.png" style='width: 300px;height: 130px;'></span>

                            </a>
                            <?php $style = "style='color:#f94f15'"; ?>

                            <nav class="navbar navbar-expand-lg mr-auto">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link  " href="index.php" <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "index" ? $style  : ""; ?>>الرئيسية</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link " <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "national-feeds" ? $style  : ""; ?> href="national-feeds.php"> المشاركات الوطنية
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item"> <a class="nav-link" href="sponsors-feed.php" <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "sponsors-feed" ? $style  : ""; ?>>شركاء النجاح و الرعايات</a>
                                        </li> -->

                                        <li class="nav-item"> <a class="nav-link" href="merchants-feed.php" <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "merchants-feed" ? $style  : ""; ?>>اصحاب المنتجات التجارية
                                            </a>
                                        </li>


                                        <!-- <li class="nav-item"> <a class="nav-link " <?php echo (basename($_SERVER['PHP_SELF'], ".php")) == "subscriptions" ? $style  : ""; ?> href="subscriptions.php"> الاشتراكات
                                            </a>
                                        </li> -->
                                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                                شركاء النجاح و الرعايات
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="gold-feeds.php">شركاء النجاح والرعايات الذهبية</a>
                                                </li>
                                                <li><a class="dropdown-item" href="sponsors-feed.php">شركاء النجاح والرعايات الفضية</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                        if (isset($_SESSION['user_id'])) {
                                        ?>
                                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                                    <?php
                                                    echo "مرحباً " . $_SESSION['user_name'];
                                                    ?>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item active" href="my-account.php">صفحتي الشخصية</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="logout.php?u=<?php echo $_SESSION['user_id'] ?>">تسجيل الخروج</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php
                                        } elseif (isset($_SESSION['sponsor_id'])) {
                                        ?>
                                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                                    <?php
                                                    echo "مرحباً " . $_SESSION['sponsor_name'];
                                                    ?>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item active" href="my-account.php">صفحتي الشخصية</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="logout.php?s=<?php echo $_SESSION['sponsor_id'] ?>">تسجيل الخروج</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php
                                        } elseif (isset($_SESSION['merchant_id'])) {
                                        ?>
                                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                                    <?php
                                                    echo "مرحباً " . $_SESSION['merchant_name'];
                                                    ?>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item active" href="my-account.php">صفحتي الشخصية</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="logout.php?m=<?php echo $_SESSION['merchant_id'] ?>">تسجيل الخروج</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php
                                        } elseif (isset($_SESSION['voter_id'])) {
                                        ?>
                                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                                    <?php
                                                    echo "مرحباً " . $_SESSION['voter_name'];
                                                    ?>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="logout.php?v=<?php echo $_SESSION['voter_id'] ?>">تسجيل الخروج</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </nav>
                            <?php if (!isset($_SESSION['user_id']) && !isset($_SESSION['merchant_id']) && !isset($_SESSION['sponsor_id']) && !isset($_SESSION['voter_id'])) { ?>
                                <a class="btn btn-light mr-8 d-none d-lg-block btn-color" href="register.php">تسجيل الان</a>
                            <?php } ?>
                        </div>
                        <!--menu end-->
                    </div>
                </div>
            </div>
        </header>
        <!--header end-->