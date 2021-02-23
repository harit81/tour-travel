<?php include("layout/header.php");
include("layout/db.php");
 if(isset($_GET['package_id'])){
  $package_id=$_GET['package_id'];
  $select_city_name="SELECT * FROM package_details WHERE package_id='$package_id'";
  $select_query=mysqli_query($conn,$select_city_name);
  $select_fetch_row=mysqli_fetch_assoc($select_query);
  $package_name_from_package_deatils=$select_fetch_row['name_of_place'];
  $price_from_package_deatils=$select_fetch_row['price'];
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
    <?php if(isset($_GET['package_id'])){
                          $package_id=$_GET['package_id'];
                          $get_package_full_detail="SELECT * FROM `package_details` WHERE package_id='$package_id'";
                          $get_package_full_detail_result=mysqli_query($conn,$get_package_full_detail);
                          $get_package_full_detail_fetch_row=mysqli_fetch_assoc($get_package_full_detail_result);
                          $package_id_form_package_detail=$get_package_full_detail_fetch_row['package_id'];
                          $name_of_package=$get_package_full_detail_fetch_row['name_of_place'];
                          $image_of_package=$get_package_full_detail_fetch_row['image_of_place'];
                          $desc_of_package=$get_package_full_detail_fetch_row['package_desc'];
                          $day_of_package=$get_package_full_detail_fetch_row['day'];
                          $no_of_seat=$get_package_full_detail_fetch_row['total_seat'];
                          $price_of_package=$get_package_full_detail_fetch_row['price'];
                          $city_data=$get_package_full_detail_fetch_row['city_data'];
                          $city_id=$get_package_full_detail_fetch_row['city_id'];

                          $get_no_of_available_seat="SELECT SUM(no_of_adult) FROM package_booking WHERE package_id=$package_id";
                          $get_no_of_available_seat_result=mysqli_query($conn,$get_no_of_available_seat);
                          $row_fetch_no_of_available_seat=mysqli_fetch_assoc($get_no_of_available_seat_result);
                          $available_seat=$row_fetch_no_of_available_seat['SUM(no_of_adult)'];
                          $available_seat_now=$no_of_seat-$available_seat;

?>  
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div>
             <!--  <img src="assets/images/product-details-1-740x540.jpg" alt="" class="img-fluid wc-image"> -->
               <img src="images/<?php echo $image_of_package; ?>" class="img-fluid wc-image" alt="...">
            </div>
            <br>
            <div class="row">
              <?php
              $get_itinerary_detail="SELECT * FROM itinerary_details WHERE package_id='$package_id' ORDER BY day ASC  LIMIT 3";
              $result_get_itinerary_detail=mysqli_query($conn,$get_itinerary_detail);
              if(mysqli_num_rows($result_get_itinerary_detail)>0){
              while($row_fetch=mysqli_fetch_assoc($result_get_itinerary_detail)){
              $itinerary_image=$row_fetch['image'];
              ?>
              <div class="col-sm-4 col-6">
                <div>
                  <img src="images/<?php echo $itinerary_image; ?>" alt="images" class="img-fluid" style="height: 120px;">
                </div>
                <br>
              </div>
            <?php }}?>
              <div class="col-sm-4 col-6">
                <br>
              </div>
            </div>
          </div>
          <div class="col-md-6">
              <p class="lead">
                   <i class="fa fa-calendar"></i> Available: <?php if($available_seat_now > 0){ echo $available_seat_now.' Seat';}else{echo 'Not Available';};?>  &nbsp;&nbsp; <i class="fa fa-cube"></i> <?php echo $day_of_package;?> Day <?php echo $day_of_package-1;?> Nights  ₹ <?php echo $price_of_package;?>
              </p>
              <br>
              <p><i class="fa fa-map-marker"></i>  <strong><?php echo $name_of_package;?></strong></p>
              <br>
              <p><?php echo $desc_of_package;?></p>
               <div class="contact-form" style="float: right;margin-right: 10%;">
                <div class="row">
                  <fieldset>
                    <?php if($available_seat_now > 0){ ?>
                      <a href="user-details.php?package_id=<?php echo $package_id_form_package_detail;?>"><button type="submit" id="form-submit" class="filled-button">Book Online</button></a>
                  <?php  } else { ?>
                      <button  disabled="disabled" type="submit" id="form-submit" class="filled-button">Seat Not Available</button>
                   <?php  }?>
                    </fieldset>
                </div></div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="section-heading" style="border: 0">
          <h2>Itinerary</h2>
        </div>

        <div class="table-responsive">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
               <thead>
               </thead>
               
               <tbody>
                   <?php 
$package_id_form_package_detail;
$get_itinerary_detail="SELECT * FROM itinerary_details WHERE package_id='$package_id' ORDER BY day ASC ";
$result_get_itinerary_detail=mysqli_query($conn,$get_itinerary_detail);
if(mysqli_num_rows($result_get_itinerary_detail)>0){
  while($row_fetch=mysqli_fetch_assoc($result_get_itinerary_detail)){
$itinerary_id=$row_fetch['Itinerary_id'];
$itinerary_day=$row_fetch['day'];
$itinerary_heading=$row_fetch['heading'];
$itinerary_image=$row_fetch['image'];
$itinerary_desc=$row_fetch['description'];
?>
                    <tr>
                         <td><strong>Day:<?php echo $itinerary_day;?></strong></td>
                          <td><img src="images/<?php echo $itinerary_image; ?>" style="float: right;"width="100px;"height="100px;" 
                    alt="current image"></td>
                         <td><span style="font-weight: 500;"><?php echo $itinerary_heading;?></span></td>
                         <td> <?php echo $itinerary_desc;?></td>
                    </tr>
<?php }}?>
               </tbody>
          </table>       
        </div>
      </div>
    </div>
<?php }?>
<?php
if(isset($_POST['enquiry_submit'])){
$name=$_POST['full_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$insert_enquiry_data="INSERT INTO enquiry(name,email,phone,subject,message)VALUES('$name','$email','$phone','$subject','$message')";
mysqli_query($conn,$insert_enquiry_data);  
}
?>   

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="section-heading">
              <h2>Enquiry</h2>
            </div>

            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-sm-6">
                    <fieldset>
                      <input  type="text" class="form-control" id="name" placeholder="Name"  name="full_name" required="">
                    </fieldset>
                  </div>

                  <div class="col-sm-6">
                    <fieldset>
                      <input name="email" type="email" class="form-control" id="email" placeholder="Email" name="email" required="">
                    </fieldset>
                  </div>

                  <div class="col-sm-6">
                    <fieldset>
                      <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" name="phone" required="">
                    </fieldset>
                  </div>

                  <div class="col-sm-6">
                    <fieldset>
                      <input type="text" class="form-control" id="email" placeholder="Subject" name="subject" required="">
                    </fieldset>
                  </div>
                  
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea rows="6" class="form-control" id="message" placeholder="Notes" name="message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button" name="enquiry_submit">Send Request</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-md-3">
            <div class="section-heading">
              <h2>Booking terms</h2>
            </div>

            <p>Donec dapibus semper sem, ac ultrices sem sagittis ut. Donec sit amet erat elit, sed pellentesque odio. In enim ligula, euismod a adipiscing in, laoreet quis turpis. Ut accumsan dignissim rutrum. Mauris tincidunt sollicitudin mi eu congue. Suspendisse tincidunt cursus porttitor. Fusce pharetra lorem vel dolor imperdiet malesuada. Ut porttitor gravida quam, eu alique.</p>
             <div class="contact-form" style="float: right;margin-right: 10%;margin-top: 13%;">
                <div class="row">
                  <fieldset>
             <a href="user-details.php?package_id=<?php echo $package_id_form_package_detail;?>"><button type="submit" id="form-submit" class="filled-button">Book Online</button></a>
               </fieldset>
                </div></div>
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
