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
    $check_email = "SELECT merchant_email from merchants where merchant_email='$email'";
    $check_email_result = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($check_email_result) > 0) {
        $error = " <div class='alert alert-danger text-center alert-dismissible text-center'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Sorry Email is Exist !! - البريد الالكتروني مسجل بالفعل ! </h4>
                </div>
               ";
    } else {
        $query = "INSERT INTO merchants(merchant_name,merchant_email,merchant_password,merchant_mobile,merchant_address,active,merchant_desc)VALUES
        ('$name','$email','$password','$mobile','$address','$active','لا يوجد وصف للحساب')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            $error = " <div class='alert alert-success alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> Merchant Added Successfully ! - تم إضافة التاجر بنجاح</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'manage_merchants.php';
             }, 2000);</script>";
        } else {
            $error = " <div class='alert alert-danger alert-dismissible text-center'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Insert !! - عذراً حدث خطأ يرجى المحاولة لاحقاً " . mysqli_error($conn) . "</h4>
                </div>
               ";
        }
    }
}

if (isset($_POST['update'])) {
    $merchant_id = $_POST['merchant_id'];
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

    $query = "UPDATE merchants SET merchant_name='$edit_name',merchant_email='$edit_email',merchant_password='$edit_password'
        ,merchant_mobile='$edit_mobile',merchant_address='$edit_address',active='$active' WHERE merchant_id='$merchant_id'";


    $result = mysqli_query($conn, $query);
    if ($result) {
        $error = " <div class='alert alert-success alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> Merchant Edited Successfully ! - تم تعديل بيانات التاجر بنجاح</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'manage_merchants.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible text-center'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Update !! - عذراً حدث خطأ بتحديث البيانات </h4>
                </div>
               ";
    }
}


if (isset($_POST['delete'])) {
    $merchant_id = $_POST['merchant_id'];

    $query = "DELETE FROM merchants where merchant_id='$merchant_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $error = " <div class='alert alert-success alert-dismissible text-center'>
                 <h4><i class='icon fa fa-check'></i> Merchant Deleted Successfully ! - تم حذف بيانات التاجر بنجاح</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'manage_merchants.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible text-center'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Delete !! - عذراً حدث خطأ بحذف البيانات </h4>
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
            Manage Merchant - اضافة تجار جدد

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Manage Merchant - اضافة تجار</li>
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
                        <h3 class="box-title">Add Merchant Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action='' method="POST" role="form">
                        <div class="box-body">
                            <div class="form-group col-lg-6">
                                <label for="exampleInputEmail1">Merchant Name - الاسم</label>
                                <input type="text" class="form-control" name="name" autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Merchant Email - البريد الالكتروني</label>
                                <input type="email" class="form-control" name='email' autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Merchant Password - كلمة السر</label>
                                <input type="password" class="form-control" name='password' autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Merchant Mobile - رقم الجوال</label>
                                <input type="text" id='mask' class="form-control" name='mobile' autocomplete="off" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputPassword1">Merchant Address - العنوان</label>
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
                            <button type="submit" name='add' class="btn btn-success col-md-12">Add Merchant - اضافة تاجر </button>
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
                        <h3 class="box-title">Merchant Information - بيانات التجار</h3>
                        <div class="box-tools">
                            <form action="" method="post">
                                <div class="input-group input-group-sm hidden-xs" style="width: 250px;">
                                    <input type="text" name="table_search" value="<?php echo isset($_POST['search']) ? $_POST['table_search'] : "" ?>" class="form-control pull-right" placeholder="ادخل رقم الهاتف او الاسم">



                                    <div class="input-group-btn">

                                        <button type="submit" name='search' class="btn btn-default"><i class="fa fa-search"></i></button>

                                    </div>

                                </div>

                            </form>
                            <?php if (isset($_POST['search'])) { ?>
                                <a href="" class='text-danger font-weight-bold'>اعادة تعيين الجدول</a>
                            <?php } ?>

                        </div>
                    </div>

                    <section class="content">
                        <div class="box-body table-responsive no-padding">

                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>Merchant Name</th>
                                    <th>Merchant Email</th>
                                    <!-- <th>merchant password</th> -->
                                    <th>Merchant Mobile</th>
                                    <th>Merchant Address</th>
                                    <th>Active</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                if (isset($_POST['search'])) {
                                    $query = "SELECT * FROM merchants WHERE merchant_name LIKE '%{$_POST['table_search']}%' or merchant_mobile LIKE '%{$_POST['table_search']}%'";
                                } else {

                                    $query = "SELECT * FROM merchants ORDER BY merchant_id DESC";
                                }
                                $result = mysqli_query($conn, $query);

                                $i = 1;
                                if (mysqli_num_rows($result) == 0) {
                                    echo "<tr><td colspan='8' class='col-md-12 text-center btn btn-danger'> ! لم يتم العثور على نتائج </td></tr>";
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

                                            <td><?php echo $row['merchant_name']  ?></td>
                                            <td><?php echo $row['merchant_email']  ?></td>
                                            <!-- <td><?php echo $row['merchant_password']  ?></td> -->
                                            <td><?php echo $row['merchant_mobile'] ?></td>
                                            <td><?php echo $row['merchant_address'] ?></td>
                                            <td class=<?php echo  $style ?> style=" width:145px;margin:10px;"><?php echo $row['active'] == '1' ? 'Active - مفعل' : 'Not Active - غير مفعل'  ?></td>

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
                                                                <h5 class="modal-title " id="exampleModalLabel">Edit Merchant Information - تعديل بيانات التاجر</h5>
                                                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">

                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <label for="">Edit merchant name - تعديل الاسم</label>
                                                                        <input type="text" name='edit_name' class="form-control" value="<?php echo $row['merchant_name'] ?>" autocomplete="off" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Edit merchant Email - تعديل البريد الالكتروني</label>
                                                                        <input type="text" name='edit_email' class="form-control" value="<?php echo $row['merchant_email'] ?>" autocomplete="off" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Edit merchant Password - تعديل كلمة السر</label>
                                                                        <input type="text" name='edit_password' class="form-control" value="<?php echo $row['merchant_password'] ?>" autocomplete="off" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Edit merchant Mobile - تعديل رقم الجوال</label>
                                                                        <input type="text" name='edit_mobile' class="form-control" value="<?php echo $row['merchant_mobile'] ?>" autocomplete="off" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Edit merchant Address - تعديل العنوان</label>
                                                                        <input type="text" name="edit_address" value="<?php echo $row['merchant_address'] ?>" class="form-control">
                                                                    </div>

                                                                    <div class="checkbox btn-lg">
                                                                        <label>
                                                                            <input type="checkbox" name='active' value="1" <?php echo $row['active'] == '1' ? 'checked' : '' ?>> Active - مفعل
                                                                        </label>
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="merchant_id" value="<?php echo $row['merchant_id'] ?>">
                                                                <button type="submit" name='update' class="btn btn-primary col-md-12 ">Update Merchant Information - تعديل بيانات التاجر</button>
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
                                                                <h5 class="modal-title text-center text-bold" id="exampleModalLabel">تأكيد حذف التاجر</h5>
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
                                                                    <input type="hidden" name="merchant_id" value="<?php echo $row['merchant_id'] ?>">
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