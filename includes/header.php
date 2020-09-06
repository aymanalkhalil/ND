<?php
session_start();
include_once('includes/connection.php');
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="منصة اليوم الوطني السعودي ٩٠ , اليوم الوطني السعودي التسعون , مسابقات اليوم الوطني " />
    <meta name="description" content="منصة اليوم الوطني السعودي التسعون" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->


    <title><?php require_once('title.php') ?></title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="assets/images/primary/green.png" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
">
    <!-- inject css start -->
    <link href="assets/css/theme-plugin.css" rel="stylesheet" />
    <link href="assets/css/theme.min.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />


    <!-- inject css end -->

</head>


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
                            <a class="navbar-brand logo text-white h2 mb-0" href="index.php">

                                <!-- <span><img src="logo.jpeg" alt="" width="200px" ></span> -->
                                منصة اليوم الوطني <span class="text-light font-weight-bold">السعودي ٩٠</span>

                            </a>
                            <nav class="navbar navbar-expand-lg mr-auto">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item"> <a class="nav-link  active" href="index.php">الرئيسية</a>


                                        </li>
                                        <li class="nav-item"> <a class="nav-link  active" href="index.php">شركاء النجاح و الرعايات</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link  active" href="index.php">التخفيضات والعروض
                                            </a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link  active" href="subscriptions.php"> الاشتراكات
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item"> <a class="nav-link  active" href="index.php">الرئيسية</a>


                                        </li>
                                        <li class="nav-item"> <a class="nav-link  active" href="index.php">الرئيسية</a>


                                        </li> -->



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
                                                    <li><a class="dropdown-item" href="my-account.php">صفحتي الشخصية</a>
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
                                                    <li><a class="dropdown-item" href="my-account.php">صفحتي الشخصية</a>
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
                                                    <li><a class="dropdown-item" href="my-account.php">صفحتي الشخصية</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="logout.php?m=<?php echo $_SESSION['merchant_id'] ?>">تسجيل الخروج</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php

                                        }
                                        ?>
                                    </ul>
                                </div>
                            </nav>
                            <?php

                            ?>
                            <?php if (!isset($_SESSION['user_id']) && !isset($_SESSION['merchant_id']) && !isset($_SESSION['sponsor_id'])) { ?>

                                <a class="btn btn-light mr-8 d-none d-lg-block btn-color" href="register.php">تسجيل الان</a>

                            <?php } ?>
                        </div>
                        <!--menu end-->
                    </div>
                </div>
            </div>
        </header>

        <!--header end-->