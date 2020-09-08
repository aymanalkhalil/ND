<?php include_once('includes/header.php');


if (isset($_POST['register'])) {
  $desc = $_POST['desc'];
  $type = $_POST['type'];
  $address = $_POST['address'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobile = $_POST['mobile'];

  if (!empty($_POST['type'])) {
    if ($type == '1') {
      $check_email = "SELECT user_email from users where user_email='$email'";
      $result = mysqli_query($conn, $check_email);
      if (mysqli_num_rows($result) > 0) {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i> عذراً البريد الالكتروني مسجل لدينا</h4>
                </div>";
      } else {
        $insert = "INSERT INTO users(user_name,user_email,user_password,user_mobile,user_address,user_desc)VALUES
      ('$name','$email','$password','$mobile','$address','$desc')";
        $result = mysqli_query($conn, $insert);

        if ($result) {
          $success =
            " <div class='alert alert-success text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم تسجيل الحساب بنجاح!</h4>
                </div>
                 <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'register.php';
             }, 2000);</script>";
        } else {
          echo "error " . mysqli_error($conn);
        }
      }
    } elseif ($type == '2') {
      $check_email = "SELECT merchant_email from merchants where merchant_email='$email'";
      $result = mysqli_query($conn, $check_email);
      if (mysqli_num_rows($result) > 0) {

        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i> عذراً البريد الالكتروني مسجل لدينا</h4>
                </div>";
      } else {
        $insert = "INSERT INTO merchants(merchant_name,merchant_email,merchant_password,merchant_mobile,merchant_address,merchant_desc)VALUES
      ('$name','$email','$password','$mobile','$address','$desc')";
        $result = mysqli_query($conn, $insert);

        if ($result) {
          $success =
            " <div class='alert alert-success text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم تسجيل الحساب بنجاح!</h4>
                </div>
                 <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'register.php';
             }, 2000);</script>";
        } else {
          echo "error " . mysqli_error($conn);
        }
      }
    } elseif ($type == '3') {
      $check_email = "SELECT sponsor_email from sponsors where sponsor_email='$email'";
      $result = mysqli_query($conn, $check_email);
      if (mysqli_num_rows($result) > 0) {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i> عذراً البريد الالكتروني مسجل لدينا</h4>
                </div>";
      } else {
        $insert = "INSERT INTO sponsors(sponsor_name,sponsor_email,sponsor_password,sponsor_mobile,sponsor_address,sponsor_desc)VALUES
      ('$name','$email','$password','$mobile','$address','$desc')";
        $result = mysqli_query($conn, $insert);

        if ($result) {
          $success =
            " <div class='alert alert-success text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم تسجيل الحساب بنجاح!</h4>
                </div>
                 <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'register.php';
             }, 2000);</script>";
        } else {
          echo "خطأ " . mysqli_error($conn);
        }
      }
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
        <h1>تسجيل الان</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="text-dark" href="index.php">الرئيسية</a>
            </li>

            <li class="breadcrumb-item active text-success" aria-current="page">تسجيل الان</li>
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
            <h2 class="mt-3">تسجيل حساب جديد</h2>
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
                    <input type="text" name="name" value="<?php echo !empty($_POST['name']) ? $_POST['name'] : '' ?>" class="form-control" placeholder="اسم المستخدم" required="required">

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" name="email" value="<?php echo !empty($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control" placeholder="البريد الالكتروني" required="required">
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="password" name="password" value="<?php echo !empty($_POST['password']) ? $_POST['password'] : '' ?>" class="form-control" placeholder="كلمة السر" required="required">
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
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="tel" name="mobile" value="<?php echo !empty($_POST['mobile']) ? $_POST['mobile'] : '' ?>" class="form-control" placeholder="رقم الجوال" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <select required name='type' class="form-control">
                      <option disabled selected value=''>الرجاء اختيار نوع المستخدم </option>
                      <option value="1">مشارك</option>
                      <option value="2">مبادرات التجار والاسر المنتجة</option>
                      <option value="3">راعي</option>
                    </select>

                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">الرجاء كتابة نبذة او وصف للحساب</label>
                    <textarea name="desc" id="" class='form-control' cols="15" rows="5" required></textarea>

                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <button type='submit' name='register' class="btn btn-outline-success btn-block ">تسجيل الان !</button>
                  <span class="mt-4 d-block">لديك حساب مسبقاً؟ <a href="login.php" class='text-success'><i>سجل دخولك!</i></a></span>
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