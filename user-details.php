<?php include("layout/header.php");
include("layout/db.php");
 if(isset($_GET['package_id'])){
  $package_id=$_GET['package_id'];
  $select_city_name="SELECT * FROM package_details WHERE package_id='$package_id'";
  $select_query=mysqli_query($conn,$select_city_name);
  $select_fetch_row=mysqli_fetch_assoc($select_query);
  $package_name_from_package_deatils=$select_fetch_row['name_of_place'];
  $price_from_package_deatils=$select_fetch_row['price'];
  $no_of_seat=$select_fetch_row['total_seat'];
}
?>
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2><?php echo $package_name_from_package_deatils;?></h2>
              <h4>₹  <?php echo $price_from_package_deatils;?></h4>
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
              <h2>Calculate Price</h2>
            </div>

            <div class="contact-form">
             <form action="" method="POST">
              <div class="row">
    <div class="form-group col-md-3">
      <label for="exampleFormControlSelect1">Room</label>
      <select class="form-control" id="exampleFormControlSelect1" name="no_of_room" value="<?php echo $room;?>">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="exampleFormControlSelect1">Adult</label>
      <select class="form-control" id="exampleFormControlSelect1" name="no_of_adult" value="<?php echo $adult;?>">
 <?php echo $no_of_seat;
          $get_no_of_available_seat="SELECT SUM(no_of_adult) FROM package_booking WHERE package_id=$package_id";
                          $get_no_of_available_seat_result=mysqli_query($conn,$get_no_of_available_seat);
                          $row_fetch_no_of_available_seat=mysqli_fetch_assoc($get_no_of_available_seat_result);
                          $available_seat=$row_fetch_no_of_available_seat['SUM(no_of_adult)'];
                      echo    $available_seat_now=$no_of_seat-$available_seat;
                      for($i=1;$i<=$available_seat_now;$i++){?>

        <option value="<?php echo $i;?>"><?php echo $i;}?></option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="exampleFormControlSelect1">Child <!-- (With bed) --></label>
      <select class="form-control" id="exampleFormControlSelect1" name="child_with_bed" value="<?php echo $child_with_bed;?>">
        <option>0</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="exampleFormControlInput1">Date of Travel</label>
      <input type="date" class="form-control" id="exampleFormControlInput1" name="travel_date" value="<?php echo $date;?>">
    </div>
    <div class="form-group col-md-12">
    <label for="exampleFormControlInput1">Your Name</label>
    <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="username" name="user_name">
     </div>
   <div class="form-group col-md-6">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="user_email">
     </div>
    <div class="form-group col-md-6">
      <label for="exampleFormControlInput1">Mobile Number</label>
      <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="9856321456" name="user_phone" value="<?php echo $user_phone;?>">
  </div>
  <div class="form-group col-md-12">
    <label for="exampleFormControlInput1">Address</label>
   <!--  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="user_email"> -->
   <textarea rows="3" name="address" rows="6" class="form-control" placeholder="Your Address"></textarea>
     </div>
  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button" name="calculate_price">Calculate Package Price</button>
                    </fieldset>
                  </div>
              </form>
              <?php 
if(isset($_POST['calculate_price'])){ 
$room=$_POST['no_of_room'];
$adult=$_POST['no_of_adult'];
$child_with_bed=$_POST['child_with_bed'];
$date=$_POST['travel_date'];
$user_email=$_POST['user_email'];
$user_phone=$_POST['user_phone'];
$user_name=$_POST['user_name'];
$user_address=$_POST['address'];
$package_id;
$price_from_package_deatils;
$string='ASDFGHJKLMNBVCXZQWERTYUIOP1234567890';
$str_shuffle_ok=str_shuffle($string);
$verification_id=substr($str_shuffle_ok, 1,6);
$calculate_price_of_package_by_room=$price_from_package_deatils*$room;
$calculate_price_of_package_by_adult=$price_from_package_deatils*$adult;
if($calculate_price_of_package_by_room>$calculate_price_of_package_by_adult){
$gst_calculate=$calculate_price_of_package_by_room*5/100;
$insert_data_booking_table="INSERT INTO package_booking(verification_id,user_email,user_name,user_phone,user_address,no_of_room,no_of_adult,no_of_child,
     date_of_travel,package_id,package_price,total_price,gst_price)VALUES('$verification_id','$user_email','$user_name','$user_phone','$user_address','$room','$adult','$child_with_bed','$date','$package_id','$price_from_package_deatils','$calculate_price_of_package_by_room','$gst_calculate')";
mysqli_query($conn,$insert_data_booking_table);
?>

       <div class="card" style="width: 15rem;margin-left: 40%;">
       <div class="card-body">
       <h5 class="card-title">Payment Amount</h5>
       <h1 class="card-title">₹ <?php echo $calculate_price_of_package_by_room;?></h1>
       <p><strong>GST 5% ₹<?php echo $gst_calculate;?></strong></p>   
       <form name="" action="package-booking.php" method="POST">
       <input type="hidden" name="user_email" value="<?php echo $user_email;?>">
       <input type="hidden" name="user_phone" value="<?php echo $user_phone;?>">
       <input type="hidden" name="no_of_room" value="<?php echo $room;?>">
       <input type="hidden" name="no_of_adult" value="<?php echo $adult;?>">
       <input type="hidden" name="no_of_child" value="<?php echo $child_with_bed;?>">
       <input type="hidden" name="date" value="<?php echo $date;?>">
       <input type="hidden" name="package_id" value="<?php echo $package_id;?>"> 
       <input type="hidden" name="total_price" value="<?php echo $calculate_price_of_package_by_room;?>">
       <input type="hidden" name="gst_price" value="<?php echo $gst_calculate;?>">
       <button type="submit" id="form-submit" class="filled-button" name="continue_booking">Pay now</button>
       </form>
       </div>
       </div>
<?php
}
else{
$gst_calculate=$calculate_price_of_package_by_adult*5/100;
$insert_data_booking_table="INSERT INTO package_booking(verification_id,user_email,user_name,user_phone,user_address,no_of_room,no_of_adult,no_of_child,
     date_of_travel,package_id,package_price,total_price,gst_price)VALUES('$verification_id','$user_email','$user_name','$user_phone','$user_address','$room','$adult','$child_with_bed','$date','$package_id','$price_from_package_deatils','$calculate_price_of_package_by_adult','$gst_calculate')";
mysqli_query($conn,$insert_data_booking_table);
    ?>
       <div class="card" style="width: 15rem;margin-left: 40%;">
       <div class="card-body">
       <h5 class="card-title">Payment Amount</h5>
       <h1 class="card-title">₹ <?php echo $calculate_price_of_package_by_adult;?></h1>
       <p><strong>GST 5% ₹<?php echo $gst_calculate;?></strong></p>
       <form name="" action="package-booking.php" method="POST">
         <input type="hidden" name="user_name" value="<?php echo $user_name;?>">
       <input type="hidden" name="user_email" value="<?php echo $user_email;?>">
       <input type="hidden" name="user_phone" value="<?php echo $user_phone;?>">
        <input type="hidden" name="address" value="<?php echo $user_address;?>">
       <input type="hidden" name="no_of_room" value="<?php echo $room;?>">
       <input type="hidden" name="no_of_adult" value="<?php echo $adult;?>">
       <input type="hidden" name="no_of_child" value="<?php echo $child_with_bed;?>">
       <input type="hidden" name="date" value="<?php echo $date;?>">
       <input type="hidden" name="package_id" value="<?php echo $package_id;?>">
       <input type="hidden" name="total_price" value="<?php echo $calculate_price_of_package_by_adult;?>">
       <input type="hidden" name="gst_price" value="<?php echo $gst_calculate;?>">
       <button type="submit" id="form-submit" class="filled-button" name="continue_booking">Pay now</button>
       </form>
       </div>
       </div>
<?php
}
} 
?>

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
