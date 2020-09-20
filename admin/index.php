<?php
include_once('includes/header.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      منصة اليوم الوطني السعودي ٩٠
      <small>لوحة التحكم</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
      <li class="active">لوحة التحكم</li>
    </ol>
  </section>

  <!-- Main content -->
  <?php if ($_SESSION['is_super'] == 1) { ?>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_admin = mysqli_query($conn, "SELECT * from admin");

          ?>
          <div class="small-box bg-aqua-active">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_admin) ?></h3>

              <p class='text-center'>الادمن</p>
            </div>

            <a href="add_admin.php" class="small-box-footer">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_sp_gold = mysqli_query($conn, "SELECT * from sponsors where gold=1");

          ?>
          <div class="small-box " style='background-color:#FFDF00;color:#000'>
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_sp_gold) ?></h3>

              <p class='text-center'>شركاء النجاح الذهبيين</p>
            </div>

            <a href="manage_sponsors.php" class="small-box-footer text-black">عرض التفاصيل<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_sp_silver = mysqli_query($conn, "SELECT * from sponsors where gold is null");

          ?>
          <div class="small-box " style="background-color: #C0C0C0; color:#000">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_sp_silver) ?></h3>

              <p class='text-center'>شركاء النجاح الفضيين</p>
            </div>

            <a href="manage_sponsors.php" class="small-box-footer ">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_m = mysqli_query($conn, "SELECT * from merchants where active=1");

          ?>
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_m) ?></h3>

              <p class='text-center'>حسابات أصحاب المنتجات </p>
            </div>

            <a href="manage_merchants.php" class="small-box-footer"> عرض التفاصيل<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_u = mysqli_query($conn, "SELECT * from users where active=1");

          ?>
          <div class="small-box bg-olive-active">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_u) ?></h3>

              <p class='text-center'>حسابات المستخدمين </p>
            </div>

            <a href="manage_users.php" class="small-box-footer">عرض التفاصيل<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_u_s = mysqli_query($conn, "SELECT * from uploads_users");

          ?>
          <div class="small-box bg-olive-active">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_u_s) ?></h3>

              <p class='text-center'>عدد المشاركات الوطنية</p>
            </div>

            <a href="view_users_contest.php" class="small-box-footer">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_us_s = mysqli_query($conn, "SELECT * from user_contest");

          ?>
          <div class="small-box bg-olive-active">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_us_s) ?></h3>

              <p class='text-center'>الأعمال الوطنية</p>
            </div>

            <a href="view_users_contest.php" class="small-box-footer">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_m_s = mysqli_query($conn, "SELECT * from uploads_merchants");

          ?>
          <div class="small-box bg-purple-active">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_m_s) ?></h3>

              <p class='text-center'>عدد مشاركات أصحاب المنتجات</p>
            </div>

            <a href="view_merchants_contest.php" class="small-box-footer">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_u_s = mysqli_query($conn, "SELECT * from merchant_contest");

          ?>
          <div class="small-box bg-purple-active">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_u_s) ?></h3>

              <p class='text-center'>عدد أعمال أصحاب المنتجات</p>
            </div>

            <a href="view_merchants_contest.php" class="small-box-footer">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_u_s = mysqli_query($conn, "SELECT * from uploads_sponsors");

          ?>
          <div class="small-box bg-purple-active">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_u_s) ?></h3>

              <p class='text-center'>عدد مشاركات شركاء النجاح</p>
            </div>

            <a href="view_merchants_contest.php" class="small-box-footer">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_v_s = mysqli_query($conn, "SELECT * from voters");

          ?>
          <div class="small-box bg-navy">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_v_s) ?></h3>

              <p class='text-center'>عدد حسابات المصوتين المسجلة</p>
            </div>

            <a href="#" class="small-box-footer">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>








        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_sp_silver_non = mysqli_query($conn, "SELECT * from sponsors where active=0");

          ?>
          <div class="small-box bg-red">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_sp_silver_non) ?></h3>

              <p class='text-center'> حسابات شركاء النجاح الغير فعالة </p>
            </div>

            <a href="manage_sponsors.php" class="small-box-footer">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_sp_silver_non = mysqli_query($conn, "SELECT * from users where active=0");

          ?>
          <div class="small-box bg-red">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_sp_silver_non) ?></h3>

              <p class='text-center'>حسابات المستخدمين الغير فعالة </p>
            </div>

            <a href="manage_users.php" class="small-box-footer">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $tot_m = mysqli_query($conn, "SELECT * from merchants where active=0 ");

          ?>
          <div class="small-box bg-red">
            <div class="inner">
              <h3 class='text-center'><?php echo mysqli_num_rows($tot_m) ?></h3>

              <p class='text-center'>حسابات أصحاب المنتجات الغير فعالة </p>
            </div>

            <a href="manage_merchants.php" class="small-box-footer">عرض التفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
    <?php } ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once('includes/footer.php'); ?>