<?php
include_once('includes/connection.php');

switch (key($_GET)) {
    case 'u':
        $query1 = mysqli_query($conn, "SELECT user_name from users where user_id='{$_GET['u']}'");
        break;
    case 'm':
        $query2 = mysqli_query($conn, "SELECT merchant_name from merchants where merchant_id='{$_GET['m']}'");
        break;
    case 's':
        $query3 = mysqli_query($conn, "SELECT sponsor_name from sponsors where sponsor_id='{$_GET['s']}'");
        break;

    default:
        echo "<script>window.location.href='index.php'</script>";
        break;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/certificate.css">
    <link rel="shortcut icon" href="assets/images/primary/green.png" />

    <title>شهادة مشاركة</title>
</head>

<body>

    <div class="container-fluid ml-1 mt-1">
        <div class="row">
            <div class="col-2 ">
                <div class="row">
                    <img src="assets/images/primary/nav-gray-logo.png" width="298px">

                </div>


            </div>
            <div class="col-7">
                <div class="row d-flex justify-content-center mt-3 f-2 ml-5 text-success">
                    <img src="assets/images/thanks.png" width="298px">
                </div>
                <?php
                if (isset($_GET['u'])) {
                    $row = mysqli_fetch_assoc($query1);
                ?>
                    <div class="text-center f-2 text-dark mt-5" dir="rtl">
                        المشارك/ة: <?php echo "<b class='text-success'>" . $row['user_name'] . "</b>"  ?>
                    </div>

                    <div class="col-12 text-justify text-center text-success f-2 " dir="rtl" style="margin-top:90px">
                        نتقدم لكم بفائق الشكر والتقدير على مشاركتكم الفعالة بفعالية ياموهوب همة حتى القمة ٢ . <br>التي أقيمت بمنصة اليوم الوطني السعودي ٩٠ بتاريخ ٢٣-٩-٢٠٢٠
                        آملين من الله ان يديم التعاون في ما لخدمة مجتمعنا و وطننا المعطاء.
                    </div>

                <?php } elseif (isset($_GET['m'])) {
                    $row2 = mysqli_fetch_assoc($query2);
                ?>
                    <div class="text-center f-2 text-dark mt-5" dir="rtl">
                        صاحب/ة المنتج التجاري: <?php echo "<b class='text-success'>" . $row2['merchant_name'] . "</b>" ?>
                    </div>

                    <div class="col-12 text-justify text-center text-success f-2 " dir="rtl" style="margin-top:50px">
                        نتقدم لكم بفائق الشكر والتقدير على مشاركتكم الفعالة بعروضكم المميزه بمناسبة اليوم الوطني بفعالية ياموهوب همة حتى القمة ٢ . <br>التي أقيمت بمنصة اليوم الوطني السعودي ٩٠ بتاريخ ٢٣-٩-٢٠٢٠
                        آملين من الله ان يديم التعاون في ما لخدمة مجتمعنا و وطننا المعطاء.
                    </div>




                <?php } elseif (isset($_GET['s'])) {
                    $row3 = mysqli_fetch_assoc($query3);
                ?>
                    <div class="text-center f-2 text-dark mt-5" dir="rtl">
                        شريك/ة النجاح : <?php echo "<b class='text-success'>" .  $row3['sponsor_name'] . "</b>" ?>
                    </div>

                    <div class="col-12 text-justify text-center text-success f-2 " dir="rtl" style="margin-top:92px">
                        نتقدم لكم بفائق الشكر والتقدير على دعمكم و رعايتكم لفعالية ياموهوب همة حتى القمة ٢ . <br>التي أقيمت بمنصة اليوم الوطني السعودي ٩٠ بتاريخ ٢٣-٩-٢٠٢٠
                        آملين من الله ان يديم التعاون في ما لخدمة مجتمعنا و وطننا المعطاء.
                    </div>
                <?php } else {
                } ?>
            </div>



            <div class="col-3 d-flex justify-content-end pull-right">

                <div class="row">
                    <img src="assets/images/certificate.png" height="450px">
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center " style="margin-top: 150px;margin-left:50px">

                <div class="row">
                    <img src="assets/images/logos/talent1.jpeg" style="width:55%; max-width:280px;">

                </div>
                <div class="row">
                    <img src="assets/images/logo-ar.jpg" style="width:55%; max-width:280px;">

                </div>
                <div class="row">
                    <img src="assets/images/lit-club.jpeg" style="width:55%; max-width:280px;">

                </div>
                <div class="row">
                    <img src="assets/images/global.jpeg" style="width:55%; max-width:280px;">

                </div>
            </div>


        </div>
</body>

</html>

<script>
    window.print();
</script>