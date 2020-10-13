<?php


$conn = mysqli_connect('localhost', 'root', 'root', 'national_day');

if (!$conn) {


    echo "Cannot Connect to Database " . mysqli_error($conn);
}
//mysqli_query($conn, "SET NAMES 'utf8'");
// mysqli_query($conn, "SET CHARACTER SET UTF8");
//mysql_query($conn,"set character_set_server='UTF8'");
mysqli_set_charset($conn, "utf8");
