<?php include_once('includes/header.php');
////////////////////////////////////////////// UPLOAD CONTEST INSERTION START //////////////////////////////////////////////////////
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
                 <h4><i class='icon fa fa-check'></i> تم ارفاق المسابقة بنجاح! </h4>
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
////////////////////////////////////////////// UPLOAD CONTEST INSERTION END  //////////////////////////////////////////////////////


////////////////////////////////////////////// VOTING CONTEST  START /////////////////////////////////////////////////////////

if (isset($_POST['vote'])) {


  if ($_POST['type'] == 'merchant') {
    $contest_id = $_POST['c_id'];
    $votes = mysqli_query($conn, "SELECT votes from user_contest where contest_id='$contest_id'");
    $vote_row = mysqli_fetch_assoc($votes);
    $increment = $vote_row['votes'] + 1;

    mysqli_query($conn, "UPDATE user_contest SET votes='$increment' where contest_id='$contest_id'");

    $voter_merchant_query = mysqli_query($conn, "INSERT INTO voters_active_contest(merchant_id,user_contest_id,voted)VALUES('{$_SESSION['merchant_id']}','$contest_id',1)");
    if ($voter_merchant_query) {

      $success =
        " <div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم التصويت للعمل بنجاح! </h4>
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
  } elseif ($_POST['type'] == 'sponsor') {
    $contest_id = $_POST['c_id'];
    $votes = mysqli_query($conn, "SELECT votes from user_contest where contest_id='$contest_id'");
    $vote_row = mysqli_fetch_assoc($votes);
    $increment = $vote_row['votes'] + 1;

    mysqli_query($conn, "UPDATE user_contest SET votes='$increment' where contest_id='$contest_id'");

    $voter_sponsor_query = mysqli_query($conn, "INSERT INTO voters_active_contest(sponsor_id,user_contest_id,voted)VALUES('{$_SESSION['sponsor_id']}','$contest_id',1)");
    if ($voter_sponsor_query) {

      $success =
        " <div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم التصويت للعمل بنجاح! </h4>
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
  } elseif ($_POST['type'] == 'user') {
    $contest_id = $_POST['c_id'];
    $votes = mysqli_query($conn, "SELECT votes from user_contest where contest_id='$contest_id'");
    $vote_row = mysqli_fetch_assoc($votes);
    $increment = $vote_row['votes'] + 1;

    mysqli_query($conn, "UPDATE user_contest SET votes='$increment' where contest_id='$contest_id'");

    $voter_sponsor_query = mysqli_query($conn, "INSERT INTO voters_active_contest(user_id,user_contest_id,voted)VALUES('{$_SESSION['user_id']}','$contest_id',1)");
    if ($voter_sponsor_query) {

      $success =
        " <div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم التصويت للعمل بنجاح! </h4>
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
    $contest_id = $_POST['c_id'];
    $votes = mysqli_query($conn, "SELECT votes from user_contest where contest_id='$contest_id'");
    $vote_row = mysqli_fetch_assoc($votes);
    $increment = $vote_row['votes'] + 1;

    mysqli_query($conn, "UPDATE user_contest SET votes='$increment' where contest_id='$contest_id'");

    $v_query = mysqli_query($conn, "INSERT INTO voter_contest(voter_id,contest_id,voted)VALUES('{$_SESSION['voter_id']}','$contest_id',1)");
    if ($v_query) {

      $success =
        " <div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-check'></i> تم التصويت للعمل بنجاح! </h4>
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
  }
}



//////////////////////////////////////////////////// VOTING CONTEST  END   //////////////////////////////////////////////////////


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
        <h1>المسابقات الوطنية </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="text-dark" href="#">الرئيسية</a>
            </li>
            <li class="breadcrumb-item">المشاركات الوطنية</li>
            <li class="breadcrumb-item active text-success" aria-current="page">المسابقات الوطنية </li>
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
             ON users.user_id=user_contest.user_id where active=1 ORDER BY contest_id DESC LIMIT $offset, $num_records_per_page ");
            if (mysqli_num_rows($get_uploads) == 0) {
              echo "
            <section class='col-lg-12'>
              <div class='container'>
                <div class='row justify-content-center text-center'>
                  <div class='col-lg-8 col-md-12'>
                    <div class='mb-6'>";

              echo "<h5 class='text-danger'>لا توجد مسابقات بعد  !</h5>
                  </div>
                  </div>
                </div>
                </div>
            </section>";
            } else {
              $total_user_contests = mysqli_query($conn, "SELECT * FROM user_contest");
              $total_rows_s = mysqli_num_rows($total_user_contests);
              $total_pages_s = ceil($total_rows_s / $num_records_per_page);
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

            ?>
                <div class="col-lg-4 col-md-6">
                  <div class="product-item">
                    <div class="product-img">
                      <?php if ($type == 'image') { ?>

                        <a href="assets/user_contest_uploads/<?php echo $uploads['upload_file'] ?>">
                          <img class="img-fluid" src="assets/user_contest_uploads/<?php echo $uploads['upload_file'] ?>" alt="">
                        </a>

                      <?php } elseif ($type == 'video') { ?>
                        <a href="assets/user_contest_uploads/<?php echo $uploads['upload_file'] ?>">
                          <video class="img-center w-100" controls>
                            <source src="assets/user_contest_uploads/<?php echo $uploads['upload_file'] ?>">
                          </video>
                        </a>
                      <?php } elseif ($type == 'audio') { ?>

                        <audio controls class="img-center w-100">
                          <source src="assets/user_contest_uploads/<?php echo $uploads['upload_file'] ?>">
                        </audio>
                      <?php } ?>
                    </div>
                    <div class="product-desc">
                      <p class="product-name mt-4 mb-2 d-block link-title">بواسطة: <?php echo $uploads['user_name'] ?></p>
                      <?php if (isset($_SESSION['voter_id'])) {
                        $check_voted = mysqli_query($conn, "SELECT voted,contest_id from voter_contest where voter_id='{$_SESSION['voter_id']}'");

                      ?>
                        <div class="product-link mt-3">
                          <form action="" method="post">
                            <input type="hidden" name="c_id" value='<?php echo $uploads['contest_id'] ?>'>
                            <input type="hidden" name="type" value='voter'>

                            <?php
                            global $v;
                            $votes = array();
                            while ($vot = mysqli_fetch_assoc($check_voted)) {
                              array_push($votes, $vot['contest_id']);
                              if (in_array($uploads['contest_id'], $votes)) {
                                $v = 1;
                              } else {
                                $v = 0;
                              }
                            }
                            if ($v == 1) {
                            ?>

                              <div class='mb-2'>
                                <button type="button" class="add-cart" style='color:red'><i class="ti-star ml-2 mb-1"></i>تم التصويت على هذا العمل</button>
                              </div>
                            <?php
                            } else {
                            ?>
                              <div class='mb-2'>
                                <button type="submit" class="add-cart btn-outline-success" name='vote'><i class="ti-star ml-2 mb-1"></i>تصويت كأفضل عمل</button>

                              </div>
                            <?php
                            }

                            ?>
                          </form>
                        </div>
                        <?php } elseif (isset($_SESSION['merchant_id'])) {
                        $check_voted_merchant = mysqli_query($conn, "SELECT voted,merchant_id,user_contest_id from voters_active_contest where merchant_id='{$_SESSION['merchant_id']}'");

                        $merchant_active = mysqli_query($conn, "SELECT active from merchants where merchant_id='{$_SESSION['merchant_id']}'");
                        $checked = mysqli_fetch_assoc($merchant_active);
                        if ($checked['active'] == 1) { ?>

                          <div class="product-link mt-3">
                            <form action="" method="post">
                              <input type="hidden" name="c_id" value='<?php echo $uploads['contest_id'] ?>'>
                              <input type="hidden" name="type" value='merchant'>
                              <?php
                              global $v;
                              $votes_merchants = array();
                              while ($vot = mysqli_fetch_assoc($check_voted_merchant)) {
                                array_push($votes_merchants, $vot['user_contest_id']);
                                if (in_array($uploads['contest_id'], $votes_merchants)) {
                                  $v = 1;
                                } else {
                                  $v = 0;
                                }
                              }
                              if ($v == 1) {
                              ?>

                                <div class='mb-2'>
                                  <button type="button" class="add-cart" style='color:red'><i class="ti-star ml-2 mb-1"></i>تم التصويت على هذا العمل</button>
                                </div>
                              <?php
                              } else {
                              ?>
                                <div class='mb-2'>
                                  <button type="submit" class="add-cart btn-outline-success" name='vote'><i class="ti-star ml-2 mb-1"></i>تصويت كأفضل عمل</button>

                                </div>
                              <?php
                              }

                              ?>
                            </form>
                          </div>
                        <?php
                        } else { ?>
                          <div class="product-link mt-3">
                            <a href="voter_register.php" class='add-cart'><i class="ti-star ml-2 mb-1"></i> تسجيل حساب للتصويت</a>
                          </div>
                        <?php
                        }

                        ?>

                        <?php  } elseif (isset($_SESSION['sponsor_id'])) {
                        $check_voted_sponsor = mysqli_query($conn, "SELECT voted,sponsor_id,user_contest_id from voters_active_contest where sponsor_id='{$_SESSION['sponsor_id']}'");

                        $sponsor_active = mysqli_query($conn, "SELECT active from sponsors where sponsor_id='{$_SESSION['sponsor_id']}'");
                        $checked = mysqli_fetch_assoc($sponsor_active);
                        if ($checked['active'] == 1) { ?>

                          <div class="product-link mt-3">
                            <form action="" method="post">
                              <input type="hidden" name="c_id" value='<?php echo $uploads['contest_id'] ?>'>
                              <input type="hidden" name="type" value='sponsor'>
                              <?php
                              global $v;
                              $votes_sponsors = array();
                              while ($vot = mysqli_fetch_assoc($check_voted_sponsor)) {
                                array_push($votes_sponsors, $vot['user_contest_id']);
                                if (in_array($uploads['contest_id'], $votes_sponsors)) {
                                  $v = 1;
                                } else {
                                  $v = 0;
                                }
                              }
                              if ($v == 1) {
                              ?>

                                <div class='mb-2'>
                                  <button type="button" class="add-cart" style='color:red'><i class="ti-star ml-2 mb-1"></i>تم التصويت على هذا العمل</button>
                                </div>
                              <?php
                              } else {
                              ?>
                                <div class='mb-2'>
                                  <button type="submit" class="add-cart btn-outline-success" name='vote'><i class="ti-star ml-2 mb-1"></i>تصويت كأفضل عمل</button>
                                </div>
                              <?php
                              }

                              ?>
                            </form>
                          </div>
                        <?php
                        } else { ?>
                          <div class="product-link mt-3">
                            <a href="voter_register.php" class='add-cart'><i class="ti-star ml-2 mb-1"></i> تسجيل حساب للتصويت</a>
                          </div>
                        <?php

                        }
                      } elseif (isset($_SESSION['user_id'])) {
                        $check_voted_user = mysqli_query($conn, "SELECT voted,user_id,user_contest_id from voters_active_contest where user_id='{$_SESSION['user_id']}'");
                        $user_active = mysqli_query($conn, "SELECT active from users where user_id='{$_SESSION['user_id']}'");
                        $checked = mysqli_fetch_assoc($user_active);

                        if ($checked['active'] == 1) { ?>

                          <div class="product-link mt-3">
                            <form action="" method="post">
                              <input type="hidden" name="c_id" value='<?php echo $uploads['contest_id'] ?>'>
                              <input type="hidden" name="type" value='user'>
                              <?php
                              global $v;
                              global $belongs;
                              $votes_users = array();
                              $checkbelong = array();
                              while ($vot = mysqli_fetch_assoc($check_voted_user)) {
                                array_push($votes_users, $vot['user_contest_id']);
                                if (in_array($uploads['contest_id'], $votes_users)) {
                                  $v = 1;
                                } else {
                                  $v = 0;
                                }
                              }
                              $check_user = mysqli_query($conn, "SELECT upload_file from user_contest where user_id='{$_SESSION['user_id']}'");
                              while ($row = mysqli_fetch_assoc($check_user)) {
                                array_push($checkbelong, $uploads['upload_file']);
                                if (in_array($row['upload_file'], $checkbelong)) {
                                  $belongs = 1;
                                } else {
                                  $belongs = 0;
                                }
                              }
                              if ($belongs == 1) { ?>
                                <div class='mb-2'>
                                  <button type="button" class="add-cart" style='color:red'><i class="ti-star ml-2 mb-1"></i>لا يمكن التصويت على هذا العمل</button>
                                </div>
                              <?php
                              } elseif ($v == 0) { ?>

                                <div class='mb-2'>
                                  <button type="submit" class="add-cart btn-outline-success" name='vote'><i class="ti-star ml-2 mb-1"></i>تصويت كأفضل عمل</button>
                                </div>
                              <?php
                              } elseif ($v == 1) {

                              ?>
                                <div class='mb-2'>
                                  <button type="button" class="add-cart" style='color:red'><i class="ti-star ml-2 mb-1"></i>تم التصويت على هذا العمل</button>
                                </div>
                              <?php
                              }
                              ?>
                            </form>
                          </div>
                        <?php
                        } else {  ?>
                          <div class="product-link mt-3">
                            <a href="voter_register.php" class='add-cart'><i class="ti-star ml-2 mb-1"></i> تسجيل حساب للتصويت</a>
                          </div>
                        <?php
                        }
                      } else { ?>
                        <div class="product-link mt-3">
                          <a href="voter_register.php" class='add-cart'><i class="ti-star ml-2 mb-1"></i> تسجيل حساب للتصويت</a>
                        </div>

                      <?php
                      }
                      ?>

                    </div>
                  </div>
                </div>

            <?php
              endwhile;
            }
            ?>
          </div>

          <nav aria-label="..." class="mt-8">
            <ul class="pagination">
              <li class="page-item mr-auto <?php if ($pageno <= 1) {
                                              echo 'disabled';
                                            }   ?>"> <a class=" page-link" href=" <?php if ($pageno <= 1) {
                                                                                    echo 'disabled';
                                                                                  } else {
                                                                                    echo "?pageno=" . ($pageno - 1);
                                                                                  } ?>">الصفحة السابقة</a>

              </li>
              <li class="page-item ml-auto <?php if ($pageno >= $total_pages_s) {
                                              echo 'disabled';
                                            }   ?>"> <a class=" page-link" href="<?php if ($pageno >= $total_pages_s) {
                                                                                    echo '#';
                                                                                  } else {
                                                                                    echo "?pageno=" . ($pageno + 1);
                                                                                  } ?>">الصفحة التالية</a>
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
                      <div class="form-group">
                        <input type="file" name='contest_file' class='form-control' required>
                        <!-- <small class='text-danger'>ملاحظة</small><br> -->
                      </div>
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