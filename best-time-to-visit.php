<?php include("layout/header.php");
include("layout/db.php");
  if(isset($_GET['city_id'])){
    $city_id=$_GET['city_id'];
    $select_city_data_name="SELECT * FROM package_city WHERE package_city_id='$city_id'";
    $select_city_data_result=mysqli_query($conn,$select_city_data_name);
    $row_fetch_city_data=mysqli_fetch_assoc($select_city_data_result);
    $package_city_name=$row_fetch_city_data['package_city_name'];
    $package_city_image=$row_fetch_city_data['package_city_image'];
   // $package_city_thing_to_do=$row_fetch_city_data['thing_to_do'];
    $package_best_time_to_visit=$row_fetch_city_data['best_time_to_visit'];

}
?>
    <div class="page-heading about-heading header-text" style="background-image: url(images/<?php echo $package_city_image;?>);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2><?php echo $package_city_name;?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <div class="section">
      <div class="container">
        <div class="section-heading" style="border: 0">
          <h2 style="color:#DA2128;">Best Time to Visit <?php echo $package_city_name;?></h2><hr>
          <h6 style="text-align: justify;"><?php echo  $package_best_time_to_visit;?></h6>
        </div>

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
            <!--  <a href="user-details.php?package_id=<?php echo $package_id_form_package_detail;?>"><button type="submit" id="form-submit" class="filled-button">Book Online</button></a> -->
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
