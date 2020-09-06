<?php


$conn = mysqli_connect('localhost', 'root', 'root', 'national_day');

if (!$conn) {


    echo "Cannot Connect to Database " . mysqli_error($conn);
}