<?php include("layouts/header.php");
include('layouts/db.php');
if(isset($_GET['booking_id'])){
$booking_id=$_GET['booking_id'];
$get_data_of_booking="SELECT * FROM package_booking WHERE booking_id='$booking_id'";
$result_data_of_booking=mysqli_query($conn,$get_data_of_booking);
$fetch_booking_data=mysqli_fetch_assoc($result_data_of_booking);
$user_email=$fetch_booking_data['user_email'];
$user_name=$fetch_booking_data['user_name'];
$user_phone=$fetch_booking_data['user_phone'];
$user_address=$fetch_booking_data['user_address'];
$no_of_room=$fetch_booking_data['no_of_room'];
$no_of_adult=$fetch_booking_data['no_of_adult'];
$no_of_child=$fetch_booking_data['no_of_child'];
$travel_date=$fetch_booking_data['date_of_travel'];
$package_id=$fetch_booking_data['package_id'];
$booking_status=$fetch_booking_data['booking_status'];
}
if(isset($_POST['update_booking'])){
$user_email=$_POST['user_email']; 
$user_name=$_POST['user_name']; 
$package_id=$_POST['package_id'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$travel_date=$_POST['travel_date'];
$no_of_room=$_POST['no_of_room'];
$no_of_adult=$_POST['no_of_adult'];
$no_of_child=$_POST['no_of_child'];
$booking_status=$_POST['booking_status'];
$update_booking_detail="UPDATE package_booking SET user_email='$user_email',user_name='$user_name',user_phone='$phone',user_address='$address',no_of_room='$no_of_room',no_of_adult='$no_of_adult',no_of_child='$no_of_child',date_of_travel='$travel_date',package_id='$package_id',booking_status='$booking_status' WHERE booking_id='$booking_id'";
mysqli_query($conn,$update_booking_detail);
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
            <h1 class="m-0 text-dark">Edit Booking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Booking</li>
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
              <form role="form" action="" name="" method="POST">
                <div class="card-body">
                       <div class="form-group">
                    <label for="exampleInputEmail1">User Email</label>
                    <input type="email" class="form-control" id="exampleInput" name="user_email" value="<?php echo $user_email;?>">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control" id="exampleInput" name="user_name" value="<?php echo $user_name;?>">
                  </div>
                   <div class="form-group">
                        <label>Selected Package</label>
                        <select class="custom-select" name="package_id">
                          <?php 
                          $get_name_of_package="SELECT * FROM package_details WHERE package_id='$package_id'";
                          $get_name_of_package_result=mysqli_query($conn,$get_name_of_package);
                          $get_name_of_package_fetch_row=mysqli_fetch_assoc($get_name_of_package_result);
                          $id_of_package=$get_name_of_package_fetch_row['package_id'];
                          $name_of_package=$get_name_of_package_fetch_row['name_of_place'];
                          $day_of_package=$get_name_of_package_fetch_row['day'];
                          ?>
                          <option value="<?php echo $id_of_package;?>"><?php echo $name_of_package;?> (<?php echo $day_of_package;?> Days <?php echo $day_of_package-1 ;?> Nights) </option>
                          <?php 
                          $get_place_name="SELECT * FROM package_details";
                          $get_place_name_result=mysqli_query($conn,$get_place_name);
                          if(mysqli_num_rows($get_place_name_result)>0){
                            while($row=mysqli_fetch_assoc($get_place_name_result)){
                              $row_place_id=$row['package_id'];
                               $row_place_name=$row['name_of_place'];
                               $row_place_day=$row['day'];
                               ?>
                               <option value="<?php echo $row_place_id?>"><?php echo $row_place_name?>( <?php echo $row_place_day;?>  Days <?php echo $row_place_day-1;?> Nights )</option>
                               <?php
                            }
                          }
                          ?>
                          </select>
                      </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="number" class="form-control" id="exampleInput" name="phone" value="<?php echo $user_phone;?>">
                  </div>
                   <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>User Address</label>
                        <textarea class="form-control" rows="3" name="address"><?php echo $user_address?></textarea>
                      </div>
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Date of Travel</label>
                    <input type="date" class="form-control" id="exampleInput" name="travel_date" value="<?php echo $travel_date;?>">
                  </div>
                   <div class="form-group">
                        <label>No of Room</label>
                        <select class="custom-select" name="no_of_room">
                          <option value="<?php echo $no_of_room;?>"><?php echo $no_of_room;?></option>
                          <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                          </select>
                  </div>
                       <div class="form-group">
                        <label>No of Adult</label>
                        <select class="custom-select" name="no_of_adult">
                          <option value="<?php echo $no_of_adult;?>"><?php echo $no_of_adult;?></option>
                          <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                          </select>
                  </div>
                    <div class="form-group">
                        <label>No of Child</label>
                        <select class="custom-select" name="no_of_child">
                          <option value="<?php echo $no_of_child;?>"><?php echo $no_of_child;?></option>
                          <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                          </select>
                  </div>
                   <div class="form-group">
                        <label>Booking Status</label>
                        <select class="custom-select" name="booking_status">
                          <option value="<?php echo $booking_status;?>"><?php if($booking_status==0){echo 'Not Booked';}else{echo 'Booked';}?></option>
                          <option value="0">Not Booked</option>
                           <option value="1">Booked</option>
                          </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update_booking">Submit</button>
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
  <!-- <span class="text-danger"><?php echo $place_name_error;?></span> -->