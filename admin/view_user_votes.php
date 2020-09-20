<?php
include_once('includes/header.php');

if (!isset($_GET['c_id'])) {
    echo "<script>window.location.href='view_users_contest.php'</script>";
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
            View Users Contest Votes - عرض تفاصيل الاصوات لمسابقة المستخدمين

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
                        <a href="view_users_contest.php"><i class="fa fa-arrow-left"></i> الرجوع للصفحة السابقة</a>
                        <h3 class="box-title pull-right"> تفاصيل الاصوات لمسابقة المستخدمين</h3>
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
                                $get_voter = mysqli_query($conn, "SELECT COUNT(voted) as voters_count FROM voter_contest where contest_id='{$_GET['c_id']}'");
                                global $sum;
                                while ($get = mysqli_fetch_assoc($get_voter)) {
                                    $sum = $get['voters_count'];
                                }

                                $get_shares = mysqli_query($conn, "SELECT COUNT(merchant_id) AS merchant_count,COUNT(sponsor_id) AS sponsor_count,COUNT(user_id) AS users_count
                                FROM voters_active_contest WHERE user_contest_id='{$_GET['c_id']}'");

                                if (mysqli_num_rows($get_shares) == 0) {
                                    echo "<tr><td colspan='7' class='btn btn-danger col-md-12'> ! لا يوجد تصويت بعد على هذا العمل</td></tr>";
                                } else {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($get_shares)) {
                                        $users = $row['users_count'] + $sum;
                                        $total = $row['sponsor_count'] + $row['merchant_count'] + $users;

                                        $percentage_sponsors = round(20 / 100 * $row['sponsor_count']);
                                        $percentage_merchants = round(10 / 100 * $row['merchant_count']);
                                        $percentage_users = round(50 / 100 * $users);

                                        $total_percentage = $percentage_merchants + $percentage_sponsors + $percentage_users;
                                ?>
                                        <tr>
                                            <td><?php echo $row['sponsor_count']  ?></td>
                                            <td><?php echo $row['merchant_count']  ?></td>
                                            <td><?php echo $row['users_count'] + $sum  ?></td>
                                            <td><?php echo $row['sponsor_count'] + $row['merchant_count'] + $row['users_count'] + $sum    ?></td>
                                        </tr>
                                        <tr>
                                            <?php echo "<tr><td colspan='7' dir='rtl' class='col-md-12 text-center btn btn-danger'>

                                             ملاحظة مهمة جداً: النسب المطبقة على مسابقات المتسخدمين(المسابقات الوطنية) هي
                                             <br>

                                             10%  لأصحاب المنتجات التجارية
                                            <br>

                                            20% شركاء النجاح والرعايات

                                            <br>

                                            50%  مصوتين ومستخدمين      <br>

                                              20% لمدراء المنصة
                                            </td></tr>";
                                            ?>

                                            <?php
                                            echo "<tr><td colspan='7' dir='rtl' class='col-md-12 text-center btn btn-success'>
                                                        تفاصيل الأصوات بعد تطبيق النسب المئوية المذكورة أعلاه

                                            </td></tr>";
                                            ?>
                                            <td><?php echo  $percentage_sponsors ?></td>
                                            <td><?php echo  $percentage_merchants ?></td>
                                            <td><?php echo  $percentage_users  ?></td>
                                            <td><?php echo  $total_percentage   ?></td>


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