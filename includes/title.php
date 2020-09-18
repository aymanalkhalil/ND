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
        echo "عرض مشاركاتي";
        break;
    case 'sponsors-feed':
        echo " شركاء النجاح والرعايات الفضية";
        break;
    case 'gold-feeds':
        echo "شركاء النجاح والرعايات الذهبية";
        break;
    case 'merchants-feed':
        echo "أصحاب المنتجات التجارية";
        break;
    case 'national-feeds':
        echo "المشاركات الوطنية";
        break;
    case 'users-contest':
        echo "مسابقات المشتركين";
        break;
    case 'merchants-contest':
        echo "مسابقات اصحاب المنتجات التجارية";
        break;
    case 'sponsor-contest':
        echo "مسابقات شركاء النجاح";
        break;
    case 'voter_register':
        echo "تسجيل حساب مصوت";
        break;
    case 'accounts':
        echo "الحسابات الداعمة";
        break;
    default:
        echo "منصة اليوم الوطني السعودي ٩٠|الرئيسية";
        break;
}
