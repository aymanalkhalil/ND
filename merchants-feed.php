<?php
include_once('includes/header.php');


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$num_records_per_page = 12;
$offset = ($pageno - 1) * $num_records_per_page;

?>
<!--hero section start-->
<style>
    .position-absolute {
        position: relative !important;
    }
</style>
<section class="position-relative">
    <div id="particles-js"></div>
    <div class="container">
        <div class="row  text-center">
            <div class="col">
                <h1>اصحاب المنتجات التجارية</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a class="text-dark" href="index.php">الرئيسية</a>
                        </li>

                        <li class="breadcrumb-item active text-success" aria-current="page">اصحاب المنتجات التجارية</li>
                        <li class="breadcrumb-item"><a class="text-dark" href="merchants-contest.php">مسابقات اصحاب المنتجات التجارية </a>

                    </ol>
                </nav>
                <h2 class='text-center'> عزيزي صاحب/ة المنتج التجاري للمشاركة بمسابقة أصحاب المنتجات التجارية <a href="merchants-contest.php">اضغط هنا</a></h2>

            </div>
        </div>
        <!-- / .row -->
    </div>
    <!-- / .container -->
</section>
<!--blog start-->

<section>
    <div class="container">
        <div class="row">

            <?php
            $get_merchant_feeds = mysqli_query($conn, "SELECT merchant_desc,upload_merchant_id,upload_merchant_file,upload_merchant_description,uploads_merchants.merchant_id,merchants.merchant_name
                FROM merchants INNER JOIN uploads_merchants ON uploads_merchants.merchant_id=merchants.merchant_id WHERE active=1
                ORDER BY upload_merchant_id DESC LIMIT $offset,$num_records_per_page");
            if (mysqli_num_rows($get_merchant_feeds) == 0) {
                echo "
            <section class='col-lg-12'>
              <div class='container'>
                <div class='row justify-content-center text-center'>
                  <div class='col-lg-8 col-md-12'>
                    <div class='mb-6'>";

                echo "<h5 class='text-danger'>لا توجد مشاركات بعد  !</h5>
                  </div>
                  </div>
                </div>
                </div>
            </section>";
            } else {
                $total_merchant_feeds = mysqli_query($conn, "SELECT * FROM uploads_merchants");
                $total_rows_merc = mysqli_num_rows($total_merchant_feeds);
                $total_pages_sp = ceil($total_rows_merc / $num_records_per_page);

                while ($all_feeds = mysqli_fetch_assoc($get_merchant_feeds)) {
                    $typeArr = explode('.', $all_feeds['upload_merchant_file']);
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

                    <div class="col-12 col-lg-4 mb-6 mb-lg-0">
                        <!-- Blog Card -->
                        <div class="card border-0 bg-transparent">

                            <!-- <div class="position-absolute bg-white shadow-primary text-center p-2 rounded mr-3 mt-3">15
                        <br>July</div> -->
                            <?php if ($type == 'image') { ?>
                                <a class="popup-img h2 text-white" href="assets/upload_merchants/<?php echo $all_feeds['upload_merchant_file'] ?>">
                                    <img class="card-img-top shadow rounded" src="assets/upload_merchants/<?php echo $all_feeds['upload_merchant_file'] ?>" alt="Image">
                                </a>
                            <?php } elseif ($type == 'video') { ?>
                                <a class="popup-img h2 text-white" href="assets/upload_merchants/<?php echo $all_feeds['upload_merchant_file'] ?>">
                                    <video class="img-center w-100" controls>
                                        <source src="assets/upload_merchants/<?php echo $all_feeds['upload_merchant_file'] ?>">
                                    </video>
                                </a>

                            <?php } elseif ($type == 'audio') { ?>

                                <a class="popup-img h2 text-white" href="assets/upload_merchants/<?php echo $all_feeds['upload_merchant_file'] ?>">

                                    <audio controls class="img-center w-100 mt-11">
                                        <source src="assets/upload_merchants/<?php echo $all_feeds['upload_merchant_file'] ?>">
                                    </audio>
                                </a>
                            <?php } ?>
                            <div class="card-body pt-5"> <label class="d-inline-block text-info mb-2">بواسطة: <?php echo  $all_feeds['merchant_name'] ?></label>
                                <h2 class="h5 font-weight-medium">
                                    <p class="link-title <?php echo !empty($all_feeds['upload_merchant_description']) ? "text-success" : 'text-danger' ?>"><label class='text-secondary'>تعليق صاحب المشاركة : </label><?php echo !empty($all_feeds['upload_merchant_description']) ? $all_feeds['upload_merchant_description'] : "لا يوجد تعليق" ?></p>
                                    <p class="link-title <?php echo $all_feeds['merchant_desc'] == 'لا يوجد وصف للحساب' ? "text-danger" : 'text-success' ?>"><label class='text-secondary'> وصف حساب صاحب المنتج التجاري : </label><?php echo !empty($all_feeds['merchant_desc']) ? $all_feeds['merchant_desc'] : "لا يوجد وصف لحساب صاحب المنتج التجاري" ?></p>

                                </h2>
                                <!-- <p>Businesses need access to development resources serspiciatis unde omnis iste natus error.</p> -->
                            </div>
                            <div></div>
                        </div>
                    </div>
                    <!-- End Blog Card -->
            <?php
                }
            }
            ?>
        </div>
        <div class="row mt-11">
            <div class="col-12">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item mr-auto <?php if ($pageno <= 1) {
                                                            echo 'disabled';
                                                        }   ?>"> <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                                                echo '#';
                                                                                            } else {
                                                                                                echo "?pageno=" . ($pageno - 1);
                                                                                            } ?>">الصفحة السابقة</a>

                        </li>
                        <li class="page-item ml-auto <?php if ($pageno >= $total_pages_sp) {
                                                            echo 'disabled';
                                                        }   ?>"> <a class="page-link" href="<?php if ($pageno >= $total_pages_sp) {
                                                                                                echo '#';
                                                                                            } else {
                                                                                                echo "?pageno=" . ($pageno + 1);
                                                                                            } ?>">الصفحة التالية</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!--blog end-->
<!--hero section end-->
<?php
include_once('includes/footer.php');

?>