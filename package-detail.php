<?php include("layout/header.php");
include("layout/db.php");
 if(isset($_GET['city_id'])){
  $package_id=$_GET['city_id'];
  $select_city_name="SELECT * FROM package_card WHERE city_id='$package_id'";
  $select_query=mysqli_query($conn,$select_city_name);
  $select_fetch_row=mysqli_fetch_assoc($select_query);
  $city_name_from_package_card=$select_fetch_row['name_of_city'];
}?>

    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2><?php echo $city_name_from_package_card;?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          	      <div class="row">
          	 <?php if(isset($_GET['city_id'])){
  $package_id=$_GET['city_id'];
                          $get_data_of_all_package="SELECT * FROM package_details WHERE package_status='0' AND city_id='$package_id'";
                          $get_data_of_all_package_result=mysqli_query($conn,$get_data_of_all_package);
                          if(mysqli_num_rows($get_data_of_all_package_result)>0){
                            while($row_fetch_all_package=mysqli_fetch_assoc($get_data_of_all_package_result)){
                            $package_id_all_package=$row_fetch_all_package['package_id'];
                          //$package_id=$_GET['package_id'];
                          $get_package_full_detail="SELECT * FROM `package_details` WHERE package_id='$package_id_all_package'";
                          $get_package_full_detail_result=mysqli_query($conn,$get_package_full_detail);
                          $get_package_full_detail_fetch_row=mysqli_fetch_assoc($get_package_full_detail_result);
                          $package_id_form_package_detail=$get_package_full_detail_fetch_row['package_id'];
                          $name_of_package=$get_package_full_detail_fetch_row['name_of_place'];
                          $image_of_package=$get_package_full_detail_fetch_row['image_of_place'];
                          $desc_of_package=$get_package_full_detail_fetch_row['package_desc'];
                          $day_of_package=$get_package_full_detail_fetch_row['day'];
                          $price_of_package=$get_package_full_detail_fetch_row['price'];
?>
      
              <div class="col-md-4">
                <div class="service-item">
                  <a href="package-details.php?package_id=<?php echo $package_id_form_package_detail;?>" class="services-item-image"><img src="images/<?php echo $image_of_package; ?>" class="card-img-top" alt="..." width="100%;" height="220px;"></a>

                  <div class="down-content">
                    <h4><a href="package-details.php?package_id=<?php echo $package_id_form_package_detail;?>"><?php echo $name_of_package;?></a></h4>

                    <p style="margin: 0;font-weight: 600;"><?php echo $day_of_package;?> Day <?php echo $day_of_package-1;?> Nights</p>
                    <p style="margin: 0;font-weight: bold;">₹<?php echo $price_of_package;?></p>
                  </div>
                </div>
              </div>
          <?php }}}?>
           

              <div class="col-md-12">
                <ul class="pages">
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
              </div>
            </div>
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
