<?php include_once('includes/header.php');

if (isset($_POST['upload'])) {
  $allowed_types = array('mp3', 'mp4', 'png', 'jpeg', 'jpg', 'svg', '3gp', 'mov');

  $path = 'assets/user_contest_uploads/';

  $file_name = $_FILES['contest_file']['name'];
  $type = explode('.', $file_name);
  if (in_array(end($type), $allowed_types)) {
    $tmp_name = $_FILES['contest_file']['tmp_name'];
    $file_ext = time() . strtolower($file_name);
    move_uploaded_file($tmp_name, $path . $file_ext);

    $query = mysqli_query($conn, "UPDATE users SET user_upload='$file_ext' where user_id='{$_SESSION['user_id']}'");

    if ($query) {
      $success =
        " <div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم ارفاق المشاركة بنجاح! </h4>
                </div>
             <script type='text/Javascript'>
         window.setTimeout(function() {
         window.location.href = 'users-contest.php';
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



?>

<!--header end-->


<!--hero section start-->

<section class="position-relative">
  <div id="particles-js"></div>
  <div class="container">
    <div class="row  text-center">
      <div class="col">
        <h1>المسابقات</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="text-dark" href="#">الرئيسية</a>
            </li>
            <li class="breadcrumb-item">المشاركات الوطنية</li>
            <li class="breadcrumb-item active text-success" aria-current="page">مسابقات</li>
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

?>
<!--hero section end-->
<style>
  .position-absolute {
    position: relative !important;
  }

  .link-title:hover {
    color: #28a745;
  }
</style>

<!--body content start-->

<div class="page-content">

  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-12 order-lg-12">
          <div class="row text-center">
            <?php
            $get_uploads = mysqli_query($conn, "SELECT user_name,user_upload FROM users ORDER BY user_id DESC");

            while ($uploads = mysqli_fetch_assoc($get_uploads)) :
              $typeArr = explode('.', $uploads['user_upload']);
              // var_dump(end($typeArr));
              global $type;
              switch (end($typeArr)) {
                case 'jpeg':
                case 'jpg':
                case 'svg':
                case 'png':
                  $type = 'image';
                  break;
                case 'mp4':
                case 'mov':
                case '3gp':
                  $type = 'video';
                  break;
                case 'm4a':
                case 'mp3':
                  $type = 'audio';
                  break;
                default:
                  "not defined";
                  break;
              }
              if ($type == 'image') {
            ?>
                <div class="col-lg-4 col-md-6">
                  <div class="product-item">
                    <div class="product-img">
                      <img class="img-fluid" src="assets/user_contest_uploads/<?php echo $uploads['user_upload'] ?>" alt="">
                    </div>
                    <div class="product-desc">
                      <p class="product-name mt-4 mb-2 d-block link-title">بواسطة: <?php echo $uploads['user_name'] ?></p>

                      <div class="product-link mt-3">
                        <a class="add-cart " href="#"> <i class="ti-bag ml-2"></i>Add To Cart</a>
                        <a class="wishlist-btn" href="#"> <i class="ti-heart"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            <?php }
            // elseif(){}
            endwhile;

            ?>
          </div>


















          <nav aria-label="..." class="mt-8">
            <ul class="pagination">
              <li class="page-item mr-auto"> <a class="page-link" href="#">Previous</a>
              </li>
              <li class="page-item"><a class="page-link border-0 rounded text-dark" href="#">1</a>
              </li>
              <li class="page-item active" aria-current="page"> <a class="page-link border-0 rounded" href="#">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link border-0 rounded text-dark" href="#">3</a>
              </li>
              <li class="page-item"><a class="page-link border-0 rounded text-dark" href="#">...</a>
              </li>
              <li class="page-item"><a class="page-link border-0 rounded text-dark" href="#">5</a>
              </li>
              <li class="page-item ml-auto"> <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3 col-md-12 order-lg-1 sidebar">
          <?php
          $active = mysqli_query($conn, "SELECT active,user_upload from users where user_id='{$_SESSION['user_id']}'");
          $check_active = mysqli_fetch_assoc($active);
          if ($check_active['active'] == '1' && empty($check_active['user_upload'])) {
          ?>
            <div>
              <h4 class="mb-5">ارفاق للمسابقة</h4>
              <ul class="list-unstyled list-group list-group-flush mb-5">
                <li class="mb-4">
                  <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" name='contest_file' class='form-control' name="" id="">
                    <small class='text-danger'>ملاحظة</small><br>
                    <button type="submit" name='upload' class='btn btn-success btn-sm'>تأكيد الارفاق</button>
                  </form>
                </li>
              </ul>
            </div>

          <?php } ?>
        </div>
      </div>
    </div>
  </section>
</div>
<!--body content end-->
<?php include_once('includes/footer.php') ?>