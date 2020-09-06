<?php include_once('includes/header.php');
// ini_set('max_execution_time', 0); // 0 = Unlimited
if (isset($_POST['add'])) {

    // $radio = $_POST['r2'];

    $path = '../uploads/';
    $file_name = $_FILES['upload_file']['name'];
    $tmp_name = $_FILES['upload_file']['tmp_name'];
    $file_ext = time() . strtolower($file_name);
    move_uploaded_file($tmp_name, $path . $file_ext);

    if (empty($_POST['r2'])) {

        $upload_query = "INSERT INTO uploads_admin(upload_file_admin,upload_for_all,admin_id)VALUES('$file_ext',1,{$_SESSION['admin_id']})";
    } elseif ($_POST['r2'] == '1') {
        $upload_query = "INSERT INTO uploads_admin(upload_file_admin,upload_for_all,for_merchants,admin_id)VALUES('$file_ext',0,1,{$_SESSION['admin_id']})";
    } elseif ($_POST['r2'] == '2') {
        $upload_query = "INSERT INTO uploads_admin(upload_file_admin,upload_for_all,for_sponsors,admin_id)VALUES('$file_ext',0,1,{$_SESSION['admin_id']})";
    } elseif ($_POST['r2'] == '3') {
        $upload_query = "INSERT INTO uploads_admin(upload_file_admin,upload_for_all,for_users,admin_id)VALUES('$file_ext',0,1,{$_SESSION['admin_id']})";
    }
    $result_upload = mysqli_query($conn, $upload_query);

    if ($result_upload) {
        $error = " <div class='alert alert-success alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> Contest Added Successfully ! - تم اضافة مسابقة جديدة</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'add_new_contest.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Insert !! </h4>
                </div>
               ";
    }
}


if (isset($_POST['update'])) {
    $upload_id = $_POST['upload_id'];
    if ($_FILES['update_file']['error'] == 0) {

        $get_old = "SELECT upload_file_admin FROM uploads_admin where upload_admin_id='$upload_id'";
        $result = mysqli_query($conn, $get_old);
        $old_file = mysqli_fetch_assoc($result);


        $path = '../uploads/';
        unlink($path . $old_file['upload_file_admin']);
        $file_name = $_FILES['update_file']['name'];
        $tmp_name = $_FILES['update_file']['tmp_name'];
        $file_ext = time() . strtolower($file_name);
        move_uploaded_file($tmp_name, $path . $file_ext);
        if (empty($_POST['r5'])) {
            $update = "UPDATE uploads_admin SET upload_file_admin='$file_ext',upload_for_all=1,admin_id={$_SESSION['admin_id']}  WHERE upload_admin_id='$upload_id'";
        } elseif ($_POST['r5'] == '1') {
            $update = "UPDATE uploads_admin SET upload_file_admin='$file_ext',upload_for_all=0,for_merchants=1,for_users=0,for_sponsors=0,admin_id={$_SESSION['admin_id']} WHERE upload_admin_id='$upload_id'";
        } elseif ($_POST['r5'] == '2') {
            $update = "UPDATE uploads_admin SET upload_file_admin='$file_ext',upload_for_all=0,for_users=0,for_merchants=0,for_sponsors=1,admin_id={$_SESSION['admin_id']}   WHERE upload_admin_id='$upload_id'";
        } elseif ($_POST['r5'] == '3') {
            $update = "UPDATE uploads_admin SET upload_file_admin='$file_ext',upload_for_all=0,for_users=1,for_merchants=0,for_sponsors=0,admin_id={$_SESSION['admin_id']}  WHERE upload_admin_id='$upload_id'";
        }
    } else {
        if (empty($_POST['r5'])) {
            $update = "UPDATE uploads_admin SET upload_for_all=1,admin_id={$_SESSION['admin_id']}  WHERE upload_admin_id='$upload_id'";
        } elseif ($_POST['r5'] == '1') {
            $update = "UPDATE uploads_admin SET upload_for_all=0,for_merchants=1,for_users=0,for_sponsors=0,admin_id={$_SESSION['admin_id']}  WHERE upload_admin_id='$upload_id'";
        } elseif ($_POST['r5'] == '2') {
            $update = "UPDATE uploads_admin SET upload_for_all=0,for_users=0,for_merchants=0,for_sponsors=1,admin_id={$_SESSION['admin_id']}   WHERE upload_admin_id='$upload_id'";
        } elseif ($_POST['r5'] == '3') {
            $update = "UPDATE uploads_admin SET upload_for_all=0,for_users=1,for_merchants=0,for_sponsors=0,admin_id={$_SESSION['admin_id']}  WHERE upload_admin_id='$upload_id'";
        }
    }

    $result_update = mysqli_query($conn, $update);

    if ($result_update) {
        $error = " <div class='alert alert-success alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> Contest Updated Successfully ! - تم تعديل بيانات المسابقة</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'add_new_contest.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Update !! </h4>
                </div>
               ";
    }
}
if (isset($_POST['delete'])) {
    $upload_id = $_POST['upload_id'];
    $get_old = "SELECT upload_file_admin FROM uploads_admin where upload_admin_id='$upload_id'";
    $result = mysqli_query($conn, $get_old);
    $old_file = mysqli_fetch_assoc($result);
    $path = '../uploads/';
    unlink($path . $old_file['upload_file_admin']);

    $delete = "DELETE FROM uploads_admin WHERE upload_admin_id='$upload_id'";
    $result_delete = mysqli_query($conn, $delete);
    if ($result_delete) {
        $error = " <div class='alert alert-success alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> Contest Deleted Successfully ! - تم حذف بيانات المسابقة</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'add_new_contest.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Delete !! </h4>
                </div>
               ";
    }
}


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Contenst - اضافة مسابقة جديدة
            <!-- <small>Preview</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Manage Contest - اضافة مسابقة</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <?php
                if (isset($error)) {
                    echo $error;
                }

                ?>
                <!-- general form elements -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload Contest - اضافة مسابقة جديدة</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action='' method="POST" role="form" enctype="multipart/form-data">
                        <div class="box-body">

                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Upload File Or Image Or Audio </label>
                                <input type="file" class="form-control" name='upload_file' autocomplete="off" required>
                            </div>
                            <!-- radio -->

                            <div class=" form-group col-lg-6">
                                <label for="M">
                                    <input type="radio" id="M" name="r2" value='1' class="minimal-red">
                                    Contest For Merchants - المسابقة موجهة الى التجار

                                </label><br>

                                <label for='S'><br>

                                    <input type="radio" id='S' name="r2" value='2' class="minimal-red">
                                    Contest For Sponsors - المسابقة موجهة الى الرعاة

                                </label>

                                <label for='U'><br>

                                    <input type="radio" id='U' name="r2" value='3' class="minimal-red">
                                    Contest For Users - المسابقة موجهة الى المستخدمين

                                </label>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name='add' class="btn btn-success col-xs-12">Add Contenst - اضافة مسابقة جديدة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Contest Information - بيانات المسابقة</h3>
                    </div>

                    <section class="content">
                        <div class="box-body table-responsive no-padding">

                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>File Data</th>
                                    <th>Contest For</th>
                                    <?php
                                    if ($_SESSION['is_super'] == 1) {
                                    ?>
                                        <th>Uploaded By</th>
                                    <?php
                                    }
                                    ?>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                if ($_SESSION['is_super'] == 1) {
                                    $query = "SELECT admin.admin_id,admin.admin_name,
                                    uploads_admin.upload_admin_id,
                                    uploads_admin.upload_for_all,
                                    uploads_admin.for_merchants,
                                    uploads_admin.for_users,
                                    uploads_admin.for_sponsors,
                                    uploads_admin.admin_id,
                                    uploads_admin.upload_file_admin
                                    FROM uploads_admin inner join admin
                                    on uploads_admin.admin_id=admin.admin_id
                                    ORDER BY upload_admin_id DESC";
                                } else {
                                    $query = "SELECT * FROM uploads_admin where admin_id={$_SESSION['admin_id']} ORDER BY upload_admin_id DESC";
                                }
                                $result = mysqli_query($conn, $query);

                                $i = 1;
                                if (mysqli_num_rows($result) == 0) {
                                    echo "<tr><td colspan='6' class='btn btn-danger col-12 text-center'> No Records Found - لم تتم اضافة مسابقات بعد</td></tr>";
                                } else {

                                    while ($row = mysqli_fetch_assoc($result)) {

                                        if ($row['upload_for_all'] == '1') {

                                            $style = "'btn btn-success'";
                                        }

                                        if ($row['for_users'] == '1') {

                                            $style = "'btn btn-primary'";
                                        }
                                        if ($row['for_merchants'] == 1) {
                                            $style = "'btn bg-purple margin'";
                                        }
                                        if ($row['for_sponsors'] == 1) {
                                            $style = "'btn bg-maroon margin'";
                                        }


                                        $file_from_db = $row['upload_file_admin'];

                                        $allowed_types = array('mp3', 'mp4', 'png', 'jpeg', 'jpg', 'svg', '3gp', 'mov');

                                        $check_type = explode(".", $file_from_db);
                                        switch (end($check_type)) {
                                            case 'png':
                                            case 'jpeg':
                                            case 'jpg':
                                            case 'svg':
                                                $type = 'image';
                                                break;
                                            case 'mp4':
                                            case 'mov':
                                            case '3gp':
                                                $type = 'video';
                                                break;
                                            case 'mp3':
                                            case 'm4a':
                                                $type = 'audio';
                                                break;

                                            default:
                                                echo 'undefined';
                                                break;
                                        }

                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>

                                            <td>
                                                <?php

                                                if ($type == 'image') {

                                                ?>
                                                    <img src="../uploads/<?php echo $row['upload_file_admin'] ?>" width='250px' alt="" srcset="">
                                                <?php
                                                } elseif ($type == 'video') {
                                                ?>
                                                    <video width="320" controls>
                                                        <source src="../uploads/<?php echo $row['upload_file_admin'] ?>" width="200px">
                                                    </video>
                                                <?php
                                                } elseif ($type == 'audio') {
                                                ?>
                                                    <audio controls style="margin-top: 51px">
                                                        <source src=" ../uploads/<?php echo $row['upload_file_admin'] ?>"> </audio>
                                                <?php
                                                } else {
                                                   echo "";
                                                }
                                                ?> </td>
                                            <td colspan='2' class=<?php echo $style ?>style=" width:180px;margin:10px;margin-top: 70px;">
                                                <?php
                                                global $display;
                                                if ($row['for_users'] == 1) {
                                                    $display = "المسابقة موجهة للمستخدمين";
                                                } elseif ($row['for_merchants'] == 1) {
                                                    $display = "المسابقة موجهة للتجار";
                                                } elseif ($row['for_sponsors'] == 1) {
                                                    $display = "المسابقة موجهة للرعاة";
                                                } elseif ($row['upload_for_all'] == '1') {
                                                    $display = " المسابقة موجهة للجميع ";
                                                }
                                                echo $display;

                                                ?>


                                            </td>
                                            <?php
                                            if ($_SESSION['is_super'] == 1) {
                                            ?>
                                                <td class="text-primary" style='padding-top: 75px;'><?php echo $row['admin_name'] ?></td>
                                            <?php
                                            }
                                            ?>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" style='margin:10px;margin-top: 62px' class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $i ?>">
                                                    <i class="fa fa-edit"></i>

                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning">
                                                                <h5 class="modal-title " id="exampleModalLabel">Edit Contest Information</h5>
                                                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">

                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <label for="">Edit File - تعديل الملف المرفق</label>
                                                                        <input type="file" name='update_file' class="form-control" autocomplete="off">
                                                                    </div>
                                                                    <?php

                                                                    if ($type == 'image') {

                                                                    ?>

                                                                        <div class="form-group">
                                                                            <label for="" class='text-center'>Old File - الصورة الحالية</label><br>

                                                                            <img src="../uploads/<?php echo $row['upload_file_admin'] ?>" width='350px' alt="" srcset="">
                                                                        </div>

                                                                    <?php
                                                                    } elseif ($type == 'video') {
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <label for="">Old File - الفيديو الحالي</label><br>
                                                                            <video width="320" controls>
                                                                                <source class='form-control' src="../uploads/<?php echo $row['upload_file_admin'] ?>" width="200px">
                                                                            </video>
                                                                        </div>

                                                                    <?php
                                                                    } elseif ($type == 'audio') {
                                                                    ?>
                                                                        <label for="">Old File - مقطع الصوت الحالي</label><br>
                                                                        <audio controls>
                                                                            <source src="../uploads/<?php echo $row['upload_file_admin'] ?>">
                                                                        </audio>
                                                                    <?php
                                                                    } else {
                                                                       echo "";
                                                                    }

                                                                    ?>

                                                                    <div class="form-group">
                                                                        <label for="m<?php echo $i ?>">
                                                                            <input type="radio" id="m<?php echo $i ?>" name="r5" value='1' <?php echo $row['for_merchants'] == '1' ? 'checked' : "" ?> class="minimal-red">
                                                                            Contest For Merchants - المسابقة موجهة الى التجار

                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for='s<?php echo $i ?>'>
                                                                            <input type="radio" id='s<?php echo $i ?>' name="r5" value='2' <?php echo $row['for_sponsors'] == '1' ? 'checked' : "" ?> class="minimal-red">
                                                                            Contest For Sponsors - المسابقة موجهة الى الرعاة

                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for='u<?php echo $i ?>'>
                                                                            <input type="radio" id='u<?php echo $i ?>' name="r5" value='3' <?php echo $row['for_users'] == '1' ? 'checked' : "" ?> class="minimal-red">
                                                                            Contest For Users - المسابقة موجهة الى المستخدمين
                                                                        </label>
                                                                    </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="upload_id" value="<?php echo $row['upload_admin_id'] ?>">
                                                                <button type="submit" name='update' class="btn btn-warning col-xs-12 ">Update Contest Information - تعديل معلومات المسابقة</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    <input type="hidden" name="upload_id" value="<?php echo $row['upload_admin_id'] ?>">
                                                    <button type='submit' name='delete' style='margin:10px;margin-top: 62px' class='btn btn-danger'><i class="fa fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>


                                <?php
                                        $i++;
                                    }
                                }
                                ?>
                            </table>

                        </div>
                    </section>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

</div>

<?php include_once('includes/footer.php'); ?>
<script>
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
</script>