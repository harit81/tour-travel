<?php
ob_start();
$server="localhost";
$user="root";
$pass="";
$dbname="tour_travel";
$conn= mysqli_connect($server,$user,$pass,$dbname);
date_default_timezone_set('Asia/Kolkata');
if(!$conn){
    die('connection error'.mysqli_connect_error());
}
?>
