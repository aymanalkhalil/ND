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
    $check_email = "SELECT user_email from users where user_email='$email'";
    $check_email_result = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($check_email_result) > 0) {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Sorry Email is Exist !! </h4>
                </div>
               ";
    } else {
        $query = "INSERT INTO users(user_name,user_email,user_password,user_mobile,user_address,active,admin_id,user_desc)VALUES
        ('$name','$email','$password','$mobile','$address','$active',{$_SESSION['admin_id']},'لا يوجد وصف للحساب')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            $error = " <div class='alert alert-success text-center alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> User Added  Successfully ! - تم اضافة مستخدم جديد</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'manage_users.php';
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
    $user_id = $_POST['user_id'];
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

    $query = "UPDATE users SET user_name='$edit_name',user_email='$edit_email',user_password='$edit_password'
        ,user_mobile='$edit_mobile',user_address='$edit_address',active='$active' WHERE user_id='$user_id'";


    $result = mysqli_query($conn, $query);
    if ($result) {
        $error = " <div class='alert alert-success text-center alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> User Edited Successfully ! - تم تعديل بيانات المستخدم </h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'manage_users.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible text-center'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Update !!" . mysqli_error($conn) . " </h4>
                </div>
               ";
    }
}


if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];

    $query = "DELETE FROM users where user_id='$user_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $error = " <div class='alert alert-success text-center alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> User Deleted Successfully ! - تم حذف بيانات المستخدم</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'manage_users.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible text-center'>
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
            Manage Users - اضافة مستخدمين

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active"> Manage Users - اضافة مستخدمين</li>
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
                        <h3 class="box-title">Add User - اضافة مستخدمين</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action='' method="POST" role="form">
                        <div class="box-body">
                            <div class="form-group col-lg-6">
                                <label for="exampleInputEmail1">Username - الاسم</label>
                                <input type="text" class="form-control" name="name" autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">User Email - البريد الالكتروني</label>
                                <input type="email" class="form-control" name='email' autocomplete="off" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">User Password - كلمة السر</label>
                                <input type="password" class="form-control" name='password' autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">User Mobile - رقم الجوال</label>
                                <input type="text" id='mask' class="form-control" name='mobile' autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Address - العنوان</label>
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
                            <button type="submit" name='add' class="btn btn-success col-md-12">Add User - اضافة مستخدم </button>
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
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Users Information - بيانات المستخدمين</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="content">
                        <div class="box-body table-responsive no-padding">

                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User password</th>
                                    <th>User Mobile</th>
                                    <th>Address</th>
                                    <?php
                                    if ($_SESSION['is_super'] == 1) {
                                    ?>
                                        <th>Admin name</th>

                                    <?php
                                    }
                                    ?>

                                    <th>Active</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                if ($_SESSION['is_super'] == 1) {
                                    $query = "SELECT * FROM users left JOIN admin on users.admin_id=admin.admin_id  ORDER BY user_id DESC";
                                } else {

                                    $query = "SELECT * FROM users  where admin_id={$_SESSION['admin_id']} ORDER BY user_id DESC";
                                }
                                $result = mysqli_query($conn, $query);

                                $i = 1;
                                if (mysqli_num_rows($result) == 0) {
                                    echo "<tr><td colspan='9' class='btn btn-danger col-md-12'> No Users Found ! - لا يوجد مستخدمين</td></tr>";
                                } else {


                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['active'] == '1') {
                                            $style = "'btn btn-success'";
                                        } else {
                                            $style = "'btn btn-danger'";
                                        }

                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>

                                            <td><?php echo $row['user_name']  ?></td>
                                            <td><?php echo $row['user_email']  ?></td>
                                            <td><?php echo $row['user_password']  ?></td>
                                            <td><?php echo $row['user_mobile'] ?></td>
                                            <td><?php echo $row['user_address'] ?></td>
                                            <?php
                                            if ($_SESSION['is_super'] == 1) {
                                            ?>
                                                <td class='text-primary text-center '><?php echo $row['admin_name'] != '' ? $row['admin_name']  : 'تسجيل من الموقع العام ' ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td class=<?php echo  $style ?> style=" width:145px;margin:10px;"><?php echo $row['active'] == '1' ? 'Active - مفعل ' : 'Not Active -  غير مفعل'  ?></td>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $i ?>">
                                                    <i class="fa fa-edit"></i>

                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h5 class="modal-title " id="exampleModalLabel">Edit Admin Information</h5>
                                                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">

                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <label for="">Edit Username</label>
                                                                        <input type="text" name='edit_name' class="form-control" value="<?php echo $row['user_name'] ?>" autocomplete="off" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Edit User Email</label>
                                                                        <input type="text" name='edit_email' class="form-control" value="<?php echo $row['user_email'] ?>" autocomplete="off" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Edit User Password</label>
                                                                        <input type="text" name='edit_password' class="form-control" value="<?php echo $row['user_password'] ?>" autocomplete="off" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Edit User Mobile</label>
                                                                        <input type="text" name='edit_mobile' class="form-control" value="<?php echo $row['user_mobile'] ?>" autocomplete="off" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Edit User Address</label>
                                                                        <input type="text" name="edit_address" value="<?php echo $row['user_address'] ?>" class="form-control">
                                                                    </div>

                                                                    <div class="checkbox btn-lg">
                                                                        <label>
                                                                            <input type="checkbox" name='active' value="1" <?php echo $row['active'] == '1' ? 'checked' : '' ?>> Active
                                                                        </label>
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']  ?>">
                                                                <button type="submit" name='update' class="btn btn-primary col-md-12 ">Update User Information</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal22<?php echo $i ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                                <div class="modal fade" id="exampleModal22<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-red">
                                                                <h5 class="modal-title text-center text-bold" id="exampleModalLabel">تأكيد حذف المستخدم</h5>
                                                                <button type="button" class="close bg-light" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <p class='text-danger text-center font-weight-bold'>هل انت متأكد من الحذف ؟</p>

                                                                </div>

                                                            </div>
                                                            <form action='' method="POST" role="form">

                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                                                                    <button type="button" class="btn btn-dark col-md-6" data-dismiss="modal">إلغاء الحذف</button>
                                                                    <button type="submit" name='delete' class="btn btn-danger col-md-5">تأكيد الحذف </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

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



<?php include_once('includes/footer.php') ?>