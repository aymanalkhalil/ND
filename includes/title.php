<?php

$checkpage = basename($_SERVER['PHP_SELF'], ".php");
switch ($checkpage) {

    case 'register';
        echo "تسجيل حساب";
        break;
    case 'login';
        echo "تسجيل الدخول";
        break;
    case 'my-account';
        echo "صفحتي الشخصية";
        break;
    case 'subscriptions';
        echo "الاشتراكات";
        break;
    case 'view_share';
        echo " عرض مشاركاتي";
    break;
    default:
        echo "الرئيسية|منصة اليوم الوطني السعودي ٩٠";
        break;
}
