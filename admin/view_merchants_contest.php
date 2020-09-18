<?php
include_once('includes/header.php');


if (isset($_POST['delete'])) {
    $file = $_POST['file'];
    $upload_id = $_POST['upload_id'];
    unlink('../assets/upload_merchants/' . $file);

    $query = "DELETE FROM uploads_merchants where upload_merchant_id='$upload_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $error = " <div class='alert alert-success text-center alert-dismissible'>
                 <h4><i class='icon fa fa-check'></i> Share Deleted Successfully ! - تم حذف المشاركة بنجاح</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'view_merchants_contest.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Delete !! </h4>
                </div>
               ";
    }
}
if (isset($_POST['delete_contest'])) {
    $contest_id = $_POST['contest_id'];
    $file_upload = $_POST['file_upload'];
    unlink('../assets/merchant_contest_uploads/' . $file_upload);
    mysqli_query($conn, "DELETE FROM voters_active_contest where merchant_contest_id='$contest_id'");
    mysqli_query($conn, "DELETE FROM voter_merchant_contest  where m_contest_id='$contest_id'");
    $query = "DELETE FROM merchant_contest where m_contest_id='$contest_id'";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $error = " <div class='alert alert-success text-center alert-dismissible'>
                 <h4><i class='icon fa fa-check'></i> Contest Deleted Successfully ! - تم حذف العمل بنجاح</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'view_merchants_contest.php';
             }, 2000);</script>";
    } else {
        $error = " <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i>Error in Delete !! </h4>
                </div>
               ";
    }
}



if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$num_records_per_page = 6;
$offset = ($pageno - 1) * $num_records_per_page;



?>

<style>
    .pagination>li>a:focus,
    .pagination>li>a:hover,
    .pagination>li>span:focus,
    .pagination>li>span:hover {
        z-index: 2;
        color: #fff;
        background-color: #28a745;
        border-color: #ddd;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Merchants Contest & Shares - عرض اعمال ومشاركات أصحاب المنتجات

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active"> View Merchant Shares - عرض اعمال التجار
            </li>
        </ol>
    </section>


    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <?php
                if (isset($error)) {
                    echo $error;
                }

                ?>
                <div class="box box-primary">
                    <div class="box-header text-center">
                        <h3 class="box-title">Merchants Contests Shares - تفاصيل مشاركات اصحاب المنتجات</h3>
                        <!-- <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <section class="content">
                        <div class="box-body table-responsive no-padding">

                            <table class="table table-hover">
                                <tr>
                                    <th>الرقم</th>
                                    <th>اسم التاجر</th>
                                    <th>رقم الجوال</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>التعليق المرفق</th>
                                    <th>الملف المرفق</th>
                                    <th>حذف</th>
                                </tr>
                                <?php
                                $get_shares = mysqli_query($conn, "SELECT * FROM uploads_merchants INNER JOIN merchants on uploads_merchants.merchant_id=merchants.merchant_id ORDER BY upload_merchant_id DESC LIMIT $offset,$num_records_per_page");
                                if (mysqli_num_rows($get_shares) == 0) {
                                    echo "<tr><td colspan='7' class='btn btn-danger col-md-12'> ! لا يوجد مشاركات بعد</td></tr>";
                                } else {
                                    $total_user_feeds = mysqli_query($conn, "SELECT * FROM uploads_merchants");
                                    $total_rows_merc = mysqli_num_rows($total_user_feeds);
                                    $total_pages_shares_users = ceil($total_rows_merc / $num_records_per_page);

                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($get_shares)) {
                                        $typeArr = explode('.', $row['upload_merchant_file']);
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
                                        <tr>
                                            <td><?php echo $i ?></td>

                                            <td><?php echo $row['merchant_name']  ?></td>
                                            <td><?php echo $row['merchant_mobile']  ?></td>
                                            <td><?php echo $row['merchant_email']  ?></td>
                                            <td><?php echo !empty($row['upload_merchant_description']) ? $row['upload_merchant_description'] : 'لا يوجد تعليق مرفق' ?></td>
                                            <td>

                                                <?php if ($type == 'image') { ?>
                                                    <a href="../assets/upload_merchants/<?php echo $row['upload_merchant_file'] ?>">
                                                        <img src="../assets/upload_merchants/<?php echo $row['upload_merchant_file'] ?>" width="150px" alt="" srcset="">
                                                    </a>

                                                <?php } elseif ($type == 'video') { ?>
                                                    <a class="popup-img h2 text-white" href="../assets/upload_merchants/<?php echo $row['upload_merchant_file'] ?>">
                                                        <video class="img-center" width="250px" controls>
                                                            <source src="../assets/upload_merchants/<?php echo $row['upload_merchant_file'] ?>">
                                                        </video>
                                                    </a>

                                                <?php  } elseif ($type == 'audio') { ?>
                                                    <a class="popup-img h2 text-white" href="../assets/upload_merchants/<?php echo $row['upload_merchant_file'] ?>">

                                                        <audio controls class="img-center">
                                                            <source src="../assets/upload_merchants/<?php echo $row['upload_merchant_file'] ?>">
                                                        </audio>
                                                    </a>

                                                <?php   } ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $i ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                                <div class="modal fade" id="exampleModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-red">
                                                                <h5 class="modal-title text-center text-bold" id="exampleModalLabel">تأكيد حذف المشاركة</h5>
                                                                <button type="button" class="close bg-light" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <p class='text-danger text-center font-weight-bold'>هل انت متأكد من حذف هذه المشاركة ؟</p>

                                                                </div>

                                                            </div>
                                                            <form action='' method="POST" role="form">

                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="upload_id" value="<?php echo $row['upload_merchant_id'] ?>">
                                                                    <input type="hidden" name="file" value="<?php echo $row['upload_merchant_file'] ?>">
                                                                    <button type="button" class="btn btn-dark col-md-6" data-dismiss="modal">إلغاء الحذف</button>
                                                                    <button type="submit" name='delete' class="btn btn-danger col-md-5">تأكيد حذف المشاركة</button>
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

                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <li class="<?php if ($pageno <= 1) {
                                                        echo 'disabled';
                                                    }   ?>"> <a class="page-link text-primary" href="<?php if ($pageno <= 1) {
                                                                                                            echo '#';
                                                                                                        } else {
                                                                                                            echo "?pageno=" . ($pageno - 1);
                                                                                                        } ?>">الصفحة السابقة</a></li>
                                        <li class="<?php if ($pageno >= $total_pages_shares_users) {
                                                        echo 'disabled';
                                                    }   ?>"> <a class="page-link text-success" href="<?php if ($pageno >= $total_pages_shares_users) {
                                                                                                            echo '#';
                                                                                                        } else {
                                                                                                            echo "?pageno=" . ($pageno + 1);
                                                                                                        } ?>">الصفحة التالية</a></li>
                                    </ul>
                                </div>

                            </table>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header text-center">
                        <h3 class="box-title">Merchants Contests Information - تفاصيل اعمال اصحاب المنتجات</h3>
                        <!-- <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <section class="content">
                        <div class="box-body table-responsive no-padding">

                            <table class="table table-hover">
                                <tr>
                                    <th>الرقم</th>
                                    <th>اسم التاجر</th>
                                    <th>رقم الجوال</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الملف المرفق</th>
                                    <th>مجموع التصويت على العمل</th>
                                    <th>تفاصيل التصويت</th>
                                    <th>حذف</th>
                                </tr>
                                <?php

                                $contest_information = mysqli_query($conn, "SELECT * FROM merchant_contest INNER JOIN merchants on merchant_contest.merchant_id=merchants.merchant_id
                                ORDER BY m_contest_id DESC LIMIT $offset,$num_records_per_page ");


                                if (mysqli_num_rows($contest_information) == 0) {
                                    echo "<tr><td colspan='9' class='btn btn-danger col-md-12'>! لا يوجد أعمال مرفقة بعد </td></tr>";
                                } else {
                                    $i = 1;
                                    $total_user_contest = mysqli_query($conn, "SELECT * FROM merchant_contest");
                                    $total_rows_user = mysqli_num_rows($total_user_contest);
                                    $total_pages_contest_users = ceil($total_rows_user / $num_records_per_page);

                                    while ($all_contests = mysqli_fetch_assoc($contest_information)) {
                                        $typeArr = explode('.', $all_contests['upload_file']);
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
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $all_contests['merchant_name']  ?></td>
                                            <td><?php echo $all_contests['merchant_mobile']  ?></td>
                                            <td><?php echo $all_contests['merchant_email']  ?></td>
                                            <td>

                                                <?php if ($type == 'image') { ?>
                                                    <a href="../assets/merchant_contest_uploads/<?php echo $all_contests['upload_file'] ?>">
                                                        <img src="../assets/merchant_contest_uploads/<?php echo $all_contests['upload_file'] ?>" width="150px" alt="" srcset="">
                                                    </a>

                                                <?php } elseif ($type == 'video') { ?>
                                                    <a class="popup-img h2 text-white" href="../assets/merchant_contest_uploads/<?php echo $all_contests['upload_file'] ?>">
                                                        <video class="img-center" width="250px" controls>
                                                            <source src="../assets/merchant_contest_uploads/<?php echo $all_contests['upload_file'] ?>">
                                                        </video>
                                                    </a>

                                                <?php  } elseif ($type == 'audio') { ?>
                                                    <a class="popup-img h2 text-white" href="../assets/merchant_contest_uploads/<?php echo $all_contests['upload_file'] ?>">

                                                        <audio controls class="img-center">
                                                            <source src="../assets/merchant_contest_uploads/<?php echo $all_contests['upload_file'] ?>">
                                                        </audio>
                                                    </a>

                                                <?php   } ?></td>
                                            <td class='text-center'><?php echo !empty($all_contests['votes']) ?  "<label class='text-success'> " . $all_contests['votes'] . "</label>"  : "<label class='text-danger'>لم يصوت أحد بعد</label>" ?></td>
                                            <td>
                                                <a href="view_merchant_votes.php?m_id=<?php echo $all_contests['m_contest_id'] ?>" class="btn btn-info"> <i class="fa fa-eye"></i></a>

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2<?php echo $i ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <div class="modal fade" id="exampleModal2<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-red">
                                                                <h5 class="modal-title text-center text-bold" id="exampleModalLabel">تأكيد حذف العمل المرفق</h5>
                                                                <button type="button" class="close bg-light" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <p class='text-danger text-center font-weight-bold'>هل انت متأكد من حذف هذا العمل ؟</p>
                                                                </div>
                                                            </div>
                                                            <form action='' method="POST" role="form">
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="contest_id" value="<?php echo $all_contests['m_contest_id'] ?>">
                                                                    <input type="hidden" name="file_upload" value="<?php echo $all_contests['upload_file'] ?>">
                                                                    <button type="button" class="btn btn-dark col-md-6" data-dismiss="modal">إلغاء الحذف</button>
                                                                    <button type="submit" name='delete_contest' class="btn btn-danger col-md-5">تأكيد حذف العمل</button>
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

                                <div class="box-footer clearfix ">
                                    <ul class="pagination pagination-sm no-margin pull-right">

                                        <li class="<?php if ($pageno <= 1) {
                                                        echo 'disabled';
                                                    }   ?>"> <a class="page-link text-primary" href="<?php if ($pageno <= 1) {
                                                                                                            echo '#';
                                                                                                        } else {
                                                                                                            echo "?pageno=" . ($pageno - 1);
                                                                                                        } ?>">الصفحة السابقة</a></li>
                                        <li class="<?php if ($pageno >= $total_pages_contest_users) {
                                                        echo 'disabled';
                                                    }   ?>"> <a class="page-link text-success" href="<?php if ($pageno >= $total_pages_contest_users) {
                                                                                                            echo '#';
                                                                                                        } else {
                                                                                                            echo "?pageno=" . ($pageno + 1);
                                                                                                        } ?>">الصفحة التالية</a></li>
                                    </ul>
                                </div>
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