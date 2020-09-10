<?php include_once('includes/header.php');

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_email = mysqli_query($conn, "SELECT v_email from voters where v_email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i> عذراً البريد الالكتروني مسجل لدينا</h4>
                </div>";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO voters(v_name,v_email,v_password)VALUES ('$name','$email','$password')");

        if ($insert) {
            $success =
                "<div class='alert alert-success text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم تسجيل الحساب بنجاح!</h4>
                </div>
                 <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'voter_register.php';
             }, 2000);</script>";
        } else {
            $error = "<div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ الرجاء المحاولة لاحقاً</h4>
                </div>";
        }
    }
}


?>





<!--hero section start-->
<style>
    .position-absolute {
        position: relative !important;
    }
</style>
<section class="position-relative">
    <div id="particles-js"></div>
    <div class="container">
        <div class="row  text-center">
            <div class="col">
                <h1>تسجيل حساب للتصويت </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a class="text-dark" href="index.php">الرئيسية</a>
                        </li>

                        <li class="breadcrumb-item active text-success" aria-current="page">تسجيل حساب للتصويت</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- / .row -->
    </div>
    <!-- / .container -->
</section>
<?php

if (isset($error)) {
    echo $error;
}

if (isset($success)) {
    echo $success;
}

?>


<div class="page-content">
    <!--login start-->
    <section class="register">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-md-12">
                    <div class="mb-6"> <span class="badge badge-success-soft p-2">
                            <i class="la la-exclamation ic-3x rotation"></i>
                        </span>
                        <h2 class="mt-3">تسجيل حساب للتصويت</h2>
                        <!-- <p class="lead">We use the latest technologies it voluptatem accusantium doloremque laudantium, totam rem aperiam.</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                    <div class="register-form text-center">
                        <form method="POST" action="">
                            <div class="messages"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="اسم المستخدم" required="required" autocomplete="off">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="العمر" required="required" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id='email' class="form-control" placeholder="البريد الالكتروني" required="required" autocomplete="off">
                                        <div class="help-block with-errors email"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id='c_email' class="form-control" placeholder=" اعادة كتابة البريد الالكتروني" required="required" autocomplete="off">
                                        <div class="help-block with-errors email"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" id='password' name="password" class="form-control" placeholder="كلمة السر" required="required">
                                        <div class="help-block with-errors pass"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" id='c_password' class="form-control" placeholder="اعادة كتابة كلمة السر" required="required">
                                        <div class="help-block with-errors pass"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select required name='address' class="form-control">
                                            <option disabled selected value=''>اختر المنطقة</option>
                                            <option value="الرياض"> الرياض</option>
                                            <option value="مكة المكرمة">مكة المكرمة</option>
                                            <option value="جدة">جدة</option>
                                            <option value=" الطائف">الطائف </option>
                                            <option value="المدينة المنورة"> المدينة المنورة</option>
                                            <option value="ينبع ">ينبع </option>
                                            <option value="القصيم">القصيم</option>
                                            <option value="الشرقية">الشرقية</option>
                                            <option value="عسير">عسير</option>
                                            <option value="ابها">ابها</option>
                                            <option value="تبوك">تبوك</option>
                                            <option value="حائل">حائل</option>
                                            <option value="الحدود الشمالية">الحدود الشمالية</option>
                                            <option value="عرعر">عرعر</option>
                                            <option value="جازان">جازان</option>
                                            <option value="نجران">نجران</option>
                                            <option value="الباحة">الباحة</option>
                                            <option value="الجوف">الجوف</option>
                                            <option value="سكاكا">سكاكا</option>
                                        </select>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select required name='type' class="form-control">
                                            <option disabled selected value=''>الرجاء اختيار الجنس </option>
                                            <option value="1">ذكر</option>
                                            <option value="2"> أنثى</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="tel" name="mobile" class="form-control" placeholder="رقم الجوال" required autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type='submit' id='reg' name='register' class="btn btn-outline-success btn-block ">تسجيل الان !</button>
                                    <!-- <span class="mt-4 d-block">لديك حساب مسبقاً؟ <a href="login.php" class='text-success'><i>سجل دخولك!</i></a></span> -->
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--login end-->
</div>
<!--body content end-->
<?php include_once('includes/footer.php') ?>

<script>
    $(document).ready(function() {

        $('#reg').click(function() {

            if ($("#password").val() != $('#c_password').val()) {
                $('.pass').html('عذراً كلمة السر غير متطابقة ');
            }
            if ($("#email").val() != $('#c_email').val()) {
                $('.email').html('عذراً البريد الالكتروني غير متطابق');
            }
        });


    });
</script>