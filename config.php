<?php

date_default_timezone_set("Asia/Jakarta");
//error_reporting(0);

$host     = 'localhost'; // host server
$user     = 'root';  // username server
$pass     = ''; // password server, kalau pakai xampp kosongin saja
$dbname = 'pos_minimarket'; // nama database anda

$config = mysqli_connect($host, $user, '', $dbname);
