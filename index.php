<?php include_once('includes/header.php');
// var_dump($_SESSION);
// session_destroy();
?>
<!--hero section start-->
<section class="custom-pt-1 custom-pb-3 bg-success position-relative parallaxie" data-bg-img="assets/images/bg/03.png">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-5 col-xl-5 ml-auto mb-8 mb-lg-0 text-center">
                <!-- Image -->
                <img src="assets/images/primary/white-green.png" width="380px" class="img-fluid " alt="...">
            </div>
            <div class="col-12 col-lg-7 col-xl-6 text-center">
                <!-- Heading -->
                <!-- <h1 class="display-4 text-white">

                    هذا هو الخط الذي سيتم استخدامه لهويتنا خط واضح وانيق و مقروء ١٢٣٤٥٦٧٨٩
                    <span class="font-weight-bold">Bootsland</span>
                </h1> -->
                <!-- Text -->
                <p class="lead text-light">
                    ها نحنُ نقفُ على مشارف العام التسعين نعم يا أحبة تسعةً وثمانون عاماً مرت منذ توحيد هذا الكيان العظيم وهذه الحدود وهذه المكانة بهذا القّدر من العلاقات الحميدة تسعةً وثمانون عاماً أنجلت مخلفةً ورائها إنجازات و سطور كونت كتباً في التاريخ لا مجرد تواريخ و انقضت هنا مجدٌ يُخلد هنا قِصص أجدادنا هنا خطوات أطفالنا هنا إبداعات شبابنا هنا ظلال نخلٍ و ثمار و عطاء لو سطّرنا تسعون كتاباً لاحتواء ما قدمه هذا البلد الشامخ لن تكفى الكتب و المجلدات والصحف دمت يا وطني مجداً وفخراً وذخراً وأمناً واماناً وسلاماً لنا وللامة الإسلامية اجمع لذا نجدد في عامنا هذا البيعة ونستعد لأعوام قادمة وبيعاتٌ قادمة.
                </p>
                <!-- Buttons -->
                <?php if (!isset($_SESSION['user_id']) && !isset($_SESSION['merchant_id']) && !isset($_SESSION['sponsor_id']) && !isset($_SESSION['voter_id'])) { ?>

                    <a href="login.php" class="btn btn-outline-light ml-1">
                        تسجيل الدخول
                    </a>
                <?php
                }
                ?>
                <a href="http://vimeo.com/99025203" class="btn text-white popup-vimeo text-center"> <i class="la la-play-circle mr-1 ic-3x align-middle line-h-0"></i> الإستماع للمقطع </a>
                <a href="assets/images/شهادة الزائر.pdf" class="btn text-white popup-vimeo text-center" target="_blank" download> <i class="la la-download mr-1 ic-3x align-middle line-h-0"></i> شهادة الزائر </a>
            </div>
        </div>
        <!-- / .row -->
    </div>
    <!-- / .container -->
    <div class="shape-1 bottom" style="height: 250px; overflow: hidden;">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
        </svg>
    </div>
</section>
<!--hero section end-->


<!--body content start-->
<div class="page-content">
    <!--about start-->
    <section>

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-6 mb-8 mb-lg-0 text-center">
                    <img src="assets/images/logos/logo2.jpeg" width='400px' alt="Image" class="img-fluid">
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class='text-center'>
                        <span class="badge badge-success-soft p-2 bg-success">
                            <img src="assets/images/gif/KSA-flag.gif" alt="" srcset="">
                        </span>
                        <!-- <h2 class="mt-3">بسم الله الرحمن الرحيم</h2> -->
                        <p class="lead mb-0">
                            نيابةً عنا كقائمين على هذه المنصة و بالأصالة عن موهوبي المملكة العربية السعودية من كافة مجالات الفن والابداع نرفع أسمى آيات الشكر والتقدير لملكنا خادم الحرمين الشرفين الملك سلمان بن عبدالعزيز آل سعود على ما قدمهُ من تمكين وتطوير وعلى ما أبدى من حرص وتبشير حفظه الله ورعاه كما نتقدم بالامتنان لولي العهد أمير الشباب صاحب الرؤية والإنجازات الأمير محمد بن سلمان بن عبدالعزيز آل سعود وفقه الله ورعاه لن يسعنا جميعاً أمام هذا العطاء سوى تجديد المحبة والوفاء لأولياء أمورنا الكُرماء.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about end-->

    <!--client start-->
    <section class="p-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel no-pb" data-dots="false" data-items="6" data-md-items="4" data-sm-items="3" data-xs-items="2" data-margin="30" data-autoplay="true">
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/commerce.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/moh.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/moe.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/red.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/moep.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/mong.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/mod.svg" alt="">
                            </div>
                        </div>

                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/mof.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/moi.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/fh.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/Ministry-of-Media.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/haj.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/mohr.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/moc.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/ca.jpeg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/momr.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid" src="assets/images/mi-logos/moj.svg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="clients-logo">
                                <img class="img-fluid mt-4" src="assets/images/mi-logos/amana-makkah.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--client end-->
    <!--service start-->
    <section>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <section>
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-6 mb-8 mb-lg-0 text-center">
                                <img src="assets/images/logos/flag.jpg" width='400px' alt="Image" class="img-fluid">
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5">
                                <div class='text-center'>
                                    <span class="badge badge-success-soft p-2 bg-success">
                                        <img src="assets/images/gif/KSA-flag.gif" alt="" srcset="">
                                    </span>
                                    <p class="lead mb-0">
                                        ‎أنتم الأبطال

                                        ‎في ظل جائحة الوباء ، و البحث عن السلامة و الدواء ، لن تكفي الإشادة و الثناء لمن اختاروا التصدي للوباء ، للمواطنين الملتزمين و الأطباء المضحيين ، للوزارات و القطاعات ، و الهيئات و المؤسسات ، لمن تفقد الأحوال و لبى المنادي بالسؤال ، شكراً لكم أنتم الأبطال .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <section>
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-6 mb-8 mb-lg-0 text-center">
                                <img src="assets/images/logos/talent1.jpeg" width='400px' alt="Image" class="img-fluid">
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5">
                                <div class='text-center'>
                                    <span class="badge badge-success-soft p-2 bg-success">
                                        <img src="assets/images/gif/KSA-flag.gif" alt="" srcset="">
                                    </span>
                                    <p class="lead mb-0">
                                        - تأسّست مجموعة يا موهوب لدعم الموهوبين عام ١٤٣٩.<br>

                                        - صُرّحت من جمعيّة الثقافة و الفنون في عام ١٤٤٠.<br>

                                        تهدف لدّعم الموهوبين من مختلف مجالات الفن والابداع، من الكتاب و الشّعراء و مواهب الصوت و المونتاج و الاخراج و التّصوير، والتصاميم و الفنون التشكيلية، الحرف اليدوية و الخط و الفنون الشعبية.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <section>
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-3 mb-8 mb-lg-0 text-center">
                                <img src="assets/images/logo-ar.jpeg" width='550px' alt="Image" class="img-fluid">
                            </div>
                            <div class="col-12 col-lg-3 mb-8 mb-lg-0 text-center">
                                <img src="assets/images/lit-club.jpeg" width='550px' alt="Image" class="img-fluid">
                            </div>
                            <div class="col-12 col-lg-3 mb-8 mb-lg-0 text-center">
                                <img src="assets/images/global.jpeg" width='550px' alt="Image" class="img-fluid">
                            </div>


                        </div>
                    </div>
                </section>
            </div>
        </div>

    </section>
    <section class="p-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    $sp_logos = mysqli_query($conn, "SELECT sponsor_image From sponsors where gold=1 ORDER BY sponsor_id DESC");
                    if (mysqli_num_rows($sp_logos) == 0) {
                    } else {
                    ?>
                        <h2 class='text-center text-success mb-6'> شركاء النجاح والرعايات الذهبية</h2>

                        <div class="owl-carousel no-pb" data-dots="false" data-items="6" data-md-items="4" data-sm-items="3" data-xs-items="2" data-margin="30" data-autoplay="true">
                            <?php while ($logos = mysqli_fetch_assoc($sp_logos)) { ?>
                                <div class="item">
                                    <div class="clients-logo">
                                        <img class="img-fluid" src="assets/sponsors_logo/<?php echo $logos['sponsor_image'] ?>" width="200px" alt="">

                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                </div>
            <?php } ?>
            </div>
        </div>
    </section>
    <!--client end-->


    <!--client start-->
    <section class="p-0"><br>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    $sp_logos = mysqli_query($conn, "SELECT sponsor_image From sponsors where gold=0 ORDER BY sponsor_id DESC");
                    if (mysqli_num_rows($sp_logos) == 0) {
                    } else {
                    ?>
                        <h2 class='text-center text-success mb-6'> شركاء النجاح والرعايات الفضية</h2>

                        <div class="owl-carousel no-pb" data-dots="false" data-items="6" data-md-items="4" data-sm-items="3" data-xs-items="2" data-margin="30" data-autoplay="true">
                            <?php while ($logos = mysqli_fetch_assoc($sp_logos)) { ?>
                                <div class="item">
                                    <div class="clients-logo">
                                        <img class="img-fluid" src="assets/sponsors_logo/<?php echo $logos['sponsor_image'] ?>" width="200px" alt="">

                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                </div>
            <?php } ?>
            </div>
        </div>
    </section>

</div>
<!--body content end-->
<?php include_once('includes/footer.php') ?>