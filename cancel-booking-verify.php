<?php include("layouts/header.php");
include('layouts/db.php');
$booking_id = $verification_id = $email_id = $phone_number = "";
$booking_id_error = $verification_id_error = $email_id_error = $phone_number_error = "";
if(isset($_POST['edit_booking'])){
$booking_id=$_POST['booking_id'];
$verification_id=$_POST['verification_id'];
$email_id=$_POST['email_id'];
$phone_number=$_POST['phone_number'];
if(empty($booking_id)){
  $booking_id_error = 'Please Enter Booking id.';
}
if(empty($verification_id)){
  $verification_id_error = 'Please Enter Verification id.';
}
if(empty($email_id)){
  $email_id_error = 'Please Enter Email id.';
}
if(empty($phone_number)){
  $phone_number_error = 'Please Enter Phone Number.';
}
if(empty($booking_id_error)&&empty($verification_id_error)&&empty($email_id_error)&&empty($phone_number_error)){
$select_data_booking="SELECT * FROM package_booking WHERE booking_id='$booking_id' AND verification_id='$verification_id' AND user_email='$email_id' AND user_phone='$phone_number'";
$result_select_data_booking=mysqli_query($conn,$select_data_booking);
if(mysqli_num_rows($result_select_data_booking)==1){
  //echo '<script>alert("Now You can edit Booking Details.")</script>';
   echo "<script>window.open('cancel-booking.php?cancel_id=$booking_id','_self');</script>"; 
}
}
}
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include("layouts/top_nav.php"); ?>
<?php include("layouts/sidebar.php"); ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Verify Booking Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Verify Booking Deatils</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <form role="form" action="" name="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Booking Id</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter Booking Id" name="booking_id">
                  </div>
                   <span class="text-danger"><?php echo $booking_id_error; ?></span>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Enter Verification Id</label>
                    <input type="text" class="form-control" id="exampleInput" placeholder="Enter Verification Id" name="verification_id">
                  </div>
                   <span class="text-danger"><?php echo $verification_id_error; ?></span>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Enter User Email Id</label>
                    <input type="email" class="form-control" id="exampleInput" placeholder="Enter User Email" name="email_id">
                  </div>
                   <span class="text-danger"><?php echo $email_id_error; ?></span>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Enter User Phone No.</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter User Phone No." name="phone_number">
                  </div>
                  <span class="text-danger"><?php echo $phone_number_error; ?></span>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="edit_booking">Submit</button>
                </div>
              </form>
            </div>       
    </section>    
  </div>
  <?php include("layouts/footer.php"); ?>
</div>
<?php include("layouts/scripts.php"); ?>
</body>
</html>
