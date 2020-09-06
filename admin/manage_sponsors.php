<?php
include_once('includes/header.php');

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    if (empty($_POST['active'])) {
        $active = '0';
    } else {
        $active = '1';
    }
    $check_email = "SELECT sponsor_email from sponsors where sponsor_email='$email'";
    $check_email_result = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($check_email_result) > 0) {
        $error = " <div class='alert alert-danger text-center alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Sorry Email is Exist !! </h4>
                </div>
               ";
    } else {
        $query = "INSERT INTO sponsors(sponsor_name,sponsor_email,sponsor_password,sponsor_mobile,sponsor_address,active)VALUES
        ('$name','$email','$password','$mobile','$address','$active')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            $error = " <div class='alert alert-success text-center alert-dismissible'>
                 <h4><i class='icon fa fa-check'></i> Sponsor Added Successfully ! - تم اضافة بيانات الراعي</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'manage_sponsors.php';
             }, 2000);</script>";
        } else {
            $error = " <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Insert !! </h4>
                </div>
               ";
        }
    }
}

if (isset($_POST['update'])) {
    $sponsor_id = $_POST['sponsor_id'];
    $edit_name = $_POST['edit_name'];
    $edit_email = $_POST['edit_email'];
    $edit_password = $_POST['edit_password'];
    $edit_address = $_POST['edit_address'];
    $edit_mobile = $_POST['edit_mobile'];


    if (empty($_POST['active'])) {
        $active = '0';
    } else {
        $active = '1';
    }
    // var_dump($_POST);die;

    $query = "UPDATE sponsors SET sponsor_name='$edit_name',sponsor_email='$edit_email',sponsor_password='$edit_password'
        ,sponsor_mobile='$edit_mobile',sponsor_address='$edit_address',active='$active' WHERE sponsor_id='$sponsor_id'";


    $result = mysqli_query($conn, $query);
    if ($result) {
        $error = " <div class='alert alert-success text-center alert-dismissible'>
                 <h4><i class='icon fa fa-check'></i> Sponsor Edited Successfully ! - تم تعديل بيانات الراعي</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'manage_sponsors.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Update !!" . mysqli_error($conn) . " </h4>
                </div>
               ";
    }
}


if (isset($_POST['delete'])) {
    $sponsor_id = $_POST['sponsor_id'];

    $query = "DELETE FROM sponsors where sponsor_id='$sponsor_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $error = " <div class='alert alert-success text-center alert-dismissible'>
                 <h4><i class='icon fa fa-check'></i> Sponsor Deleted Successfully ! - تم حذف بيانات الراعي</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'manage_sponsors.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Delete !!" . mysqli_error($conn) . " </h4>
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
            Manage Sponsors - اضافة رعاة جدد
            <!-- <small>Preview</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Manage Sponsors - اضافة رعاة </li>
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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Sponsors Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action='' method="POST" role="form">
                        <div class="box-body">
                            <div class="form-group col-lg-6">
                                <label for="exampleInputEmail1">Sponsor Name - الاسم</label>
                                <input type="text" class="form-control" name="name" autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Sponsor Email - البريد الالكتروني</label>
                                <input type="email" class="form-control" name='email' autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Sponsor Password - كلمة السر</label>
                                <input type="password" class="form-control" name='password' autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Sponsor Mobile - رقم الجوال</label>
                                <input type="text" id='mask' class="form-control" name='mobile' autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Sponsor Address - عنوان الراعي</label>
                                <input type="text" class="form-control" name='address' autocomplete="off" required>

                            </div>

                            <div class="checkbox btn-lg col-lg-6">
                                <label>
                                    <input type="checkbox" name='active' value="1" checked> Active - مفعل
                                </label>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name='add' class="btn btn-success col-md-12">Add Sponsor - اضافة الراعي </button>
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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sponsors Information - بيانات الرعاة</h3>
                    </div>

                    <section class="content">
                        <div class="box-body table-responsive no-padding">

                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>Sponsor Name</th>
                                    <th>Sponsor Email</th>
                                    <!-- <th>Sponsor password</th> -->
                                    <th>Sponsor Mobile</th>
                                    <th>Sponsor Address</th>
                                    <th>Active</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php

                                $query = "SELECT * FROM sponsors ORDER BY sponsor_id DESC";
                                $result = mysqli_query($conn, $query);

                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['active'] == '1') {
                                        $style = "'btn btn-success'";
                                    } else {
                                        $style = "'btn btn-danger'";
                                    }

                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>

                                        <td><?php echo $row['sponsor_name']  ?></td>
                                        <td><?php echo $row['sponsor_email']  ?></td>
                                        <!-- <td><?php echo $row['sponsor_password']  ?></td> -->
                                        <td><?php echo $row['sponsor_mobile'] ?></td>
                                        <td><?php echo $row['sponsor_address'] ?></td>
                                        <td class=<?php echo  $style ?>style=" width:145px;margin:10px;"><?php echo $row['active'] == '1' ? 'Active - مفعل' : 'Not Active - غير مفعل'  ?></td>







                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $i ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <div class="modal fade" id="exampleModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title text-center" id="exampleModalLabel">Edit Sponsor Information - تعديل بيانات الراعي</h5>
                                                            <button type="button" class="close bg-light" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="">Edit sponsorname -تعديل الاسم</label>
                                                                    <input type="text" name='edit_name' class="form-control" value="<?php echo $row['sponsor_name'] ?>" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Edit sponsor Email -تعديل البريد الالكتروني</label>
                                                                    <input type="text" name='edit_email' class="form-control" value="<?php echo $row['sponsor_email'] ?>" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Edit sponsor Password -تعديل كلمة السر</label>
                                                                    <input type="text" name='edit_password' class="form-control" value="<?php echo $row['sponsor_password'] ?>" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Edit sponsor Mobile -تعديل رقم الجوال</label>
                                                                    <input type="text" name='edit_mobile' class="form-control" value="<?php echo $row['sponsor_mobile'] ?>" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Edit sponsor Address -تعديل العنوان</label>
                                                                    <input type="text" name="edit_address" value="<?php echo $row['sponsor_address'] ?>" class="form-control">
                                                                </div>

                                                                <div class="checkbox btn-lg">
                                                                    <label>
                                                                        <input type="checkbox" name='active' value="1" <?php echo $row['active'] == '1' ? 'checked' : '' ?>> Active - مفعل
                                                                    </label>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="sponsor_id" value="<?php echo $row['sponsor_id'] ?>">
                                                            <button type="submit" name='update' class="btn btn-primary col-md-12 ">Update Sponsor Information - تعديل بيانات الراعي</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="sponsor_id" value="<?php echo $row['sponsor_id'] ?>">
                                                <button type='submit' name='delete' class='btn btn-danger'><i class="fa fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>


                                <?php
                                    $i++;
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



<?php include_once('includes/footer.php') ?>