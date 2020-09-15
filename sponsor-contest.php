<?php include_once('includes/header.php');

if (isset($_SESSION['sponsor_id'])) {
    $check_active = mysqli_query($conn, "SELECT active from sponsors where sponsor_id='{$_SESSION['sponsor_id']}'");
    $result = mysqli_fetch_assoc($check_active);
    if ($result['active'] == 0) {
        echo "<script>window.location.href='sponsors-feed.php'</script>";
    }
}

if (isset($_POST['answer'])) {
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];

    $ins_answer = mysqli_query($conn, "INSERT INTO sponsor_contest(sponsor_id,question1,question2,question3,question4,question5)
    VALUES('{$_SESSION['sponsor_id']}','$q1','$q2','$q3','$q4','$q5')");

    if ($ins_answer) {
        $success =
            "<div class='alert alert-success text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم إرسال إجاباتك بنجاح!</h4>
                </div>
                 <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'sponsor-contest.php';
             }, 2000);</script>";
    } else {
        $error = "<div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ الرجاء المحاولة لاحقاً</h4>
                </div>";
    }
}

?>


<section class="position-relative">
    <div id="particles-js"></div>
    <div class="container">
        <div class="row  text-center">
            <div class="col">
                <h1>مسابقات شركاء النجاح </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a class="text-dark" href="index.php">الرئيسية</a>
                        </li>
                        <!-- <li class="breadcrumb-item " aria-current="page"> شركاء النجاح والرعايات الذهبية</li> -->

                        <li class="breadcrumb-item active "><a class=" text-success" href="sponsor-contests.php">مسابقات شركاء النجاح </a>
                        </li>

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
<style>
    .position-absolute {
        position: relative !important;
    }
</style>
<div class="page-content">
    <!--login start-->
    <section class="register">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-md-12">
                    <div class="mb-6"> <span class="badge badge-success-soft p-2 bg-success">
                            <img src="assets/images/gif/KSA-flag.gif" alt="" srcset="">
                        </span>
                        <!-- <h2 class="mt-3">تسجيل حساب للتصويت</h2> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                    <div class="register-form text-center">
                        <form method="POST" action="">
                            <div class="messages"></div>
                            <?php
                            if (isset($_SESSION['sponsor_id'])) {
                                $get_answers = mysqli_query($conn, "SELECT * FROM sponsor_contest where sponsor_id='{$_SESSION['sponsor_id']}'");
                                $row = mysqli_fetch_assoc($get_answers);
                            }else{
                                echo "<script>window.location.href='sponsors-feed.php'</script>";
                            }
                            ?>
                            <div class="row text-dark">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">١. هل ترى أن دعم الإبدآع هو من أهم مهام المجتمع ؟</label>
                                        <textarea name="q1" class='form-control' cols="5" dir="rtl" rows="5" required <?php echo !empty($row['question1']) ? 'readonly' : "" ?>><?php echo !empty($row['question1']) ? $row['question1'] : ""  ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">٢.ماهي أشكال الدعم التي من الممكن أن تساهم في رفع مستوى الابداع للموهوبين ؟
                                        </label>

                                        <textarea name="q2" class='form-control' cols="5" dir="rtl" rows="5" required <?php echo !empty($row['question2']) ? 'readonly' : "" ?>><?php echo !empty($row['question2']) ? $row['question2'] : ""  ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">٣. هل تعتقد بأن الدعم الذي يتلقاه الموهوب كافي لنهوضه بموهبته؟
                                        </label>

                                        <textarea name="q3" class='form-control' cols="5" dir="rtl" rows="5" required <?php echo !empty($row['question3']) ? 'readonly' : "" ?>><?php echo !empty($row['question3']) ? $row['question3'] : ""  ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">٤. هل تؤمن بأهمية دور الموهوبين في دفع عجلة التنمية الفنية و الثقافيه و الادبية ؟
                                        </label>

                                        <textarea name="q4" class='form-control' cols="5" dir="rtl" rows="5" required <?php echo !empty($row['question4']) ? 'readonly' : "" ?>><?php echo !empty($row['question4']) ? $row['question4'] : ""  ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">٥. هل سررت بما رأيت من إبداع موهوبي المملكة بمناسبة اليوم الوطني السعودي ٩٠؟</label>

                                        <textarea name="q5" class='form-control' cols="5" dir="rtl" rows="5" required <?php echo !empty($row['question5']) ? 'readonly' : "" ?>><?php echo !empty($row['question5']) ? $row['question5'] : ""  ?></textarea>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <?php if (mysqli_num_rows($get_answers) > 0) { ?>
                                        <button type='button' class="btn btn-outline-danger btn-block ">لقد تم إرسال اجاباتك بالفعل!</button>

                                    <?php } else { ?>
                                        <button type='submit' name='answer' class="btn btn-outline-success btn-block ">ارفاق الاجابات !</button>

                                    <?php } ?>


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