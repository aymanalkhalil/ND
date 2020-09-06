<?php
session_start();
require_once('includes/connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * from admin WHERE admin_email='$email' AND admin_password='$password'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $admin_info = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $admin_info['admin_id'];
        $_SESSION['admin_name'] = $admin_info['admin_name'];
        $_SESSION['is_super'] = $admin_info['is_super'];
            header('location:index.php');

    } else {
        $error = " <div class='alert alert-danger alert-dismissible text-center'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>No Admin Found !! </h4>
                </div>
               ";
    }
}
if (isset($_GET['s'])) {
    $error =
        " <div class='alert alert-success alert-dismissible text-center'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i>Logged Out Successfully ! </h4>
                </div>
               <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'login.php';
             }, 1500);</script>";
}

?>

<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Apr 2020 22:45:15 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">



    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="email" name='email' class="form-control" placeholder="Email" autocomplete="off" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name='password' class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <?php
                if (isset($error)) {
                    echo $error;
                }

                ?>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" name='login' class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->

                </div>
            </form>


            <!-- /.social-auth-links -->

        </div>
        <!-- /.login-box-body -->

    </div>

    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Apr 2020 22:45:16 GMT -->

</html>