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
                <img src="assets/images/primary/white-green.png" width="380px" class="img-fluid" alt="...">
            </div>
            <div class="col-12 col-lg-7 col-xl-6 text-center">
                <!-- Heading -->
                <!-- <h1 class="display-4 text-white">

                    هذا هو الخط الذي سيتم استخدامه لهويتنا خط واضح وانيق و مقروء ١٢٣٤٥٦٧٨٩
                    <span class="font-weight-bold">Bootsland</span>
                </h1> -->
                <!-- Text -->
                <p class="lead text-light">
                    ها نّحن، نقف على مشارف العام التسعين، نعم يا أحبة ، تسعة و ثمانون عام مّرت منذ توحيد هذا الكيان، هذه الحدود، هذه المكانة و هذا القّدر، هذه العلاقات الحميدة، تسعة و ثمانون عام إنجلت، مخلفةً ورائها إنجازات، و سطور كونت كتباً في التاريخ، لا مجرد تواريخ و إنتهت، هنا مجدٌ يخلد، هنا قصص أجداد، هنا خطوات أطفال، هنا إبداع الشبان و الشابات ، هنا ظلال نخلٍ و ثمار و عطاء ، هنا سيفان لو سطّرنا تسعين كتاباً ، إحتوئاً لما قدمه هذا البلد الشامخ لن تكفى الكتب و المجلدات
                    دمتَ يا وطني مجداً ، و فخراً ، و ذخراً ، و أمناً و اماناً ، و سِلماً و سلاماً نجدد في عامنا هذا البيعة ونستعد لاعوام قادمة وبيعات.
                </p>
                <!-- Buttons -->
                <?php if (!isset($_SESSION['user_id']) && !isset($_SESSION['merchant_id']) && !isset($_SESSION['sponsor_id'])) { ?>

                    <a href="login.php" class="btn btn-outline-light ml-1">
                        تسجيل الدخول
                    </a>
                <?php
                }
                ?>
                <a href="http://vimeo.com/99025203" class="btn text-white popup-vimeo text-center"> <i class="la la-play-circle mr-1 ic-3x align-middle line-h-0"></i> مشاهدة الفيديو</a>
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
                    <img src="logo2.jpeg" width='400px' alt="Image" class="img-fluid">
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class='text-center'>
                        <span class="badge badge-success-soft p-2 bg-success">
                            <img src="assets/images/gif/KSA-flag.gif" alt="" srcset="">
                        </span>
                        <!-- <h2 class="mt-3">بسم الله الرحمن الرحيم</h2> -->
                        <p class="lead mb-0">
                            ‎بسم الله الرحمن الرحيم

                            ‎نيابة عن المواطنين ، و أصالة عن الموهوبين
                            ‎نرفع في هذا اليوم الكبير أسمى آيات الشكر و التقدير لملكنا خادم الحرمين الشريفين على ما قدم من تمكين و تطوير و على ما أبدى من حرص و تبشير . كما نتقدم بالإمتنان.. لولي عهده
                            ‎محمد بن سلمان ، صاحب الرؤية الجديدة و الإنجازات الفريدة . و لن يسعنا أمام هذا العطاء ، سوى تجديد المحبة و الوفاء ، لأولياء أمورنا الكرماء.</p>
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
                                <img src="flag.jpg" width='400px' alt="Image" class="img-fluid">
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5">
                                <div class='text-center'>
                                    <span class="badge badge-success-soft p-2 bg-success">
                                        <img src="assets/images/gif/KSA-flag.gif" alt="" srcset="">
                                    </span>
                                    <!-- <h2 class="mt-3">بسم الله الرحمن الرحيم</h2> -->
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
                                <img src="assets/images/talent1.jpeg" width='400px' alt="Image" class="img-fluid">
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5">
                                <div class='text-center'>
                                    <span class="badge badge-success-soft p-2 bg-success">
                                        <img src="assets/images/gif/KSA-flag.gif" alt="" srcset="">
                                    </span>
                                    <!-- <h2 class="mt-3">بسم الله الرحمن الرحيم</h2> -->
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
    </section>
</div>
<!--body content end-->
<?php include_once('includes/footer.php') ?>