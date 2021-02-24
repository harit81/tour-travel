<?php include("layouts/header.php");
include('layouts/db.php');
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
            <h1 class="m-0 text-dark">View Booking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Booking</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <form role="form" action="" name="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                   <div class="form-group">
                       
                  </div>
               
              </form>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S_No.</th>
                    <th>Package Name</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Phone</th>
                    <th>Tour Price(par Day)</th>
                    <th>Total Tour Price</th>
                    <th>Date of Travel </th>
                     <th>Booking Date </th>
                     <th>User Address</th>
                     <th>Status/Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                   $get_data_from_booking_table="SELECT * FROM package_booking WHERE booking_status='1' ORDER BY booking_id DESC";
                   $result_data_from_booking_table=mysqli_query($conn,$get_data_from_booking_table);
                   if(mysqli_num_rows($result_data_from_booking_table)>0){
                    $i=0;
                    while($fetch_data_from_booking_table=mysqli_fetch_assoc($result_data_from_booking_table)){
                      $i++;
                    $booking_id=$fetch_data_from_booking_table['booking_id'];     
                    $package_id=$fetch_data_from_booking_table['package_id'];  
                    $user_name=$fetch_data_from_booking_table['user_name'];
                    $user_email=$fetch_data_from_booking_table['user_email'];
                    $user_phone=$fetch_data_from_booking_table['user_phone'];
                    $user_address=$fetch_data_from_booking_table['user_address']; 
                    $no_of_adult=$fetch_data_from_booking_table['no_of_adult'];
                    $no_of_child=$fetch_data_from_booking_table['no_of_child'];
                    $total_traveller=$no_of_adult+$no_of_child;
                    $travel_date=$fetch_data_from_booking_table['date_of_travel']; 
                    $tour_price_par_day=$fetch_data_from_booking_table['package_price'];
                    $tour_price=$fetch_data_from_booking_table['total_price'];
                    $gst_price=$fetch_data_from_booking_table['gst_price'];
                    $total_price=$tour_price+$gst_price;
                    $booking_date=$fetch_data_from_booking_table['booking_date'];
                    $booking_status=$fetch_data_from_booking_table['booking_status'];
                    $cancel_status=$fetch_data_from_booking_table['cancel_status'];  

                    $get_package_detail_from_package_id="SELECT * FROM package_details WHERE package_id='$package_id'";
                    $result_package_detail_from_package_id=mysqli_query($conn,$get_package_detail_from_package_id);
                    $fetch_package_detail_from_package_id=mysqli_fetch_assoc($result_package_detail_from_package_id);
                    $package_name=$fetch_package_detail_from_package_id['name_of_place'];
                    $package_duration=$fetch_package_detail_from_package_id['day'];
                               ?><tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $package_name;?> (<?php echo $package_duration;?> Days <?php echo $package_duration-1;?> Nights)</td>
                              <td><?php echo $user_name;?></td>
                              <td><?php echo $user_email;?></td>
                              <td><?php echo $user_phone;?></td>
                              <td><?php echo $tour_price_par_day;?></td>
                              <td><?php echo $total_price;?></td>
                              <td><?php echo $travel_date;?></td>
                              <td><?php echo $booking_date;?></td>
                              <td><?php echo $user_address;?></td>
                              <td>
                                <?php 
                                if($cancel_status==0){?>
                                   <button type="button" class="btn btn-success" name="edit">Booked</button> 
                                <a href="edit-booking-verify.php?booking_id=<?php echo $booking_id;?>"><button type="button" class="btn btn-dark" name="edit">Edit</button></a>
                                <a href="cancel-booking-verify.php?cancel_id=<?php echo $booking_id;?>"><button type="button" class="btn btn-danger" name="delete">Cancellation</button></a>
                                  <?php
                                    }else{?>
 <button type="button" class="btn btn-danger" name="edit">Cancelled</button>
                                   <?php }
                                  ?>
                                  </td>
                            </tr>
                               <?php
                            }
                          }
                          ?>
                 </tbody>
                  <tfoot>
                  <tr>
                   <th>S_No.</th>
                    <th>Package Name</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Phone</th>
                    <th>Tour Price(par Day)</th>
                    <th>Total Tour Price</th>
                    <th>Date of Travel </th>
                    <th>Booking Date </th>
                    <th>User Address</th>
                    <th>Status/Action</th>
                  </tr>
                  </tfoot>
                </table>    
            </div> 
                        
    </section>    
  </div>
  <?php include("layouts/footer.php"); ?>
</div>
<?php include("layouts/scripts.php"); ?>
</body>
</html>
<?php
if(isset($_GET['delete_id'])){
  $city_delete_id=$_GET['delete_id'];
  $delete_query="DELETE FROM package_card WHERE city_id='$city_delete_id'";
  mysqli_query($conn,$delete_query);
  header("Location: view_city.php");
}
?>