<?php include_once('includes/header.php');
if (isset($_SESSION['merchant_id']) or isset($_SESSION['sponsor_id']) or isset($_SESSION['user_id']) or isset($_SESSION['voter_id'])) {
  echo "<script>window.location.href='index.php'</script>";
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $type = $_POST['type'];
  if ($type == 1) {
    $query = "SELECT * from users where user_email='$email' AND user_password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['user_name'] = $row['user_name'];
      echo "<script>window.location.href='index.php'</script>";
    } else {
      $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً هذا الحساب غير مسجل لدينا</h4>
                </div>";
    }
  } elseif ($type == 2) {
    $query = "SELECT * from merchants where merchant_email='$email' AND merchant_password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['merchant_id'] = $row['merchant_id'];
      $_SESSION['merchant_name'] = $row['merchant_name'];
      echo "<script>window.location.href='index.php'</script>";
    } else {

      $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً هذا الحساب غير مسجل لدينا</h4>
                </div>";
    }
  } elseif ($type == 3) {
    $query = "SELECT * from sponsors where sponsor_email='$email' AND sponsor_password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['sponsor_id'] = $row['sponsor_id'];
      $_SESSION['sponsor_name'] = $row['sponsor_name'];

      echo "<script>window.location.href='index.php'</script>";
    } else {
      $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً هذا الحساب غير مسجل لدينا</h4>
                </div>";
    }
  } elseif ($type == 4) {
    $query = "SELECT * from voters where v_email='$email' AND v_password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['voter_id'] = $row['v_id'];
      $_SESSION['voter_name'] = $row['v_name'];

      echo "<script>window.location.href='index.php'</script>";
    } else {
      $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً هذا الحساب غير مسجل لدينا</h4>
                </div>";
    }
  }
}
?>
<!--hero section start-->

<section class="position-relative">
  <div id="particles-js"></div>
  <div class="container">
    <div class="row  text-center">
      <div class="col">
        <h1>تسجيل الدخول</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="text-dark" href="index.php">الرئيسية</a>
            </li>

            <li class="breadcrumb-item active text-success" aria-current="page">تسجيل الدخول</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- / .row -->
  </div>
  <!-- / .container -->
</section>

<!--hero section end-->
<style>
  .position-absolute {
    position: relative !important;
  }
</style>

<!--body content start-->

<div class="page-content">

  <!--login start-->

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 col-12">
          <!-- <img class="img-fluid" src="assets/images/login.png" alt=""> -->
          <img class="img-fluid" src="assets/images/secondary.png" width='500px' alt="">

        </div>
        <div class="col-lg-5 col-12">
          <div>
            <h2 class="mb-3 text-center">تسجيل الدخول</h2>
            <form method="POST" action="">

              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني" required>

              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="كلمة السر" required>

              </div>

              <div class="form-group">
                <select required name='type' class="form-control">
                  <option disabled selected value=''>الرجاء اختيار نوع المستخدم </option>
                  <option value="1">مشارك</option>
                  <option value="2">مبادرات التجار والاسر المنتجة</option>
                  <option value="3">راعي</option>
                  <option value="4">مصوت</option>

                </select>

              </div>

              <button type='submit' name='login' class="btn btn-outline-success btn-block">تسجيل الدخول</button>
            </form>
            <div class="d-flex align-items-center text-center justify-content-center mt-4">
              <span class="text-muted mr-1">ليس لديك حساب ؟</span>
              <a href="register.php" class='text-success'>سجل الأن !</a>
            </div>

          </div>
          <?php
          if (isset($error)) {
            echo $error;
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <!--login end-->



  <?php include_once('includes/footer.php') ?>