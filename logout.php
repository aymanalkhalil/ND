<?php
session_start();
include_once('includes/connection.php');
switch (key($_GET)) {
    case 'u':
        unset($_SESSION['user_id'], $_SESSION['user_name']);
        header('location:index.php');
        break;
    case 's';
        if (isset($_SESSION['gold'])) {
            unset($_SESSION['sponsor_id'], $_SESSION['sponsor_name'], $_SESSION['gold']);
        } else {
            unset($_SESSION['sponsor_id'], $_SESSION['sponsor_name']);
        }
        header('location:index.php');

        break;

    case 'm';
        unset($_SESSION['merchant_id'], $_SESSION['merchant_name']);
        header('location:index.php');

        break;
    case 'v';
        unset($_SESSION['voter_id'], $_SESSION['voter_name']);
        header('location:index.php');

        break;
    default:
        # code...
        break;
}

// switch ($_SERVER['QUERY_STRING']) {
//     case 'u':
//         unset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['active']);
//         header('location:index.php');
//         break;
//     case 's';
//         unset($_SESSION['sponsor_id'], $_SESSION['sponsor_name'], $_SESSION['active']);
//         header('location:index.php');

//         break;

//     case 'm';
//         unset($_SESSION['merchant_id'], $_SESSION['merchant_name'], $_SESSION['active']);
//         header('location:index.php');

//         break;
//     default:
//         # code...
//         break;
// }
