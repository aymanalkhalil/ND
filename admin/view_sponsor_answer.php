<?php
include_once('includes/header.php');

// if (!isset($_GET['c_id'])) {
//     echo "<script>window.location.href='view_users_contest.php'</script>";
// }

if (isset($_POST['delete'])) {
    $spc_id = $_POST['spc_id'];
    $delete = mysqli_query($conn, "DELETE FROM sponsor_contest where spc_id='$spc_id'");
    if ($delete) {
        $error = " <div class='alert alert-success text-center alert-dismissible'>
                 <h4><i class='icon fa fa-check'></i> Answers Deleted Successfully ! - تم حذف الاجابات بنجاح</h4>
                </div>
                  <script type='text/Javascript'>
             window.setTimeout(function() {
             window.location.href = 'view_sponsor_answer.php';
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
$num_records_per_page = 10;
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
            View Sponsor Answers - عرض اجابات شركاء النجاح

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active"> عرض تفاصيل الاجابات للرعاة
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

                    <div class="box-header text-center   ">
                        <!-- <a href="view_users_contest.php"><i class="fa fa-arrow-left"></i> الرجوع للصفحة السابقة</a> -->
                        <h3 class="box-title "> تفاصيل إجابات مسابقة شركاء النجاح</h3>
                    </div>

                    <section class="content">
                        <div class="box-body table-responsive no-padding">

                            <table class="table table-hover">
                                <tr>
                                    <th>الرقم</th>
                                    <th>الإسم</th>
                                    <th>رقم الجوال</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>عرض الإجابات</th>
                                    <th>حذف</th>

                                </tr>
                                <?php


                                $get_shares = mysqli_query($conn, "SELECT * from sponsor_contest INNER JOIN sponsors
                                on sponsor_contest.sponsor_id=sponsors.sponsor_id ORDER BY spc_id DESC LIMIT $offset,$num_records_per_page");

                                if (mysqli_num_rows($get_shares) == 0) {
                                    echo "<tr><td colspan='6' class='btn btn-danger col-md-12'> ! لم يتم الإجابة على الاسئلة من قبل شركاء النجاح المسجلين بعد</td></tr>";
                                    // echo "<script>window.location.href='view_users_contest.php'</script>";

                                } else {
                                    $i = 1;
                                    $total_user_feeds = mysqli_query($conn, "SELECT * FROM sponsor_contest");
                                    $total_rows_merc = mysqli_num_rows($total_user_feeds);
                                    $total_pages_shares_users = ceil($total_rows_merc / $num_records_per_page);

                                    while ($row = mysqli_fetch_assoc($get_shares)) {

                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['sponsor_name']  ?></td>
                                            <td><?php echo $row['sponsor_mobile']  ?></td>
                                            <td><?php echo $row['sponsor_email']  ?></td>

                                            <td>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1<?php echo $i ?>">
                                                    <i class="fa fa-eye"></i>
                                                </button>

                                                <div class="modal fade" id="exampleModal1<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-maroon">
                                                                <h5 class="modal-title text-center text-bold" id="exampleModalLabel">إجابة شريك النجاح: <?php echo $row['sponsor_name'] ?></h5>
                                                                <button type="button" class="close bg-light" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <!-- <div class="col-md-12"> -->
                                                                <div class="form-group">
                                                                    <label for="" class='pull-right'>١. هل ترى أن دعم الإبدآع هو من أهم مهام المجتمع ؟</label>
                                                                    <textarea class='form-control' cols="5" dir="rtl" rows="5" readonly><?php echo $row['question1'] ?></textarea>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- <div class="col-md-12"> -->
                                                                <div class="form-group">
                                                                    <label for="" class='pull-right'>٢.ماهي أشكال الدعم التي من الممكن أن تساهم في رفع مستوى الابداع للموهوبين ؟
                                                                    </label>

                                                                    <textarea class='form-control' cols="5" dir="rtl" rows="5" readonly><?php echo $row['question2'] ?></textarea>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- <div class="col-md-12"> -->
                                                                <div class="form-group">
                                                                    <label for="" class='pull-right'>٣. هل تعتقد بأن الدعم الذي يتلقاه الموهوب كافي لنهوضه بموهبته؟
                                                                    </label>

                                                                    <textarea class='form-control' cols="5" dir="rtl" rows="5" readonly><?php echo $row['question3'] ?></textarea>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- <div class="col-md-12"> -->
                                                                <div class="form-group">
                                                                    <label for="" class='pull-right'>٤. هل تؤمن بأهمية دور الموهوبين في دفع عجلة التنمية الفنية و الثقافيه و الادبية ؟
                                                                    </label>

                                                                    <textarea class='form-control' cols="5" dir="rtl" rows="5" readonly><?php echo $row['question4'] ?></textarea>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- <div class="col-md-12"> -->
                                                                <div class="form-group">
                                                                    <label for="" class='pull-right'>٥. هل سررت بما رأيت من إبداع موهوبي المملكة بمناسبة اليوم الوطني السعودي ٩٠؟</label>

                                                                    <textarea class='form-control' cols="5" dir="rtl" rows="5" readonly><?php echo $row['question5'] ?></textarea>
                                                                </div>
                                                                <!-- </div> -->
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>


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
                                                                    <input type="hidden" name="spc_id" value="<?php echo $row['spc_id'] ?>">
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
</div>

<?php
include_once('includes/footer.php');
?>