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

    $query = mysqli_query($conn, "INSERT INTO user_contest(user_id,upload_file)VALUES('{$_SESSION['user_id']}','$file_ext')");

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

  .product-link a:hover {
    background: #28a745;
    color: #ffffff;
  }

  .link-title:hover {
    color: #28a745;
  }

  .product-link button.add-cart {
    width: auto;
    height: auto;
    padding: 0px 20px;
    line-height: 36px;
    font-size: 14px;
  }

  .product-link button {
    display: inline-table;
    width: 36px;
    height: 36px;
    background: #fff;
    border-radius: 60px;
    line-height: 36px;
    overflow: hidden;
    color: #000;
    position: relative;
    -webkit-box-shadow: 0 10px 55px 5px rgba(137, 173, 255, .15);
    box-shadow: 0 10px 55px 5px rgba(137, 173, 255, .15);
    -webkit-transition: all .4s ease;
    -o-transition: all .4s ease;
    transition: all .4s ease;
    text-align: center;
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
            $get_uploads = mysqli_query($conn, "SELECT contest_id,user_name,upload_file FROM users INNER JOIN user_contest
             ON users.user_id=user_contest.user_id where active=1 ORDER BY contest_id DESC");

            while ($uploads = mysqli_fetch_assoc($get_uploads)) :
              $typeArr = explode('.', $uploads['upload_file']);
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
                      <a href="assets/user_contest_uploads/<?php echo $uploads['upload_file'] ?>">
                        <img class="img-fluid" src="assets/user_contest_uploads/<?php echo $uploads['upload_file'] ?>" alt="">
                      </a>
                    </div>
                    <div class="product-desc">
                      <p class="product-name mt-4 mb-2 d-block link-title">بواسطة: <?php echo $uploads['user_name'] ?></p>
                      <?php if (isset($_SESSION['v_id'])) { ?>
                        <div class="product-link ">
                          <form action="" method="post">
                            <input type="hidden" name="c_id" value='<?php echo $uploads['contest_id'] ?>'>
                            <button class="add-cart btn-outline-success mt-5"> <i class="ti-star ml-2 mb-1"></i> تصويت كأفضل عمل </button>
                          </form>
                          <!-- <a class="wishlist-btn" href="#"> <i class="ti-heart"></i> -->
                          </a>
                        </div>
                      <?php } else { ?>
                        <div class="product-link mt-3">
                          <a href="voter_register.php" class='add-cart'><i class="ti-star ml-2 mb-1"></i> تسجيل حساب للتصويت</a>
                        </div>
                      <?php   } ?>
                    </div>
                  </div>
                </div>
              <?php } elseif ($type == 'video') { ?>

                <div class="col-lg-4 col-md-6">
                  <div class="product-item">
                    <div class="product-img">
                      <a href="assets/user_contest_uploads/<?php echo $uploads['upload_file'] ?>">

                        <video class="img-center w-100" controls>
                          <source src="assets/user_contest_uploads/<?php echo $uploads['upload_file'] ?>">
                        </video>
                      </a>
                    </div>
                    <div class="product-desc">
                      <p class="product-name mt-4 mb-2 d-block link-title">بواسطة: <?php echo $uploads['user_name'] ?></p>
                      <?php if (isset($_SESSION['v_id'])) { ?>
                        <div class="product-link mt-3">
                          <form action="" method="post">
                            <input type="hidden" name="c_id" value='<?php echo $uploads['contest_id'] ?>'>

                            <button class="add-cart btn-outline-success"> <i class="ti-star ml-2 mb-1"></i> تصويت كأفضل عمل </button>
                          </form>
                          <!-- <a class="wishlist-btn" href="#"> <i class="ti-heart"></i> -->
                          </a>
                        </div>
                      <?php } else { ?>
                        <div class="product-link mt-3">

                          <a href="voter_register.php" class='add-cart'><i class="ti-star ml-2 mb-1"></i> تسجيل حساب للتصويت</a>

                        </div>

                      <?php } ?>
                    </div>
                  </div>
                </div>



              <?php  } elseif ($type == 'audio') { ?>

                <div class="col-lg-4 col-md-6">
                  <div class="product-item">
                    <div class="product-img">
                      <audio controls class="img-center w-100">
                        <source src="assets/user_contest_uploads/<?php echo $uploads['upload_file'] ?>">
                      </audio>
                    </div>
                    <div class="product-desc">
                      <p class="product-name mt-4 mb-2 d-block link-title">بواسطة: <?php echo $uploads['user_name'] ?></p>
                      <?php if (isset($_SESSION['v_id'])) { ?>
                        <div class="product-link mt-3">
                          <input type="hidden" name="c_id" value='<?php echo $uploads['contest_id'] ?>'>

                          <button class="add-cart btn-outline-success"> <i class="ti-star ml-2 mb-1"></i> تصويت كأفضل عمل </button>
                          <!-- <a class="wishlist-btn" href="#"> <i class="ti-/heart"></i> -->
                          </a>
                        </div>
                      <?php } else {  ?>
                        <div class="product-link mt-3">

                          <a href="voter_register.php" class='add-cart'><i class="ti-star ml-2 mb-1"></i> تسجيل حساب للتصويت</a>

                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>


            <?php }
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
          if (isset($_SESSION['user_id'])) {
            $active = mysqli_query($conn, "SELECT contest_id,users.user_id,active,upload_file from users LEFT JOIN user_contest ON users.user_id=user_contest.user_id  where users.user_id='{$_SESSION['user_id']}'");
            $check_active = mysqli_fetch_assoc($active);
            if (($check_active['active'] == '1') && empty($check_active['upload_file'])) {
          ?>
              <div>
                <h4 class="mb-5">ارفاق للمسابقة</h4>
                <ul class="list-unstyled list-group list-group-flush mb-5">
                  <li class="mb-4">
                    <form action="" method="post" enctype="multipart/form-data">
                      <input type="file" name='contest_file' class='form-control' required>
                      <small class='text-danger'>ملاحظة</small><br>
                      <button type="submit" name='upload' class='btn btn-success btn-sm'>تأكيد الارفاق</button>
                    </form>
                  </li>
                </ul>
              </div>

          <?php }
          }
          ?>
        </div>
      </div>
    </div>
  </section>
</div>
<!--body content end-->
<?php include_once('includes/footer.php') ?>