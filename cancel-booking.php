<?php
include('layouts/db.php');
if(isset($_GET['cancel_id'])){
$cancel_id=$_GET['cancel_id'];
$cancel_booking="UPDATE package_booking SET cancel_status='1' WHERE booking_id='$cancel_id'";
if(mysqli_query($conn,$cancel_booking)){
  echo '<script>alert("Booking Cancel Successfully.")</script>';
   echo "<script>window.open('view-booking.php','_self');</script>"; 
}	
}
?>