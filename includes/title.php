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
    case 'sponsors-feed':
        echo "شركاء النجاح ";
        break;
    case 'merchants-feed':
        echo "التخفيضات والعروض";
        break;
        case 'national-feeds':
        echo "المشاركات الوطنية";
            break;
    default:
        echo "منصة اليوم الوطني السعودي ٩٠|الرئيسية";
        break;
}
