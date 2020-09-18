<?php
include_once('includes/header.php');

if (!isset($_GET['m_id'])) {
    echo "<script>window.location.href='view_merchants_contest.php'</script>";
}


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$num_records_per_page = 6;
$offset = ($pageno - 1) * $num_records_per_page;

?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Merchants Contest Votes - عرض تفاصيل الاصوات لمسابقة اصحاب المنتجات

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active"> عرض تفاصيل الاصوات
            </li>
        </ol>
    </section>

    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">

                <div class="box box-primary">

                    <div class="box-header ">
                        <a href="view_merchants_contest.php"><i class="fa fa-arrow-left"></i> الرجوع للصفحة السابقة</a>
                        <h3 class="box-title pull-right"> تفاصيل الاصوات لمسابقة اصحاب المنتجات</h3>
                    </div>

                    <section class="content">
                        <div class="box-body table-responsive no-padding">

                            <table class="table table-hover">
                                <tr>

                                    <th>مجموع اصوات شركاء النجاح والرعايات</th>
                                    <th>مجموع اصوات اصحاب المنتجات</th>
                                    <th>مجموع اصوات المستخدمين والمصوتين</th>
                                    <th>المجموع</th>

                                </tr>
                                <?php
                                $get_voter = mysqli_query($conn, "SELECT COUNT(voted) as voters_count FROM voter_merchant_contest where m_contest_id='{$_GET['m_id']}'");
                                global $sum;
                                while ($get = mysqli_fetch_assoc($get_voter)) {
                                    $sum = $get['voters_count'];
                                }

                                $get_shares = mysqli_query($conn, "SELECT COUNT(merchant_id) AS merchant_count,COUNT(sponsor_id) AS sponsor_count,COUNT(user_id) AS users_count
                                FROM voters_active_contest WHERE merchant_contest_id='{$_GET['m_id']}'");

                                if (mysqli_num_rows($get_shares) == 0) {
                                    echo "<tr><td colspan='7' class='btn btn-danger col-md-12'> ! لا يوجد تصويت بعد على هذا العمل</td></tr>";
                                    // echo "<script>window.location.href='view_users_contest.php'</script>";

                                } else {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($get_shares)) {

                                ?>
                                        <tr>
                                            <td><?php echo $row['sponsor_count']  ?></td>
                                            <td><?php echo $row['merchant_count']  ?></td>
                                            <td><?php echo $row['users_count'] + $sum  ?></td>
                                            <td><?php echo $row['sponsor_count'] + $row['merchant_count'] + $row['users_count'] + $sum    ?></td>
                                        </tr>


                                <?php
                                        $i++;
                                    }
                                }
                                ?>



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