<?php
include_once('includes/header.php');

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($_POST['super'])) {
        $super = '0';
    } else {
        $super = '1';
    }
    $check_email = "SELECT admin_email from admin where admin_email='$email'";
    $check_email_result = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($check_email_result) > 0) {
        $error = " <div class='alert alert-danger text-center alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Sorry Email is Exist !! </h4>
                </div>
               ";
    } else {
        $query = "INSERT INTO admin(admin_name,admin_email,admin_password,is_super)VALUES
        ('$name','$email','$password','$super')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            $error = " <div class='alert alert-success text-center alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> Admin Added Successfully ! - تم اضافة الادمن </h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'add_admin.php';
             }, 2000);</script>";
        } else {
            $error = " <div class='alert alert-danger alert-dismissible text-center'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Insert !! </h4>
                </div>
               ";
        }
    }
}
if (isset($_POST['update'])) {
    $admin_id = $_POST['admin_id'];
    $edit_name = $_POST['edit_name'];
    $edit_email = $_POST['edit_email'];
    $edit_password = $_POST['edit_password'];



    if (empty($_POST['super'])) {
        $super = '0';
    } else {
        $super = '1';
    }
    // var_dump($_POST);die;

    $query = "UPDATE admin SET admin_name='$edit_name',admin_email='$edit_email',admin_password='$edit_password'
        ,is_super='$super' WHERE admin_id='$admin_id'";


    $result = mysqli_query($conn, $query);
    if ($result) {
        $error = " <div class='alert alert-success alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> Admin Edited Successfully ! - تم تعديل بيانات الادمن</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'add_admin.php';
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
    $admin_id = $_POST['admin_id'];

    $query = "DELETE FROM admin where admin_id='$admin_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $error = " <div class='alert alert-success alert-dismissible'>
                 <h4><i class='icon fa fa-check'></i> Admin Deleted Successfully ! - تم حذف بيانات الادمن</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'add_admin.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Delete !!</h4>
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
            Add Admin - اضافة ادمن جديد
            <!-- <small>Preview</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Add Admin - اضافة ادمن جديد </li>
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
                        <h3 class="box-title">Add Admin </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action='' method="POST" role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Admin Name - الاسم</label>
                                <input type="text" class="form-control" name="name" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Admin Email - البريد الالكتروني</label>
                                <input type="email" class="form-control" name='email' autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Admin Password - كلمة السر</label>
                                <input type="password" class="form-control" name='password' autocomplete="off" required>
                            </div>


                            <div class="checkbox btn-lg">
                                <label>
                                    <input type="checkbox" name='super' value="1"> Full Authorization - صلاحيات كاملة
                                </label>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name='add' class="btn btn-success col-md-12">Add Admin - اضافة الادمن </button>
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
                        <h3 class="box-title">Admin Information - بيانات الادمن</h3>
                    </div>

                    <section class="content">
                        <div class="box-body table-responsive no-padding">

                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>Admin Name</th>
                                    <th>Admin Email</th>
                                    <th>Admin password</th>
                                    <th>Super</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php

                                $query = "SELECT * FROM admin ORDER BY admin_id DESC";
                                $result = mysqli_query($conn, $query);

                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['is_super'] == '1') {
                                        $style = "'btn btn-success'";
                                    } else {
                                        $style = "'btn btn-danger'";
                                    }

                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>

                                        <td><?php echo $row['admin_name']  ?></td>
                                        <td><?php echo $row['admin_email']  ?></td>
                                        <td><?php echo $row['admin_password']  ?></td>


                                        <td class=<?php echo  $style ?>style=" width:145px;margin:10px;"><?php echo $row['is_super'] == '1' ? ' صلاحيات كاملة' : ' صلاحية الاضافة والارفاق'  ?></td>







                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $i ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <div class="modal fade" id="exampleModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title text-center" id="exampleModalLabel">Edit Admin Information - تعديل بيانات الادمن</h5>
                                                            <button type="button" class="close bg-light" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="">Edit Admin name -تعديل الاسم</label>
                                                                    <input type="text" name='edit_name' class="form-control" value="<?php echo $row['admin_name'] ?>" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Edit Admin Email -تعديل البريد الالكتروني</label>
                                                                    <input type="text" name='edit_email' class="form-control" value="<?php echo $row['admin_email'] ?>" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Edit Admin Password -تعديل كلمة السر</label>
                                                                    <input type="text" name='edit_password' class="form-control" value="<?php echo $row['admin_password'] ?>" autocomplete="off" required>
                                                                </div>



                                                                <div class="checkbox btn-lg">
                                                                    <label>
                                                                        <input type="checkbox" name='super' value="1" <?php echo $row['is_super'] == '1' ? 'checked' : '' ?>> Full Authorized - صلاحيات كاملة
                                                                    </label>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="admin_id" value="<?php echo $row['admin_id'] ?>">
                                                            <button type="submit" name='update' class="btn btn-primary col-md-12 ">Update Admin Information - تعديل بيانات الادمن</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="admin_id" value="<?php echo $row['admin_id'] ?>">
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






<?php include_once('includes/footer.php');
?>