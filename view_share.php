<?php include_once('includes/header.php');
if (!isset($_SESSION['user_id']) && !isset($_SESSION['merchant_id']) && !isset($_SESSION['sponsor_id'])) {

    echo "<script>window.location.href='index.php'</script>";
}
if (isset($_POST['edit'])) {
    $allowed_types = array('mp3', 'mp4', 'png', 'jpeg', 'jpg', 'svg', '3gp', 'mov');
    if ($_POST['type'] == 'merchants') {
        //case comment with file
        if (!empty($_POST['message']) && $_FILES['upload']['error'] == 0) {
            $path = 'assets/upload_merchants/';
            $delete_old_m = mysqli_query($conn, "SELECT upload_merchant_file from uploads_merchants where upload_merchant_id='{$_GET['me']}'");
            $m_info = mysqli_fetch_assoc($delete_old_m);
            unlink($path . $m_info['upload_merchant_file']);
            $message = $_POST['message'];
            $file_name = strtolower($_FILES['upload']['name']);
            $type = explode('.', $file_name);
            if (in_array(end($type), $allowed_types)) {
                $tmp_name = $_FILES['upload']['tmp_name'];
                $file_ext = time() . strtolower($file_name);
                move_uploaded_file($tmp_name, $path . $file_ext);
                $update_share_m = mysqli_query($conn, "UPDATE uploads_merchants SET
                merchant_id='{$_SESSION['merchant_id']}',upload_merchant_file='$file_ext',upload_merchant_description='$message'
                 WHERE upload_merchant_id='{$_GET['me']}'");
                if ($update_share_m) {
                    $success =
                        "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?me={$_GET['me']}';
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
            // case comment without file
        } elseif (!empty($_POST['message']) && $_FILES['upload']['error'] == 4) {
            $message = $_POST['message'];
            $update_share_m = mysqli_query($conn, "UPDATE uploads_merchants SET
                merchant_id='{$_SESSION['merchant_id']}',upload_merchant_description='$message'
                 WHERE upload_merchant_id='{$_GET['me']}'");
            if ($update_share_m) {
                $success =
                    "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?me={$_GET['me']}';
                       }, 2000);</script>";
            } else {
                $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
            }
            //case comment with file
        } elseif (empty($_POST['message']) && $_FILES['upload']['error'] == 0) {
            $path = 'assets/upload_merchants/';
            //get old image and delete it
            $delete_old_m = mysqli_query($conn, "SELECT upload_merchant_file from uploads_merchants where upload_merchant_id='{$_GET['me']}'");
            $m_info = mysqli_fetch_assoc($delete_old_m);

            unlink($path . $m_info['upload_merchant_file']);
            $file_name = strtolower($_FILES['upload']['name']);
            $type = explode('.', $file_name);
            //check allowed types
            if (in_array(end($type), $allowed_types)) {
                $tmp_name = $_FILES['upload']['tmp_name'];
                $file_ext = time() . strtolower($file_name);
                move_uploaded_file($tmp_name, $path . $file_ext);
                //update without message
                $update_share_m = mysqli_query($conn, "UPDATE uploads_merchants SET
                merchant_id='{$_SESSION['merchant_id']}',upload_merchant_file='$file_ext'
                 WHERE upload_merchant_id='{$_GET['me']}'");
                if ($update_share_m) {
                    $success =
                        "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?me={$_GET['me']}';
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
        } else {
            $success =
                "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?me={$_GET['me']}';
                       }, 2000);</script>";
        }
    } elseif ($_POST['type'] == 'users') {
        // case comment with file
        if (!empty($_POST['message']) && $_FILES['upload']['error'] == 0) {
            $path = 'assets/upload_users/';

            $delete_old_u = mysqli_query($conn, "SELECT upload_user_file from uploads_users where upload_user_id='{$_GET['us']}'");
            $u_info = mysqli_fetch_assoc($delete_old_u);

            unlink($path . $u_info['upload_user_file']);
            $message = $_POST['message'];

            $file_name = strtolower($_FILES['upload']['name']);
            $type = explode('.', $file_name);
            if (in_array(end($type), $allowed_types)) {
                $tmp_name = $_FILES['upload']['tmp_name'];
                $file_ext = time() . strtolower($file_name);
                move_uploaded_file($tmp_name, $path . $file_ext);
                $update_share_u = mysqli_query($conn, "UPDATE uploads_users SET
                user_id='{$_SESSION['user_id']}',upload_user_file='$file_ext',upload_user_description='$message'
                 WHERE upload_user_id='{$_GET['us']}'");
                if ($update_share_u) {
                    $success =
                        "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?us={$_GET['us']}';
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
            // case comment without file
        } elseif (!empty($_POST['message']) && $_FILES['upload']['error'] == 4) {
            $message = $_POST['message'];
            $update_share_u = mysqli_query($conn, "UPDATE uploads_users SET
                user_id='{$_SESSION['user_id']}',upload_user_description='$message'
                 WHERE upload_user_id='{$_GET['us']}'");
            if ($update_share_u) {
                $success =
                    "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?us={$_GET['us']}';
                       }, 2000);</script>";
            } else {
                $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
            }
            //case comment with file
        } elseif (empty($_POST['message']) && $_FILES['upload']['error'] == 0) {
            $path = 'assets/upload_users/';
            //get old image and delete it
            $delete_old_u = mysqli_query($conn, "SELECT upload_user_file from uploads_users where upload_user_id='{$_GET['us']}'");
            $u_info = mysqli_fetch_assoc($delete_old_u);

            unlink($path . $u_info['upload_user_file']);
            $file_name = strtolower($_FILES['upload']['name']);
            $type = explode('.', $file_name);
            //check allowed types
            if (in_array(end($type), $allowed_types)) {
                $tmp_name = $_FILES['upload']['tmp_name'];
                $file_ext = time() . strtolower($file_name);
                move_uploaded_file($tmp_name, $path . $file_ext);
                //update without message
                $update_share_u = mysqli_query($conn, "UPDATE uploads_users SET
                user_id='{$_SESSION['user_id']}',upload_user_file='$file_ext'
                 WHERE upload_user_id='{$_GET['us']}'");
                if ($update_share_u) {
                    $success =
                        "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?us={$_GET['us']}';
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
        } else {
            $success =
                "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?us={$_GET['us']}';
                       }, 2000);</script>";
        }
    } elseif ($_POST['type'] == 'sponsors') {
        // case comment with file
        if (!empty($_POST['message']) && $_FILES['upload']['error'] == 0) {
            $path = 'assets/upload_sponsors/';

            $delete_old_s = mysqli_query($conn, "SELECT upload_sponsor_file from uploads_sponsors where upload_sponsor_id='{$_GET['sp']}'");
            $s_info = mysqli_fetch_assoc($delete_old_s);

            unlink($path . $s_info['upload_sponsor_file']);
            $message = $_POST['message'];

            $file_name = strtolower($_FILES['upload']['name']);
            $type = explode('.', $file_name);
            if (in_array(end($type), $allowed_types)) {
                $tmp_name = $_FILES['upload']['tmp_name'];
                $file_ext = time() . strtolower($file_name);
                move_uploaded_file($tmp_name, $path . $file_ext);
                $update_share_s = mysqli_query($conn, "UPDATE uploads_sponsors SET
                sponsor_id='{$_SESSION['sponsor_id']}',upload_sponsor_file='$file_ext',upload_sponsor_description='$message'
                 WHERE upload_sponsor_id='{$_GET['sp']}'");
                if ($update_share_s) {
                    $success =
                        "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?sp={$_GET['sp']}';
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
            // case comment without file
        } elseif (!empty($_POST['message']) && $_FILES['upload']['error'] == 4) {
            $message = $_POST['message'];
            $update_share_s = mysqli_query($conn, "UPDATE uploads_sponsors SET
                sponsor_id='{$_SESSION['sponsor_id']}',upload_sponsor_description='$message'
                 WHERE upload_sponsor_id='{$_GET['sp']}'");
            if ($update_share_s) {
                $success =
                    "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?sp={$_GET['sp']}';
                       }, 2000);</script>";
            } else {
                $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
            }
            //case comment with file
        } elseif (empty($_POST['message']) && $_FILES['upload']['error'] == 0) {
            $path = 'assets/upload_sponsors/';
            //get old image and delete it
            $delete_old_s = mysqli_query($conn, "SELECT upload_sponsor_file from uploads_sponsors where upload_sponsor_id='{$_GET['sp']}'");
            $s_info = mysqli_fetch_assoc($delete_old_s);

            unlink($path . $s_info['upload_sponsor_file']);
            $file_name = strtolower($_FILES['upload']['name']);
            $type = explode('.', $file_name);
            //check allowed types
            if (in_array(end($type), $allowed_types)) {
                $tmp_name = $_FILES['upload']['tmp_name'];
                $file_ext = time() . strtolower($file_name);
                move_uploaded_file($tmp_name, $path . $file_ext);
                //update without message
                $update_share_s = mysqli_query($conn, "UPDATE uploads_sponsors SET
                sponsor_id='{$_SESSION['sponsor_id']}',upload_sponsor_file='$file_ext'
                 WHERE upload_sponsor_id='{$_GET['sp']}'");
                if ($update_share_s) {
                    $success =
                        "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?sp={$_GET['sp']}';
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
        } else {
            $success =
                "<div class='alert alert-success text-center mt-2 alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-check'></i> تم تعديل المشاركة بنجاح! </h4>
              </div>
                           <script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'view_share.php?sp={$_GET['sp']}';
                       }, 2000);</script>";
        }
    }
}

switch (key($_GET)) {
    case 'me':
        if (key($_SESSION) != 'merchant_id') {
            echo "<script>window.location.href='my-account.php'</script>";
        }
        $share_id = $_GET['me'];
        $share_m = "SELECT * from uploads_merchants WHERE upload_merchant_id=$share_id";
        $result_m = mysqli_query($conn, $share_m);
        if (mysqli_num_rows($result_m) == 0) {
            echo "<script>window.location.href='my-account.php'</script>";
        }
        break;
    case 'sp';
        if (key($_SESSION) != 'sponsor_id') {
            echo "<script>window.location.href='my-account.php'</script>";
        }
        $share_id = $_GET['sp'];
        $share_s = "SELECT * from uploads_sponsors WHERE upload_sponsor_id=$share_id";
        $result_s = mysqli_query($conn, $share_s);
        if (mysqli_num_rows($result_s) == 0) {
            echo "<script>window.location.href='my-account.php'</script>";
        }
        break;

    case 'us';
        if (key($_SESSION) != 'user_id') {
            echo "<script>window.location.href='my-account.php'</script>";
        }
        $share_id = $_GET['us'];
        $share_u = "SELECT * from uploads_users WHERE upload_user_id=$share_id";
        $result_u = mysqli_query($conn, $share_u);
        if (mysqli_num_rows($result_u) == 0) {
            echo "<script>window.location.href='my-account.php'</script>";
        }
        break;
    default:
        echo "<script>window.location.href='my-account.php'</script>";
        break;
}

if (isset($_GET['sp_id'])) {
    $share_s_id = $_GET['sp_id'];
    $path = 'assets/upload_sponsors/';

    $delete_old_s = mysqli_query($conn, "SELECT upload_sponsor_file from uploads_sponsors where upload_sponsor_id='$share_s_id'");
    $s_info = mysqli_fetch_assoc($delete_old_s);
    unlink($path . $s_info['upload_sponsor_file']);

    $delete_s_data = mysqli_query($conn, "DELETE from uploads_sponsors where upload_sponsor_id='$share_s_id'");
    if ($delete_s_data) {
        echo "<script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'my-account.php?s=1';
                       }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
    }
} elseif (isset($_GET['us_id'])) {

    $share_u_id = $_GET['us_id'];
    $path = 'assets/upload_users/';

    $delete_old_u = mysqli_query($conn, "SELECT upload_user_file from uploads_users where upload_user_id='$share_u_id'");
    $user_info = mysqli_fetch_assoc($delete_old_u);
    unlink($path . $user_info['upload_user_file']);
    $delete_u_data = mysqli_query($conn, "DELETE from uploads_users where upload_user_id='$share_u_id'");
    if ($delete_u_data) {
        echo "<script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'my-account.php?s=1';
                       }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
    }
} elseif (isset($_GET['m_id'])) {

    $share_m_id = $_GET['m_id'];
    $path = 'assets/upload_merchants/';

    $delete_old_m = mysqli_query($conn, "SELECT upload_merchant_file from uploads_merchants where upload_merchant_id='$share_m_id'");
    $merchant_info = mysqli_fetch_assoc($delete_old_m);
    unlink($path . $merchant_info['upload_merchant_file']);
    $delete_m_data = mysqli_query($conn, "DELETE from uploads_merchants where upload_merchant_id='$share_m_id'");
    if ($delete_m_data) {

                           echo "<script type='text/Javascript'>
                       window.setTimeout(function() {
                       window.location.href = 'my-account.php?s=1';
                       }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <h4><i class='icon fa fa-ban'></i>عذراً حدث خطأ يرجى المحاولة لاحقاً</h4>
              </div>";
    }
}

?>
<!--hero section start-->
<section class="position-relative">
    <div id="particles-js"></div>
    <div class="container">
        <div class="row  text-center">
            <div class="col">
                <h1>تفاصيل المشاركة</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a class="text-dark" href="index.php">الرئيسية</a>
                        </li>

                        <li class="breadcrumb-item active text-success" aria-current="page">عرض تفاصيل المشاركة</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- <style>
    .position-absolute {
        position: relative !important;
    }
</style> -->
<?php
if (isset($success)) {
    echo $success;
}
if (isset($error)) {
    echo $error;
}
?>

<?php if (key($_GET) == 'me') {

    $info_m = mysqli_fetch_assoc($result_m);
    $typeArr = explode('.', $info_m['upload_merchant_file']);
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

        <section class='col-lg-12'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="owl-carousel" data-items="1" data-autoplay="true">
                            <div class="item">
                                <img class="img-fluid w-100" src="assets/upload_merchants/<?php echo $info_m['upload_merchant_file']  ?>" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <h2 class="title">الصورة المرفقة</h2>
                        <ul class="cases-meta list-unstyled text-muted">
                            <li class="mb-3"><span class="text-dark"> التعليق المرفق: </span> <?php echo $info_m['upload_merchant_description'] == '' ? 'لا يوجد تعليق مرفق مع الصورة' : $info_m['upload_merchant_description']  ?></li>
                            <li class="mb-3"><span class="text-danger"> لحذف المشاركة : </span> <a href="view_share.php?m_id=<?php echo $info_m['upload_merchant_id'] ?>" class="delete" onclick="return confirm('هل أنت متاكد من حذف هذه المشاركة؟')">اضغط هنا</a>
                            </li>
                            <li class="mb-3"><span class="text-dark"> ملاحظة: </span> لتعديل المشاركة يرجى ارفاق المشاركة الجديدة في نموذج التعديل أدناه.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="mb-5 text-center">
                            <span class="badge badge-primary-soft p-2">
                                <i class="la la-bold ic-3x rotation"></i>
                            </span>
                            <h2 class="mt-4 mb-0 text-info">نموذج تعديل المشاركة المرفقة</h2>
                            <!-- <p class="lead mb-0 text-center text-info">نموذج تعديل المشاركة المرفقة</p> -->
                        </div>
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="">تعديل الملف المرفق</label>
                                <input type="file" dir='rtl' name="upload" class="form-control">
                                <small class='text-danger'>ملاحظة : لا يشترط ارفاق ملف جديد في حال رغبتك في تعديل التعليق فقط.</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">اضافة تعليق (ليست اجبارية)</label>
                                <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <input type="hidden" name="type" value='merchants'>

                                <button type="submit" name='edit' class="btn btn-outline-success btn-block"><span>تعديل المشاركة</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php } elseif ($type == 'video') { ?>
        <section class='col-lg-12'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="owl-carousel" data-items="1" data-autoplay="true">
                            <div class="item">
                                <video class="img-fluid w-100" controls>
                                    <source src="assets/upload_merchants/<?php echo $info_m['upload_merchant_file']  ?>">
                                </video>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <h2 class="title">الفيديو المرفق</h2>
                        <ul class="cases-meta list-unstyled text-muted">
                            <li class="mb-3"><span class="text-dark"> التعليق المرفق: </span> <?php echo $info_m['upload_merchant_description'] == '' ? 'لا يوجد تعليق مرفق مع الفيديو' : $info_m['upload_merchant_description']  ?></li>
                            <li class="mb-3"><span class="text-danger"> لحذف المشاركة : </span> <a href="view_share.php?m_id=<?php echo $info_m['upload_merchant_id'] ?>" class="delete" onclick="return confirm('هل أنت متاكد من حذف هذه المشاركة؟')">اضغط هنا</a>
                            </li>
                            <li class="mb-3"><span class="text-dark"> ملاحظة: </span> لتعديل المشاركة يرجى ارفاق المشاركة الجديدة في نموذج التعديل أدناه.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="mb-5 text-center">
                            <span class="badge badge-primary-soft p-2">
                                <i class="la la-bold ic-3x rotation"></i>
                            </span>
                            <h2 class="mt-4 mb-0 text-info">نموذج تعديل المشاركة المرفقة</h2>
                            <!-- <p class="lead mb-0 text-center text-info">نموذج تعديل المشاركة المرفقة</p> -->
                        </div>
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="">تعديل الملف المرفق</label>
                                <input type="file" dir='rtl' name="upload" class="form-control">
                                <small class='text-danger'>ملاحظة : لا يشترط ارفاق ملف جديد في حال رغبتك في تعديل التعليق فقط.</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">اضافة تعليق (ليست اجبارية)</label>
                                <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <input type="hidden" name="type" value='merchants'>

                                <button type="submit" name='edit' class="btn btn-outline-success btn-block"><span>تعديل المشاركة</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } elseif ($type == 'audio') { ?>
        <section class='col-lg-12'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="owl-carousel" data-items="1" data-autoplay="true">

                            <div class="item">
                                <audio controls class="img-center w-100">
                                    <source src="assets/upload_merchants/<?php echo $info_m['upload_merchant_file']  ?>">
                                </audio>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <h2 class="title">الملف الصوتي المرفق</h2>
                        <ul class="cases-meta list-unstyled text-muted">
                            <li class="mb-3"><span class="text-dark"> التعليق المرفق: </span> <?php echo $info_m['upload_merchant_description'] == '' ? 'لا يوجد تعليق مرفق مع المقطع الصوتي' : $info_m['upload_merchant_description']  ?></li>
                            <li class="mb-3"><span class="text-danger"> لحذف المشاركة : </span> <a href="view_share.php?m_id=<?php echo $info_m['upload_merchant_id'] ?>" class="delete" onclick="return confirm('هل أنت متاكد من حذف هذه المشاركة؟')">اضغط هنا</a>
                            </li>
                            <li class="mb-3"><span class="text-dark"> ملاحظة: </span> لتعديل المشاركة يرجى ارفاق المشاركة الجديدة في نموذج التعديل أدناه.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="mb-5 text-center">
                            <span class="badge badge-primary-soft p-2">
                                <i class="la la-bold ic-3x rotation"></i>
                            </span>
                            <h2 class="mt-4 mb-0 text-info">نموذج تعديل المشاركة المرفقة</h2>
                            <!-- <p class="lead mb-0 text-center text-info">نموذج تعديل المشاركة المرفقة</p> -->
                        </div>
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="">تعديل الملف المرفق</label>
                                <input type="file" dir='rtl' name="upload" class="form-control">
                                <small class='text-danger'>ملاحظة : لا يشترط ارفاق ملف جديد في حال رغبتك في تعديل التعليق فقط.</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">اضافة تعليق (ليست اجبارية)</label>
                                <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <input type="hidden" name="type" value='merchants'>

                                <button type="submit" name='edit' class="btn btn-outline-success btn-block"><span>تعديل المشاركة</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
} elseif (key($_GET) == 'us') {

    $info_u = mysqli_fetch_assoc($result_u);
    $typeArr = explode('.', $info_u['upload_user_file']);
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

        <section class='col-lg-12'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="owl-carousel" data-items="1" data-autoplay="true">
                            <div class="item">
                                <img class="img-fluid w-100" src="assets/upload_users/<?php echo $info_u['upload_user_file']  ?>" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <h2 class="title">الصورة المرفقة</h2>
                        <ul class="cases-meta list-unstyled text-muted">
                            <li class="mb-3"><span class="text-dark"> التعليق المرفق: </span> <?php echo $info_u['upload_user_description'] == '' ? 'لا يوجد تعليق مرفق مع الصورة' : $info_u['upload_user_description']  ?></li>
                            <li class="mb-3"><span class="text-danger"> لحذف المشاركة : </span><a href="view_share.php?us_id=<?php echo $info_u['upload_user_id'] ?>" class="delete" onclick="return confirm('هل أنت متاكد من حذف هذه المشاركة؟')">اضغط هنا</a>
                            </li>
                            <li class="mb-3"><span class="text-dark"> ملاحظة: </span> لتعديل المشاركة يرجى ارفاق المشاركة الجديدة في نموذج التعديل أدناه.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="mb-5 text-center">
                            <span class="badge badge-primary-soft p-2">
                                <i class="la la-bold ic-3x rotation"></i>
                            </span>
                            <h2 class="mt-4 mb-0 text-info">نموذج تعديل المشاركة المرفقة</h2>
                            <!-- <p class="lead mb-0 text-center text-info">نموذج تعديل المشاركة المرفقة</p> -->
                        </div>
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="">تعديل الملف المرفق</label>
                                <input type="file" dir='rtl' name="upload" class="form-control">
                                <small class='text-danger'>ملاحظة : لا يشترط ارفاق ملف جديد في حال رغبتك في تعديل التعليق فقط.</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">اضافة تعليق (ليست اجبارية)</label>
                                <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <input type="hidden" name="type" value='users'>

                                <button type="submit" name='edit' class="btn btn-outline-success btn-block"><span>تعديل المشاركة</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php } elseif ($type == 'video') { ?>
        <section class='col-lg-12'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="owl-carousel" data-items="1" data-autoplay="true">
                            <div class="item">
                                <video class="img-center w-100" controls>
                                    <source src="assets/upload_users/<?php echo $info_u['upload_user_file'] ?>">
                                </video>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <h2 class="title">الفيديو المرفق</h2>
                        <ul class="cases-meta list-unstyled text-muted">
                            <li class="mb-3"><span class="text-dark"> التعليق المرفق: </span> <?php echo $info_u['upload_user_description'] == '' ? 'لا يوجد تعليق مرفق مع الفيديو' : $info_u['upload_user_description']  ?></li>
                            <li class="mb-3"><span class="text-danger"> لحذف المشاركة : </span> <a href="view_share.php?us_id=<?php echo $info_u['upload_user_id'] ?>" class="delete" onclick="return confirm('هل أنت متاكد من حذف هذه المشاركة؟')">اضغط هنا</a>
                            </li>
                            <li class="mb-3"><span class="text-dark"> ملاحظة: </span> لتعديل المشاركة يرجى ارفاق المشاركة الجديدة في نموذج التعديل أدناه.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="mb-5 text-center">
                            <span class="badge badge-primary-soft p-2">
                                <i class="la la-bold ic-3x rotation"></i>
                            </span>
                            <h2 class="mt-4 mb-0 text-info">نموذج تعديل المشاركة المرفقة</h2>
                            <!-- <p class="lead mb-0 text-center text-info">نموذج تعديل المشاركة المرفقة</p> -->
                        </div>
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="">تعديل الملف المرفق</label>
                                <input type="file" dir='rtl' name="upload" class="form-control">
                                <small class='text-danger'>ملاحظة : لا يشترط ارفاق ملف جديد في حال رغبتك في تعديل التعليق فقط.</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">اضافة تعليق (ليست اجبارية)</label>
                                <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <input type="hidden" name="type" value='users'>

                                <button type="submit" name='edit' class="btn btn-outline-success btn-block"><span>تعديل المشاركة</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    <?php } elseif ($type == 'audio') { ?>
        <section class='col-lg-12'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="owl-carousel" data-items="1" data-autoplay="true">
                            <div class="item">
                                <audio controls class="img-center w-100">
                                    <source src="assets/upload_users/<?php echo $info_u['upload_user_file']  ?>">
                                </audio>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <h2 class="title">الملف الصوتي المرفق</h2>
                        <ul class="cases-meta list-unstyled text-muted">
                            <li class="mb-3"><span class="text-dark"> التعليق المرفق: </span> <?php echo $info_u['upload_user_description'] == '' ? 'لا يوجد تعليق مرفق مع المقطع الصوتي' : $info_u['upload_user_description']  ?></li>
                            <li class="mb-3"><span class="text-danger"> لحذف المشاركة : </span> <a href="view_share.php?us_id=<?php echo $info_u['upload_user_id'] ?>" class="delete" onclick="return confirm('هل أنت متاكد من حذف هذه المشاركة؟')">اضغط هنا</a>
                            </li>
                            <li class="mb-3"><span class="text-dark"> ملاحظة: </span> لتعديل المشاركة يرجى ارفاق المشاركة الجديدة في نموذج التعديل أدناه.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="mb-5 text-center">
                            <span class="badge badge-primary-soft p-2">
                                <i class="la la-bold ic-3x rotation"></i>
                            </span>
                            <h2 class="mt-4 mb-0 text-info">نموذج تعديل المشاركة المرفقة</h2>
                            <!-- <p class="lead mb-0 text-center text-info">نموذج تعديل المشاركة المرفقة</p> -->
                        </div>
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="">تعديل الملف المرفق</label>
                                <input type="file" dir='rtl' name="upload" class="form-control">
                                <small class='text-danger'>ملاحظة : لا يشترط ارفاق ملف جديد في حال رغبتك في تعديل التعليق فقط.</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">اضافة تعليق (ليست اجبارية)</label>
                                <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <input type="hidden" name="type" value='users'>

                                <button type="submit" name='edit' class="btn btn-outline-success btn-block"><span>تعديل المشاركة</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
} elseif (key($_GET) == 'sp') {
    $info_s = mysqli_fetch_assoc($result_s);
    $typeArr = explode('.', $info_s['upload_sponsor_file']);
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
        <section class='col-lg-12'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="owl-carousel" data-items="1" data-autoplay="true">
                            <div class="item">
                                <img class="img-fluid w-100" src="assets/upload_sponsors/<?php echo $info_s['upload_sponsor_file']  ?>" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <h2 class="title">الصورة المرفقة</h2>
                        <ul class="cases-meta list-unstyled text-muted">
                            <li class="mb-3"><span class="text-dark"> التعليق المرفق: </span> <?php echo $info_s['upload_sponsor_description'] == '' ? 'لا يوجد تعليق مرفق مع الصورة' : $info_s['upload_sponsor_description']  ?></li>
                            <li class="mb-3"><span class="text-danger"> لحذف المشاركة : </span> <a href="view_share.php?sp_id=<?php echo $info_s['upload_sponsor_id'] ?>" class="delete" onclick="return confirm('هل أنت متاكد من حذف هذه المشاركة؟')">اضغط هنا</a>
                            </li>
                            <li class="mb-3"><span class="text-dark"> ملاحظة: </span> لتعديل المشاركة يرجى ارفاق المشاركة الجديدة في نموذج التعديل أدناه.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="mb-5 text-center">
                            <span class="badge badge-primary-soft p-2">
                                <i class="la la-bold ic-3x rotation"></i>
                            </span>
                            <h2 class="mt-4 mb-0 text-info">نموذج تعديل المشاركة المرفقة</h2>
                            <!-- <p class="lead mb-0 text-center text-info">نموذج تعديل المشاركة المرفقة</p> -->
                        </div>
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="">تعديل الملف المرفق</label>
                                <input type="file" dir='rtl' name="upload" class="form-control">
                                <small class='text-danger'>ملاحظة : لا يشترط ارفاق ملف جديد في حال رغبتك في تعديل التعليق فقط.</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">اضافة تعليق (ليست اجبارية)</label>
                                <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <input type="hidden" name="type" value='sponsors'>

                                <button type="submit" name='edit' class="btn btn-outline-success btn-block"><span>تعديل المشاركة</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    <?php } elseif ($type == 'video') { ?>
        <section class='col-lg-12'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="owl-carousel" data-items="1" data-autoplay="true">
                            <div class="item">
                                <video class="img-center w-100" controls>
                                    <source src="assets/upload_sponsors/<?php echo $info_s['upload_sponsor_file'] ?>">
                                </video>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <h2 class="title">الفيديو المرفق</h2>
                        <ul class="cases-meta list-unstyled text-muted">
                            <li class="mb-3"><span class="text-dark"> التعليق المرفق: </span> <?php echo $info_s['upload_sponsor_description'] == '' ? 'لا يوجد تعليق مرفق مع الفيديو' : $info_s['upload_sponsor_description']  ?></li>
                            <li class="mb-3"><span class="text-danger"> لحذف المشاركة : </span> <a href="view_share.php?sp_id=<?php echo $info_s['upload_sponsor_id'] ?>" class="delete" onclick="return confirm('هل أنت متاكد من حذف هذه المشاركة؟')">اضغط هنا</a>
                            </li>
                            <li class="mb-3"><span class="text-dark"> ملاحظة: </span> لتعديل المشاركة يرجى ارفاق المشاركة الجديدة في نموذج التعديل أدناه.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="mb-5 text-center">
                            <span class="badge badge-primary-soft p-2">
                                <i class="la la-bold ic-3x rotation"></i>
                            </span>
                            <h2 class="mt-4 mb-0 text-info">نموذج تعديل المشاركة المرفقة</h2>
                            <!-- <p class="lead mb-0 text-center text-info">نموذج تعديل المشاركة المرفقة</p> -->
                        </div>
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="">تعديل الملف المرفق</label>
                                <input type="file" dir='rtl' name="upload" class="form-control">
                                <small class='text-danger'>ملاحظة : لا يشترط ارفاق ملف جديد في حال رغبتك في تعديل التعليق فقط.</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">اضافة تعليق (ليست اجبارية)</label>
                                <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <input type="hidden" name="type" value='sponsors'>

                                <button type="submit" name='edit' class="btn btn-outline-success btn-block"><span>تعديل المشاركة</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    <?php } elseif ($type == 'audio') { ?>
        <section class='col-lg-12'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="owl-carousel" data-items="1" data-autoplay="true">
                            <div class="item">
                                <audio controls class="img-center w-100">
                                    <source src="assets/upload_sponsors/<?php echo $info_s['upload_sponsor_file']  ?>">
                                </audio>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <h2 class="title">الملف الصوتي المرفق</h2>
                        <ul class="cases-meta list-unstyled text-muted">
                            <li class="mb-3"><span class="text-dark"> التعليق المرفق: </span> <?php echo $info_s['upload_sponsor_description'] == '' ? 'لا يوجد تعليق مرفق مع المقطع الصوتي' : $info_s['upload_sponsor_description']  ?></li>
                            <li class="mb-3"><span class="text-danger"> لحذف المشاركة : </span> <a href="view_share.php?sp_id=<?php echo $info_s['upload_sponsor_id'] ?>" class="delete" onclick="return confirm('هل أنت متاكد من حذف هذه المشاركة؟')">اضغط هنا</a>
                            </li>
                            <li class="mb-3"><span class="text-dark"> ملاحظة: </span> لتعديل المشاركة يرجى ارفاق المشاركة الجديدة في نموذج التعديل أدناه.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="mb-5 text-center">
                            <span class="badge badge-primary-soft p-2">
                                <i class="la la-bold ic-3x rotation"></i>
                            </span>
                            <h2 class="mt-4 mb-0 text-info">نموذج تعديل المشاركة المرفقة</h2>
                            <!-- <p class="lead mb-0 text-center text-info">نموذج تعديل المشاركة المرفقة</p> -->
                        </div>
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="">تعديل الملف المرفق</label>
                                <input type="file" dir='rtl' name="upload" class="form-control">
                                <small class='text-danger'>ملاحظة : لا يشترط ارفاق ملف جديد في حال رغبتك في تعديل التعليق فقط.</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">اضافة تعليق (ليست اجبارية)</label>
                                <textarea name="message" dir='rtl' class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <input type="hidden" name="type" value='sponsors'>

                                <button type="submit" name='edit' class="btn btn-outline-success btn-block"><span>تعديل المشاركة</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
<?php }
} ?>

<!--portfolio end-->

</div>

<!--body content end-->

<?php include_once('includes/footer.php');
?>