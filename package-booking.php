<?php include("layout/header.php");
include("layout/db.php");
?>
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Booking Summary</h2>
              <h4>  <?php #echo $price_from_package_deatils;?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>  
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="section-heading">
              <h2>Booking Summary</h2>
            </div>
            <div class="card">
  <div class="card-body">
<?php 
if(isset($_POST['continue_booking'])){
$package_id=$_POST['package_id'];
$user_name=$_POST['user_name'];
$user_email=$_POST['user_email'];
$user_phone=$_POST['user_phone'];
$user_address=$_POST['address'];
$no_of_room=$_POST['no_of_room'];
$no_of_adult=$_POST['no_of_adult'];
$no_of_child=$_POST['no_of_child'];
$date=$_POST['date'];
$tour_price=$_POST['total_price'];
$gst_price=$_POST['gst_price'];
$package_name_from_package_details="SELECT * FROM package_details WHERE package_id='$package_id'";
$result_package_name=mysqli_query($conn,$package_name_from_package_details);
$row_fetch_package_name=mysqli_fetch_assoc($result_package_name);
$package_name_from_package_name=$row_fetch_package_name['name_of_place'];
$package_name_from_package_day=$row_fetch_package_name['day'];
$package_name_from_package_day;
$package_name_from_package_day-1;
$date;
$total_no_of_travellers=$no_of_adult+$no_of_child;
$no_of_room;
$total_no_of_travellers;
$tour_price;
$gst_price;
$total_price=$tour_price+$gst_price;
$get_booking_id_of_user="SELECT * FROM package_booking WHERE user_email='$user_email' AND user_phone='$user_phone' AND package_id='$package_id' AND date_of_travel='$date'";
$result_get_booking_id_of_user=mysqli_query($conn,$get_booking_id_of_user);
$fetch_data_booking_id_of_user=mysqli_fetch_assoc($result_get_booking_id_of_user);
$booking_id=$fetch_data_booking_id_of_user['booking_id'];
$verification_id=$fetch_data_booking_id_of_user['verification_id'];
$update_booking_status="UPDATE package_booking SET booking_status='1' WHERE booking_id='$booking_id'";
mysqli_query($conn,$update_booking_status);
}
?>
<h5>Booking Summary</h5><hr>
<p>Booking Id : <b><?php echo $booking_id;?></b></p>
<p>Verification Id : <b><?php echo $verification_id;?></b></p>
<p><?php echo $package_name_from_package_name;?> - <?php echo $package_name_from_package_day;?> Days <?php echo $package_name_from_package_day-1;?> Nights</p>
  <p>Date of Travel : <b><?php echo $date;?></b></p>
  <p>No of Travellers : <?php echo  $total_no_of_travellers;?></p>
  <p>No of Room : <?php echo $no_of_room;?></p><hr>
  <h5>Fare Break-up</h5><hr>
  <p>Total Tour Cost : ₹ <b><?php echo $tour_price;?></b></p>
  <p>GST @ 5% : ₹ <b><?php echo $gst_price;?></b></p>
  <p>Grand Total : ₹ <b><?php echo $total_price;?></b></p>
   <p></p>
    <p></p>
  </div>
</div>
            <div class="contact-form">
           
            </div>
          </div>

          <div class="col-md-3">
            <div class="section-heading">
              <h2>Booking terms</h2>
            </div>

            <p>Donec dapibus semper sem, ac ultrices sem sagittis ut. Donec sit amet erat elit, sed pellentesque odio. In enim ligula, euismod a adipiscing in, laoreet quis turpis. Ut accumsan dignissim rutrum. Mauris tincidunt sollicitudin mi eu congue. Suspendisse tincidunt cursus porttitor. Fusce pharetra lorem vel dolor imperdiet malesuada. Ut porttitor gravida quam, eu alique.</p>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
