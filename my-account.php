<?php include_once('includes/header.php');

////////////////////////// UPLOAD SHARES(AUDIO,VIDEO,SOUNDS) FOR THE 3 USERS TO TABLE UPLOADS START ////////////////////////////////
if (isset($_POST['add'])) {
  $allowed_types = array('mp3', 'mp4', 'png', 'jpeg', 'jpg', 'svg', '3gp', 'mov');
  if ($_POST['type'] == 'users') {
    $path = 'assets/upload_users/';
    $file_name = $_FILES['upload']['name'];
    $type = explode('.', $file_name);
    if (in_array(end($type), $allowed_types)) {
      $tmp_name = $_FILES['upload']['tmp_name'];
      $file_ext = time() . strtolower($file_name);
      move_uploaded_file($tmp_name, $path . $file_ext);
      if (!empty($_POST['message'])) {
        $message = $_POST['message'];
        $query_u = "INSERT INTO uploads_users(user_id,upload_user_file,upload_user_description)
        VALUES ('{$_SESSION['user_id']}','$file_ext','$message')";
      } else {
        $path = 'assets/upload_users/';
        $file_name = $_FILES['upload']['name'];
        $tmp_name = $_FILES['upload']['tmp_name'];
        $file_ext = time() . strtolower($file_name);
        move_uploaded_file($tmp_name, $path . $file_ext);
        $query_u = "INSERT INTO uploads_users(user_id,upload_user_file)VALUES('{$_SESSION['user_id']}','$file_ext')";
      }
      $result_upload_u = mysqli_query($conn, $query_u);
      if ($result_upload_u) {
        $success =
          " <div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم ارفاق المشاركة بنجاح! </h4>
                </div>
             <script type='text/Javascript'>
         window.setTimeout(function() {
         window.location.href = 'my-account.php';
         }, 2000);</script>";
      } else {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
                </div>";
      }
    } else {
      $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً الملف المرفق غير مسموح يرجى ارفاق الصيغة المناسبة!</h4>
                </div>";
    }
  } elseif ($_POST['type'] == 'merchants') {

    $path = 'assets/upload_merchants/';
    $file_name = $_FILES['upload']['name'];
    $type = explode('.', $file_name);
    if (in_array(end($type), $allowed_types)) {
      $tmp_name = $_FILES['upload']['tmp_name'];
      $file_ext = time() . strtolower($file_name);
      move_uploaded_file($tmp_name, $path . $file_ext);

      if (!empty($_POST['message'])) {
        $message = $_POST['message'];
        $query_m = "INSERT INTO uploads_merchants(merchant_id,upload_merchant_file,upload_merchant_description)VALUES('{$_SESSION['merchant_id']}','$file_ext','$message')";
      } else {
        $path = 'assets/upload_merchants/';
        $file_name = $_FILES['upload']['name'];
        $tmp_name = $_FILES['upload']['tmp_name'];
        $file_ext = time() . strtolower($file_name);
        move_uploaded_file($tmp_name, $path . $file_ext);
        $query_m = "INSERT INTO uploads_merchants(merchant_id,upload_merchant_file)VALUES('{$_SESSION['merchant_id']}','$file_ext')";
      }
      $result_upload_m = mysqli_query($conn, $query_m);
      if ($result_upload_m) {
        $success =
          " <div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم ارفاق المشاركة بنجاح! </h4>
              </div>
               <script type='text/Javascript'>
           window.setTimeout(function() {
           window.location.href = 'my-account.php';
           }, 2000);</script>";
      } else {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
      }
    } else {
      $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً الملف المرفق غير مسموح يرجى ارفاق الصيغة المناسبة!</h4>
                </div>";
    }
  } elseif ($_POST['type'] == 'sponsors') {
    $path = 'assets/upload_sponsors/';
    $file_name = $_FILES['upload']['name'];
    $type = explode('.', $file_name);
    if (in_array(end($type), $allowed_types)) {
      $tmp_name = $_FILES['upload']['tmp_name'];
      $file_ext = time() . strtolower($file_name);
      move_uploaded_file($tmp_name, $path . $file_ext);

      if (!empty($_POST['message'])) {
        $message = $_POST['message'];
        $query_s = "INSERT INTO uploads_sponsors(sponsor_id,upload_sponsor_file,upload_sponsor_description)VALUES('{$_SESSION['sponsor_id']}','$file_ext','$message')";
      } else {
        $path = 'assets/upload_sponsors/';
        $file_name = $_FILES['upload']['name'];
        $tmp_name = $_FILES['upload']['tmp_name'];
        $file_ext = time() . strtolower($file_name);
        move_uploaded_file($tmp_name, $path . $file_ext);
        $query_s = "INSERT INTO uploads_sponsors(sponsor_id,upload_sponsor_file)VALUES('{$_SESSION['sponsor_id']}','$file_ext')";
      }
      $result_upload_s = mysqli_query($conn, $query_s);
      if ($result_upload_s) {
        $success =
          " <div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم ارفاق المشاركة بنجاح! </h4>
              </div>
               <script type='text/Javascript'>
           window.setTimeout(function() {
           window.location.href = 'my-account.php';
           }, 2000);</script>";
      } else {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
      }
    } else {
      $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً الملف المرفق غير مسموح يرجى ارفاق الصيغة المناسبة!</h4>
                </div>";
    }
  }
}
if (isset($_GET['s'])) {
  $s
    = "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم حذف المشاركة بنجاح! </h4>
              </div>
              <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'my-account.php';
                       }, 2000);</script>";
}
////////////////////////// UPLOAD SHARES(AUDIO,VIDEO,SOUNDS) FOR THE 3 USERS TO TABLE UPLOADS ENDS ////////////////////////////////




////////////////////////////// UPDATE Account DESCRIPTION FOR MERCHANTS & SPONSORS & USERS START /////////////////////////////

if (isset($_POST['edit'])) {
  if ($_POST['type_user'] == 'sponsor') {
    $desc = $_POST['change_desc'];
    $sponsor_id = $_POST['sponsor_id'];
    $update = "UPDATE sponsors SET sponsor_desc='$desc' WHERE sponsor_id='$sponsor_id'";
  } elseif ($_POST['type_user'] == 'merchant') {
    $desc = $_POST['change_desc'];
    $merchant_id = $_POST['merchant_id'];
    $update = "UPDATE merchants SET merchant_desc='$desc' WHERE merchant_id='$merchant_id'";
  } elseif ($_POST['type_user'] == 'user') {
    $desc = $_POST['change_desc'];
    $user_id = $_POST['user_id'];
    $update = "UPDATE users SET user_desc='$desc' WHERE user_id='$user_id'";
  }
  $res_update = mysqli_query($conn, $update);
  if ($res_update) {
    $success
      = "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل وصف الحساب بنجاح! </h4>
              </div>
              <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'my-account.php';
                       }, 2000);</script>";
  } else {

    $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
  }
}
////////////////////////////// UPDATE Account DESCRIPTION FOR MERCHANTS & SPONSORS & USERS END ////////////////////////////////////////


/////////////////////////////////////////////////// UPLOAD IMAGE FOR MERCHANTS & SPONSORS START ///////////////////////////////////////////
if (isset($_POST['upload_image'])) {
  if ($_POST['type'] == 'merchant') {
    $path = 'assets/merchants_logo/';
    $check_old = mysqli_query($conn, "SELECT merchant_image from merchants where merchant_id='{$_SESSION['merchant_id']}'");
    if (mysqli_num_rows($check_old) > 0) {
      $get_image = mysqli_fetch_assoc($check_old);
      if (file_exists($path . $get_image['merchant_image'])) {
        @unlink($path . $get_image['merchant_image']);
      }
    }
    $file_name = strtolower($_FILES['merchant_image']['name']);
    $allowed_types = array('png', 'jpeg', 'jpg', 'svg');
    $type = explode('.', $file_name);
    if (in_array(end($type), $allowed_types)) {
      $tmp_name = $_FILES['merchant_image']['tmp_name'];
      $file_extension = time() . strtolower($file_name);
      move_uploaded_file($tmp_name, $path . $file_extension);

      $upload = mysqli_query($conn, "UPDATE merchants SET merchant_image='$file_extension' WHERE merchant_id='{$_SESSION['merchant_id']}'");
      if ($upload) {
        $success
          = "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم رفع شعار التاجر بنجاح! </h4>
              </div>
              <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'my-account.php';
                       }, 2000);</script>";
      } else {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
      }
    } else {
      $error = "<div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً الملف المرفق غير مسموح يرجى ارفاق الصيغة المناسبة!</h4>
                </div>";
    }
  } elseif ($_POST['type'] == 'sponsors') {
    $path = 'assets/sponsors_logo/';
    $check_old = mysqli_query($conn, "SELECT sponsor_image from sponsors where sponsor_id='{$_SESSION['sponsor_id']}'");
    if (mysqli_num_rows($check_old) > 0) {
      $get_image = mysqli_fetch_assoc($check_old);
      if (file_exists($path . $get_image['sponsor_image'])) {
        @unlink($path . $get_image['sponsor_image']);
      }
    }
    $allowed_types = array('png', 'jpeg', 'jpg', 'svg');
    $file_name = strtolower($_FILES['sponsor_image']['name']);
    $type = explode('.', $file_name);
    if (in_array(end($type), $allowed_types)) {
      $tmp_name = $_FILES['sponsor_image']['tmp_name'];
      $file_extension = time() . strtolower($file_name);
      move_uploaded_file($tmp_name, $path . $file_extension);
      $upload = mysqli_query($conn, "UPDATE sponsors SET sponsor_image='$file_extension' WHERE sponsor_id='{$_SESSION['sponsor_id']}'");
      if ($upload) {
        $success
          = "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم رفع شعار الراعي بنجاح! </h4>
              </div>
              <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'my-account.php';
                       }, 2000);</script>";
      } else {

        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
      }
    } else {
      $error = "<div class='alert alert-danger text-center alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i>عذراً الملف المرفق غير مسموح يرجى ارفاق الصيغة المناسبة!</h4>
                </div>";
    }
  }
}
/////////////////////////////////////////////////// UPLOAD IMAGE FOR MERCHANTS & SPONSORS END ///////////////////////////////////////////



/////////////////////////////////////////////////// PAGINATION LOGIC START ///////////////////////////////////////////

if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}
$num_records_per_page = 6;
$offset = ($pageno - 1) * $num_records_per_page;
/////////////////////////////////////////////////// PAGINATION LOGIC END ///////////////////////////////////////////

?>

<!--hero section start-->
<section class="position-relative">
  <div id="particles-js"></div>
  <div class="container">
    <div class="row  text-center">
      <div class="col">
        <h1>الصفحة الشخصية </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="text-dark" href="index.php">الرئيسية</a>
            </li>

            <li class="breadcrumb-item active text-success" aria-current="page">الصفحة الشخصية</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- / .row -->
  </div>
  <!-- / .container -->
</section>
<?php
if (isset($success)) {
  echo $success;
}
if (isset($error)) {
  echo $error;
}
if (isset($s)) {
  echo $s;
}
?>

<!--hero section end-->
<style>
  .position-absolute {
    position: relative !important;
  }


  .badge {
    font-size: 100%;
  }

  .portfolio-filter button.is-checked,
  .portfolio-filter button:hover {
    background: #28a745;
  }

  .portfolio-title {
    visibility: visible;
    opacity: 1;
    position: relative;
    background: #28a745;
  }
</style>

<!--body content start-->

<div class="page-content">

  <!--portfolio start-->
  <section>
    <div class="container">
      <div class="row">
        <?php
        if (isset($_SESSION['user_id'])) {
          $query = "SELECT user_id,user_name,active,user_desc from users where user_id='{$_SESSION['user_id']}'";
          $result = mysqli_query($conn, $query);
          $data_u = mysqli_fetch_assoc($result);
        ?>
          <div class="col-lg-7 col-12 ">
            <div class="owl-carousel" data-items="1" data-autoplay="true">
              <div class="item">
                <img class="img-fluid" style='width:55%' src="assets/images/logos/talent1.jpeg" alt="">
              </div>
              <!-- <div class="item">
                <img class="img-fluid" src="assets/images/portfolio/large/02.jpg" alt="">
              </div> -->
            </div>


          </div>
          <div class="col-lg-5 col-12 mt-5">
            <h2 class="title">البيانات الشخصية</h2>
            <p class="lead mb-5">مرحباً بك في منصة اليوم الوطني السعودي ٩٠ </p>
            <ul class="cases-meta list-unstyled text-muted">
              <li class="mb-3"><span class="text-dark"> الإسم: </span> <?php echo $_SESSION['user_name'] ?></li>
              <li class="mb-3"><span class="text-dark"> صفة الحساب:</span> <?php echo $_SESSION['user_id'] ? 'مشارك' : "" ?></li>
              <?php if ($data_u['active'] == 1) { ?>
                <li class="mb-3"><span class="text-dark"> الشهادة:</span><a class='text-primary' href="certificate.php?u=<?php echo $_SESSION['user_id'] ?>" target="_blank"> طباعة الشهادة</a></li>
              <?php
              }
              if ($data_u['active'] == '0') {
                echo "<li class='mb-3' style='color:red'><span class='text-dark'> حالة الحساب: </span> غير مفعل (لتفعيل الحساب يرجى زيارة صفحة <a href='subscriptions.php' class='text-success'>الاشتراكات</a>)<br>
                في حالة تفعيل الحساب سيكون هناك مساحة في هذه الصفحة لارفاق مشاركاتك في المنصة.";
              } else {
                echo "<li class='mb-3' style='color:#28a745'><span class='text-dark'> حالة الحساب: </span>  مفعل";
              }
              ?></li>
              <?php
              if ($data_u['active'] == '1') { ?>
                <form action="" method="post">
                  <li class="mb-3"><span class="text-dark"> وصف الحساب: </span> <textarea name="change_desc" id="desc" class='form-control' cols="10" rows="5" readonly><?php echo !empty($data_u['user_desc']) ? $data_u['user_desc'] : 'لا يوجد وصف' ?></textarea></li>
                  <button type="button" id='c_desc' class='btn-sm btn btn-warning'>تعديل الوصف</button>
                  <input type="hidden" name="type_user" value='user'>
                  <input type="hidden" name="user_id" value='<?php echo $_SESSION['user_id'] ?>'>
                  <button type="submit" name='edit' style='display:none' id='confirm_change' class='btn-sm btn btn-success'>تأكيد التعديل</button>
                  <a href='my-account.php' id='remove_change' style='display:none' class='btn-sm btn btn-danger'> الغاء التعديل</a>
                </form>
              <?php } ?>
            </ul>
          </div>
          <?php if ($data_u['active'] == '1') { ?>
            <section class='col-lg-12'>
              <div class="container">
                <div class="row align-items-end">
                  <div class="col-lg-12">
                    <div class="mb-5 text-center">
                      <span class="badge badge-primary-soft p-2 bg-success">
                        <img src="assets/images/gif/KSA-flag.gif" alt="" srcset="">
                      </span>

                      <h2 class="mt-4 mb-0">مشاركة الأعمال</h2>
                      <p class="lead mb-0 text-center">هنا يمكنك مشاركة أعمالك لعرضها في المنصة.</p>
                    </div>
                    <form class="row" method="post" action="" enctype="multipart/form-data">
                      <div class="form-group col-md-12">
                        <label for="">مشاركة صورة او فيديو او مقطع صوتي</label>
                        <input type="file" dir='rtl' name="upload" class="form-control" required>
                        <strong class='text-danger'>الصيغ المسموحة للصور :(png-jpeg-jpg-svg)<br>الصيغ المسموحة للفيديوهات:(MP4-MOV)<br>الصيغ المسموحة للملفات الصوتية:(MP3)</strong>

                      </div>
                      <div class="form-group col-md-12">
                        <label for="">اضافة تعليق (ليست اجبارية)</label>
                        <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                      </div>
                      <div class="col-12 text-center mt-4">
                        <input type="hidden" name="type" value='users'>
                        <button type="submit" name='add' class="btn btn-outline-success btn-block"><span>ارفاق المشاركة</span>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </section>
            <section class='col-lg-12'>
              <div class="container">
                <div class="row justify-content-center text-center">
                  <div class="col-lg-8 col-md-12">
                    <div class="mb-6">
                      <h2 class="mt-3 text-success">مشاركاتي</h2>
                      <?php
                      $share_s = "SELECT * FROM uploads_users where user_id='{$_SESSION['user_id']}' ORDER BY upload_user_id DESC LIMIT $offset, $num_records_per_page";
                      $share_s_res = mysqli_query($conn, $share_s);
                      if (mysqli_num_rows($share_s_res) == 0) {
                        echo "<h5 class='text-danger'>لا توجد مشاركات لديك !</h5>";
                      ?>
                      <?php  } else {
                        $total_user_uploads_pages = mysqli_query($conn, "SELECT * FROM uploads_users where user_id='{$_SESSION['user_id']}'");
                        $total_rows_s = mysqli_num_rows($total_user_uploads_pages);
                        $total_pages_s = ceil($total_rows_s / $num_records_per_page);
                      ?>
                    </div>
                  </div>
                </div>
                <!-- / .row -->
                <div class="row">
                  <div class="col text-center">
                    <div class="portfolio-filter">
                      <button data-filter="" class="is-checked mb-3 mb-sm-0">جميع مشاركاتي</button>
                      <button data-filter=".cat1" class=" mb-3 mb-sm-0">الصور</button>
                      <button data-filter=".cat2" class="mb-3 mb-sm-0">الفيديوهات</button>
                      <button data-filter=".cat3">مقاطع صوتية</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="grid columns-3 row popup-gallery">
                      <div class="grid-sizer"></div>
                      <?php while ($s_shares = mysqli_fetch_assoc($share_s_res)) :
                          $typeArr = explode('.', $s_shares['upload_user_file']);
                          global $type;
                          switch (end($typeArr)) {
                            case 'jpeg':
                            case 'jpg':
                            case 'svg':
                            case 'png':
                              $type = 'cat1';
                              break;
                            case 'mp4':
                            case 'mov':
                            case '3gp':
                              $type = 'cat2';
                              break;
                            case 'm4a':
                            case 'mp3':
                              $type = 'cat3';
                              break;
                            default:
                              "not defined";
                              break;
                          }
                      ?>
                        <?php if ($type == 'cat1') { ?>
                          <div class="grid-item  col-lg-4 col-md-6 mb-5 <?php echo $type == 'cat1' ? 'cat1' : "" ?>">
                            <div class="portfolio-item position-relative overflow-hidden">
                              <img class="img-center w-100" src="assets/upload_users/<?php echo $s_shares['upload_user_file'] ?>">
                              <div class="portfolio-title d-flex justify-content-between align-items-center">
                                <div> <small class="text-light mb-2">لحذف او تعديل المشاركة </small>
                                  <h6><a class="btn-link text-white" href="view_share.php?us=<?php echo $s_shares['upload_user_id'] ?>">اضغط هنا</a></h6>
                                </div>
                                <a class="popup-img h2 text-white" href="assets/upload_users/<?php echo $s_shares['upload_user_file'] ?>"> <i class="la la-eye"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        <?php } elseif ($type == 'cat2') { ?>
                          <div class="grid-item col-lg-4 col-md-6 mb-5 <?php echo $type == 'cat2' ? 'cat2' : "" ?> ">
                            <div class="portfolio-item position-relative overflow-hidden">
                              <video class="img-center w-100" controls>
                                <source src="assets/upload_users/<?php echo $s_shares['upload_user_file'] ?>">
                              </video>
                              <div class="portfolio-title d-flex justify-content-between align-items-center">
                                <div> <small class="text-light mb-2">لحذف او تعديل المشاركة </small>
                                  <h6><a class="btn-link text-white" href="view_share.php?us=<?php echo $s_shares['upload_user_id'] ?>">اضغط هنا</a></h6>
                                </div>
                                <a class="popup-img h2 text-white" href="assets/upload_users/<?php echo $s_shares['upload_user_file'] ?>"> <i class=" la la-eye"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        <?php } else { ?>
                          <div class="grid-item col-lg-4 col-md-6 mb-5  <?php echo $type == 'cat3' ? 'cat3' : "" ?>">
                            <div class="portfolio-item position-relative overflow-hidden">
                              <audio controls class="img-center w-100">
                                <source src="assets/upload_users/<?php echo $s_shares['upload_user_file'] ?>">
                              </audio>
                              <div class="portfolio-title d-flex justify-content-between align-items-center">
                                <div> <small class="text-light mb-2">لحذف او تعديل المشاركة </small>
                                  <h6><a class="btn-link text-white" href="view_share.php?us=<?php echo $s_shares['upload_user_id'] ?>">اضغط هنا</a></h6>
                                </div>
                                <a class="popup-img h2 text-white" href="assets/upload_users/<?php echo $s_shares['upload_user_file'] ?>"> <i class="la la-eye"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                      <?php
                          }
                        endwhile;
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item"><a class="page-link" href="?pageno=1">الصفحة الاولى</a></li>
                  <li class="page-item <?php if ($pageno <= 1) {
                                          echo 'disabled';
                                        }   ?>" tabindex="-1">
                    <a class="page-link" href="<?php if ($pageno <= 1) {
                                                  echo '#';
                                                } else {
                                                  echo "?pageno=" . ($pageno - 1);
                                                } ?>" tabindex="-1">الصفحة السابقة</a>
                  </li>

                  <li class="page-item <?php if ($pageno >= $total_pages_s) {
                                          echo 'disabled';
                                        }   ?>">
                    <a class="page-link" href="<?php if ($pageno >= $total_pages_s) {
                                                  echo '#';
                                                } else {
                                                  echo "?pageno=" . ($pageno + 1);
                                                } ?>">الصفحة التالية</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages_s; ?>">الصفحة الاخيرة</a></li>
                </ul>
              </nav>
            <?php } ?>
            </section>
          <?php } ?>

        <?php
          ///////////////////////////////////////   SPONSOR PART START /////////////////////////////////////////////////

        } elseif (isset($_SESSION['sponsor_id'])) {
          $query_s = "SELECT sponsor_id,sponsor_name,active,sponsor_desc,sponsor_image from sponsors where sponsor_id='{$_SESSION['sponsor_id']}'";
          $result_s = mysqli_query($conn, $query_s);
          $data_s = mysqli_fetch_assoc($result_s);
        ?>
          <div class="col-lg-7 col-12 ">
            <div class="owl-carousel" data-items="1" data-autoplay="true">
              <?php if ($data_s['active'] == '1') { ?>
                <div class="item text-center">
                  <label for="" class='text-center text-primary'>شعار الحساب</label>
                  <img class="img-fluid" src="assets/sponsors_logo/<?php echo $data_s['sponsor_image'] ?>" alt="">
                </div>
              <?php } ?>
              <div class="item">
                <img class="img-fluid" style='width:55%' src="assets/images/logos/talent1.jpeg" alt="">
              </div>

            </div>
            <?php if ($data_s['active'] == '1') { ?>
              <div>
                <form action="" method="post" enctype="multipart/form-data">
                  <label for="">رفع الشعار </label>
                  <input type="hidden" name="type" value='sponsors'>
                  <input type="file" name="sponsor_image" accept="image/*" class='form-control' required>
                  <br>
                  <button type="submit" name='upload_image' class='btn btn-success btn-sm'>رفع شعار الراعي</button>
                </form>
              </div>
            <?php  }  ?>
          </div>
          <div class="col-lg-5 col-12">
            <h2 class="title">البيانات الشخصية</h2>
            <p class="lead mb-5">مرحباً بك في منصة اليوم الوطني السعودي ٩٠ </p>
            <ul class="cases-meta list-unstyled text-muted">
              <li class="mb-3"><span class="text-dark"> الإسم: </span> <?php echo $_SESSION['sponsor_name'] ?></li>
              <?php if ($data_s['active'] == 1) { ?>
                <li class="mb-3"><span class="text-dark"> الشهادة:</span><a class='text-primary' href="certificate.php?s=<?php echo $_SESSION['sponsor_id'] ?>" target="_blank"> طباعة الشهادة</a></li>
              <?php } ?>
              <li class="mb-3"><span class="text-dark"> صفة الحساب:</span> <?php
                                                                            if (isset($_SESSION['sponsor_id'])) {
                                                                              if (isset($_SESSION['gold']) && $_SESSION['gold'] == 1) {
                                                                                echo 'شركاء النجاح والرعايات الذهبية';
                                                                              } else {
                                                                                echo 'شركاء النجاح والرعايات الفضية';
                                                                              }
                                                                            }
                                                                            ?></li>
              <?php
              if ($data_s['active'] == '0') {
                echo "<li class='mb-3' style='color:red'><span class='text-dark'> حالة الحساب: </span> غير مفعل (لتفعيل الحساب يرجى زيارة صفحة <a href='subscriptions.php' class='text-success'>الاشتراكات</a>)<br>
                في حالة تفعيل الحساب سيكون هناك مساحة في هذه الصفحة لارفاق مشاركاتك في المنصة.";
              } else {
                echo "
              <li class='mb-3' style='color:#28a745'><span class='text-dark'> حالة الحساب: </span> مفعل";
              }
              ?></li>
              <?php
              if ($data_s['active'] == '1') { ?>
                <form action="" method="post">
                  <li class="mb-3"><span class="text-dark"> وصف الحساب: </span> <textarea name="change_desc" id="desc" class='form-control' cols="10" rows="5" readonly><?php echo !empty($data_s['sponsor_desc']) ? $data_s['sponsor_desc'] : 'لا يوجد وصف' ?></textarea></li>
                  <button type="button" id='c_desc' class='btn-sm btn btn-warning'>تعديل الوصف</button>

                  <input type="hidden" name="type_user" value='sponsor'>
                  <input type="hidden" name="sponsor_id" value='<?php echo $_SESSION['sponsor_id'] ?>'>
                  <button type="submit" name='edit' style='display:none' id='confirm_change' class='btn-sm btn btn-success'>تأكيد التعديل</button>

                  <a href='my-account.php' id='remove_change' style='display:none' class='btn-sm btn btn-danger'> الغاء التعديل</a>
                </form>
              <?php } ?>
            </ul>
          </div>
          <?php if ($data_s['active'] == '1') { ?>
            <section class='col-lg-12'>
              <div class="container">
                <div class="row align-items-end">
                  <div class="col-lg-12">
                    <div class="mb-5 text-center">
                      <span class="badge badge-primary-soft p-2 bg-success">
                        <img src="assets/images/gif/KSA-flag.gif" alt="" srcset="">
                      </span>
                      <h2 class="mt-4 mb-0">مشاركة الأعمال</h2>
                      <p class="lead mb-0 text-center">هنا يمكنك مشاركة أعمالك لعرضها في المنصة.</p>
                    </div>
                    <form class="row" method="post" action="" enctype="multipart/form-data">
                      <div class="form-group col-md-12">
                        <label for="">مشاركة صورة او فيديو او مقطع صوتي</label>
                        <input type="file" dir='rtl' name="upload" class="form-control" required>
                        <strong class='text-danger'>الصيغ المسموحة للصور :(png-jpeg-jpg-svg)<br>الصيغ المسموحة للفيديوهات:(MP4-MOV)<br>الصيغ المسموحة للملفات الصوتية:(MP3)</strong>

                      </div>
                      <div class="form-group col-md-12">
                        <label for="">اضافة تعليق (ليست اجبارية)</label>
                        <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                      </div>
                      <div class="col-12 text-center mt-4">
                        <input type="hidden" name="type" value='sponsors'>
                        <button type="submit" name='add' class="btn btn-outline-success btn-block"><span>ارفاق المشاركة</span>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </section>
            <section class='col-lg-12'>
              <div class="container">
                <div class="row justify-content-center text-center">
                  <div class="col-lg-8 col-md-12">
                    <div class="mb-6">
                      <h2 class="mt-3 text-success">مشاركاتي</h2>
                      <?php
                      $share_sp = "SELECT * FROM uploads_sponsors where sponsor_id='{$_SESSION['sponsor_id']}' ORDER BY upload_sponsor_id DESC LIMIT $offset, $num_records_per_page";
                      $share_sp_res = mysqli_query($conn, $share_sp);
                      if (mysqli_num_rows($share_sp_res) == 0) {
                        echo "<h5 class='text-danger'>لا توجد مشاركات لديك !</h5>";
                      } else {
                        $total_sponsor_uploads_pages = mysqli_query($conn, "SELECT * FROM uploads_sponsors where sponsor_id='{$_SESSION['sponsor_id']}'");
                        $total_rows_sp = mysqli_num_rows($total_sponsor_uploads_pages);
                        $total_pages_sp = ceil($total_rows_sp / $num_records_per_page);
                      ?>
                    </div>
                  </div>
                </div>
                <!-- / .row -->
                <div class="row">
                  <div class="col text-center">
                    <div class="portfolio-filter">
                      <button data-filter="" class="is-checked mb-3 mb-sm-0">جميع مشاركاتي</button>
                      <button data-filter=".cat1" class=" mb-3 mb-sm-0">الصور</button>
                      <button data-filter=".cat2" class="mb-3 mb-sm-0">الفيديوهات</button>
                      <button data-filter=".cat3">مقاطع صوتية</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="grid columns-3 row popup-gallery">
                      <div class="grid-sizer"></div>
                      <?php while ($sp_shares = mysqli_fetch_assoc($share_sp_res)) :
                          $typeArr = explode('.', $sp_shares['upload_sponsor_file']);
                          // var_dump(end($typeArr));
                          global $type;
                          switch (end($typeArr)) {
                            case 'jpeg':
                            case 'jpg':
                            case 'svg':
                            case 'png':
                              $type = 'cat1';
                              break;
                            case 'mp4':
                            case 'mov':
                            case '3gp':
                              $type = 'cat2';
                              break;
                            case 'm4a':
                            case 'mp3':
                              $type = 'cat3';
                              break;
                            default:
                              "not defined";
                              break;
                          }
                          if ($type == 'cat1') { ?>
                          <div class="grid-item  col-lg-4 col-md-6 mb-5 <?php echo $type == 'cat1' ? 'cat1' : "" ?>">
                            <div class="portfolio-item position-relative overflow-hidden">
                              <img class="img-center w-100" src="assets/upload_sponsors/<?php echo $sp_shares['upload_sponsor_file'] ?>">
                              <div class="portfolio-title d-flex justify-content-between align-items-center">
                                <div> <small class="text-light mb-2">لحذف او تعديل المشاركة </small>
                                  <h6><a class="btn-link text-white" href="view_share.php?sp=<?php echo $sp_shares['upload_sponsor_id'] ?>">اضغط هنا</a></h6>
                                </div>
                                <a class="popup-img h2 text-white" href="assets/upload_sponsors/<?php echo $sp_shares['upload_sponsor_file'] ?>"> <i class="la la-eye"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        <?php } elseif ($type == 'cat2') { ?>
                          <div class="grid-item col-lg-4 col-md-6 mb-5 <?php echo $type == 'cat2' ? 'cat2' : "" ?>  ">
                            <div class="portfolio-item position-relative overflow-hidden">
                              <video class="img-center w-100" controls>
                                <source src="assets/upload_sponsors/<?php echo $sp_shares['upload_sponsor_file'] ?>">
                              </video>
                              <div class="portfolio-title d-flex justify-content-between align-items-center">
                                <div> <small class="text-light mb-2">لحذف او تعديل المشاركة </small>
                                  <h6><a class="btn-link text-white" href="view_share.php?sp=<?php echo $sp_shares['upload_sponsor_id'] ?>">اضغط هنا</a></h6>
                                </div>
                                <a class="popup-img h2 text-white" href="assets/upload_sponsors/<?php echo $sp_shares['upload_sponsor_file'] ?>"> <i class=" la la-eye"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        <?php } else { ?>
                          <div class="grid-item col-lg-4 col-md-6 mb-5  <?php echo $type == 'cat3' ? 'cat3' : "" ?>">
                            <div class="portfolio-item position-relative overflow-hidden">
                              <audio controls class="img-center w-100">
                                <source src="assets/upload_sponsors/<?php echo $sp_shares['upload_sponsor_file'] ?>">
                              </audio>
                              <div class="portfolio-title d-flex justify-content-between align-items-center">
                                <div> <small class="text-light mb-2">لحذف او تعديل المشاركة </small>
                                  <h6><a class="btn-link text-white" href="view_share.php?sp=<?php echo $sp_shares['upload_sponsor_id'] ?>">اضغط هنا</a></h6>
                                </div>
                                <a class="popup-img h2 text-white" href="assets/upload_sponsors/<?php echo $sp_shares['upload_sponsor_file'] ?>"> <i class="la la-eye"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                      <?php
                          }
                        endwhile;
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item"><a class="page-link" href="?pageno=1">الصفحة الاولى</a></li>
                  <li class="page-item <?php if ($pageno <= 1) {
                                          echo 'disabled';
                                        }   ?>" tabindex="-1">
                    <a class="page-link" href="<?php if ($pageno <= 1) {
                                                  echo '#';
                                                } else {
                                                  echo "?pageno=" . ($pageno - 1);
                                                } ?>" tabindex="-1">الصفحة السابقة</a>
                  </li>
                  <li class="page-item <?php if ($pageno >= $total_pages_sp) {
                                          echo 'disabled';
                                        }   ?>">
                    <a class="page-link" href="<?php if ($pageno >= $total_pages_sp) {
                                                  echo '#';
                                                } else {
                                                  echo "?pageno=" . ($pageno + 1);
                                                } ?>">الصفحة التالية</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages_sp; ?>">الصفحة الاخيرة</a></li>
                </ul>
              </nav>
            <?php } ?>
            </section>
          <?php }
          ///////////////////////////////////////   SPONSOR PART END /////////////////////////////////////////////////

          ?>

        <?php
          ///////////////////////////////////////   MERCHANT PART START /////////////////////////////////////////////////

        } elseif (isset($_SESSION['merchant_id'])) {
          $query_m = "SELECT merchant_id,merchant_name,active,merchant_desc,merchant_image from merchants where merchant_id='{$_SESSION['merchant_id']}'";
          $result_m = mysqli_query($conn, $query_m);
          $data_m = mysqli_fetch_assoc($result_m);
        ?>
          <div class="col-lg-7 col-12">
            <div class="owl-carousel" data-items="1" data-autoplay="true">
              <?php if ($data_m['active'] == '1') { ?>
                <div class="item text-center">
                  <label for="" class='text-primary'>شعار الحساب</label>
                  <img class="img-fluid" src="assets/merchants_logo/<?php echo $data_m['merchant_image'] ?>" alt="">
                </div>
              <?php } ?>
              <div class="item">
                <img class="img-fluid" style='width:55%' src="assets/images/logos/talent1.jpeg" alt="">
              </div>

            </div>
            <?php if ($data_m['active'] == '1') { ?>
              <div>
                <form action="" method="post" enctype="multipart/form-data">
                  <label for="">رفع الشعار </label>
                  <input type="hidden" name="type" value='merchant'>
                  <input type="file" name="merchant_image" accept="image/*" class='form-control' required>
                  <br>
                  <button type="submit" name='upload_image' class='btn btn-success btn-sm'>رفع شعار التاجر</button>
                </form>
              </div>
            <?php  }  ?>
          </div>
          <div class="col-lg-5 col-12">
            <h2 class="title">البيانات الشخصية</h2>
            <p class="lead mb-5">مرحباً بك في منصة اليوم الوطني السعودي ٩٠ </p>
            <ul class="cases-meta list-unstyled text-muted">
              <li class="mb-3"><span class="text-dark"> الإسم: </span> <?php echo $_SESSION['merchant_name'] ?></li>

              <li class="mb-3"><span class="text-dark"> صفة الحساب:</span> <?php echo $_SESSION['merchant_id'] ? 'أصحاب المنتجات التجارية' : "" ?></li>
              <?php if ($data_m['active'] == 1) { ?>
                <li class="mb-3"><span class="text-dark"> الشهادة:</span><a class='text-primary' href="certificate.php?m=<?php echo $_SESSION['merchant_id'] ?>" target="_blank"> طباعة الشهادة</a></li>

              <?php
              }
              if ($data_m['active'] == '0') {
                echo "<li class='mb-3' style='color:red'><span class='text-dark'> حالة الحساب: </span> غير مفعل (لتفعيل الحساب يرجى زيارة صفحة <a href='subscriptions.php' class='text-success'>الاشتراكات</a>)<br>
                في حالة تفعيل الحساب سيكون هناك مساحة في هذه الصفحة لارفاق مشاركاتك في المنصة.";
              } else {
                echo "
              <li class='mb-3' style='color:#28a745'><span class='text-dark'> حالة الحساب: </span> مفعل";
              }
              ?></li>
              <?php
              if ($data_m['active'] == '1') { ?>
                <form action="" method="post">
                  <li class="mb-3"><span class="text-dark"> وصف الحساب: </span> <textarea name="change_desc" id="desc" class='form-control' cols="10" rows="5" readonly><?php echo !empty($data_m['merchant_desc']) ? $data_m['merchant_desc'] : 'لا يوجد وصف' ?></textarea></li>
                  <button type="button" id='c_desc' class='btn-sm btn btn-warning'>تعديل الوصف</button>

                  <input type="hidden" name="type_user" value='merchant'>
                  <input type="hidden" name="merchant_id" value='<?php echo $_SESSION['merchant_id'] ?>'>
                  <button type="submit" name='edit' style='display:none' id='confirm_change' class='btn-sm btn btn-success'>تأكيد التعديل</button>
                  <a href='my-account.php' id='remove_change' style='display:none' class='btn-sm btn btn-danger'> الغاء التعديل</a>

                </form>
              <?php } ?>

            </ul>
          </div>
          <?php if ($data_m['active'] == '1') { ?>
            <section class='col-lg-12'>
              <div class="container">
                <div class="row align-items-end">
                  <div class="col-lg-12">
                    <div class="mb-5 text-center">
                      <span class="badge badge-primary-soft p-2 bg-success">
                        <img src="assets/images/gif/KSA-flag.gif" alt="" srcset="">
                      </span>
                      <h2 class="mt-4 mb-0">مشاركة الأعمال</h2>
                      <p class="lead mb-0 text-center">هنا يمكنك مشاركة أعمالك لعرضها في المنصة.</p>
                    </div>
                    <form class="row" method="post" action="" enctype="multipart/form-data">
                      <div class="form-group col-md-12">
                        <label for="">مشاركة صورة او فيديو او مقطع صوتي</label>
                        <input type="file" dir='rtl' name="upload" class="form-control" required>
                        <strong class='text-danger'>الصيغ المسموحة للصور :(png-jpeg-jpg-svg)<br>الصيغ المسموحة للفيديوهات:(MP4-MOV)<br>الصيغ المسموحة للملفات الصوتية:(MP3)</strong>

                      </div>
                      <div class="form-group col-md-12">
                        <label for="">اضافة تعليق (ليست اجبارية)</label>
                        <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                      </div>
                      <div class="col-12 text-center mt-4">
                        <input type="hidden" name="type" value='merchants'>
                        <button type="submit" name='add' class="btn btn-outline-success btn-block"><span>ارفاق المشاركة</span>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </section>
            <section class='col-lg-12'>
              <div class="container">
                <div class="row justify-content-center text-center">
                  <div class="col-lg-8 col-md-12">
                    <div class="mb-6">
                      <h2 class="mt-3 text-success">مشاركاتي</h2>
                      <?php
                      $share_m = "SELECT * FROM uploads_merchants where merchant_id='{$_SESSION['merchant_id']}' ORDER BY upload_merchant_id DESC LIMIT $offset, $num_records_per_page";
                      $share_m_res = mysqli_query($conn, $share_m);
                      if (mysqli_num_rows($share_m_res) == 0) {
                        echo "<h5 class='text-danger'>لا توجد مشاركات لديك !</h5>";
                      } else {

                        $total_merchant_uploads_pages = mysqli_query($conn, "SELECT * FROM uploads_merchants where merchant_id='{$_SESSION['merchant_id']}'");
                        $total_rows_mer = mysqli_num_rows($total_merchant_uploads_pages);
                        $total_pages_mer = ceil($total_rows_mer / $num_records_per_page);
                      ?>
                    </div>
                  </div>
                </div>
                <!-- / .row -->
                <div class="row">
                  <div class="col text-center">
                    <div class="portfolio-filter">
                      <button data-filter="" class="is-checked mb-3 mb-sm-0">جميع مشاركاتي</button>
                      <button data-filter=".cat1" class=" mb-3 mb-sm-0">الصور</button>
                      <button data-filter=".cat2" class="mb-3 mb-sm-0">الفيديوهات</button>
                      <button data-filter=".cat3">مقاطع صوتية</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="grid columns-3 row popup-gallery">
                      <div class="grid-sizer"></div>
                      <?php while ($m_shares = mysqli_fetch_assoc($share_m_res)) :
                          $typeArr = explode('.', $m_shares['upload_merchant_file']);
                          // var_dump(end($typeArr));
                          global $type;
                          switch (end($typeArr)) {
                            case 'jpeg':
                            case 'jpg':
                            case 'svg':
                            case 'png':
                              $type = 'cat1';
                              break;
                            case 'mp4':
                            case 'mov':
                            case '3gp':
                              $type = 'cat2';
                              break;
                            case 'm4a':
                            case 'mp3':
                              $type = 'cat3';
                              break;
                            default:
                              "not defined";
                              break;
                          }
                      ?>
                        <?php if ($type == 'cat1') { ?>
                          <div class="grid-item  col-lg-4 col-md-6 mb-5 <?php echo $type == 'cat1' ? 'cat1' : "" ?> ">
                            <div class="portfolio-item position-relative overflow-hidden">
                              <img class="img-center w-100" src="assets/upload_merchants/<?php echo $m_shares['upload_merchant_file'] ?>">
                              <div class="portfolio-title d-flex justify-content-between align-items-center">
                                <div> <small class="text-light mb-2">لحذف او تعديل المشاركة </small>
                                  <h6><a class="btn-link text-white" href="view_share.php?me=<?php echo $m_shares['upload_merchant_id'] ?>">اضغط هنا</a></h6>
                                </div>
                                <a class="popup-img h2 text-white" href="assets/upload_merchants/<?php echo $m_shares['upload_merchant_file'] ?>"> <i class="la la-eye"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        <?php } elseif ($type == 'cat2') { ?>
                          <div class="grid-item col-lg-4 col-md-6 mb-5 <?php echo $type == 'cat2' ? 'cat2' : "" ?> ">
                            <div class="portfolio-item position-relative overflow-hidden">
                              <video class="img-center w-100" controls>
                                <source src="assets/upload_merchants/<?php echo $m_shares['upload_merchant_file'] ?>">
                              </video>
                              <div class="portfolio-title d-flex justify-content-between align-items-center">
                                <div> <small class="text-light mb-2">لحذف او تعديل المشاركة </small>
                                  <h6><a class="btn-link text-white" href="view_share.php?me=<?php echo $m_shares['upload_merchant_id'] ?>">اضغط هنا</a></h6>
                                </div>
                                <a class="popup-img h2 text-white" href="assets/upload_merchants/<?php echo $m_shares['upload_merchant_file'] ?>"> <i class=" la la-eye"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        <?php } else { ?>
                          <div class="grid-item col-lg-4 col-md-6 mb-5  <?php echo $type == 'cat3' ? 'cat3' : "" ?>">
                            <div class="portfolio-item position-relative overflow-hidden">
                              <audio controls class="img-center w-100">
                                <source src="assets/upload_merchants/<?php echo $m_shares['upload_merchant_file'] ?>">
                              </audio>
                              <div class="portfolio-title d-flex justify-content-between align-items-center">
                                <div> <small class="text-light mb-2">لحذف او تعديل المشاركة </small>
                                  <h6><a class="btn-link text-white" href="view_share.php?me=<?php echo $m_shares['upload_merchant_id'] ?>">اضغط هنا</a></h6>
                                </div>
                                <a class="popup-img h2 text-white" href="assets/upload_merchants/<?php echo $m_shares['upload_merchant_file'] ?>"> <i class="la la-eye"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                      <?php
                          }
                        endwhile;
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item"><a class="page-link" href="?pageno=1">الصفحة الاولى</a></li>
                  <li class="page-item <?php if ($pageno <= 1) {
                                          echo 'disabled';
                                        }   ?>" tabindex="-1">
                    <a class="page-link" href="<?php if ($pageno <= 1) {
                                                  echo '#';
                                                } else {
                                                  echo "?pageno=" . ($pageno - 1);
                                                } ?>" tabindex="-1">الصفحة السابقة</a>
                  </li>

                  <li class="page-item <?php if ($pageno >= $total_pages_mer) {
                                          echo 'disabled';
                                        }   ?>">
                    <a class="page-link" href="<?php if ($pageno >= $total_pages_mer) {
                                                  echo '#';
                                                } else {
                                                  echo "?pageno=" . ($pageno + 1);
                                                } ?>">الصفحة التالية</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages_mer; ?>">الصفحة الاخيرة</a></li>
                </ul>
              </nav>
            <?php } ?>
            </section>
          <?php } ?>
        <?php
        } else {
          echo "<script>window.location.href='index.php'</script>";
        }
        ?>
      </div>
    </div>
  </section>
  <!--portfolio end-->
</div>
<!--body content end-->
<!--footer start-->
<?php include_once('includes/footer.php') ?>
<script>
  $(document).ready(function() {
    var desc = $('#desc').val();

    $('#c_desc').click(function() {
      $('#desc').removeAttr('readonly');
      $("#remove_change").show();
      $("#confirm_change").show();
      $('#c_desc').hide();
    });
    $('#remove_change').click(function() {
      $('#desc').attr('readonly', true);
      $("#remove_change").hide();
      $("#confirm_change").hide();
      $('#c_desc').show();

    });

  });
</script>