<?php include("layout/header.php");
include("layout/db.php");
?>
    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Package Category</h2>
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
         <?php 
                          $get_city_name="SELECT * FROM package_card WHERE status_of_package='0' ORDER BY city_id DESC";
                          $get_city_name_result=mysqli_query($conn,$get_city_name);
                          if(mysqli_num_rows($get_city_name_result)>0){
                            while($row=mysqli_fetch_assoc($get_city_name_result)){
                              $row_city_id=$row['city_id'];
                              $row_city_desc=$row['city_desc'];
                              $get_price_from_city_id="SELECT * FROM package_details WHERE city_id=$row_city_id";
                              $get_price_from_city_result=mysqli_query($conn,$get_price_from_city_id);
                              $get_price_from_city_fetch_row=mysqli_fetch_assoc($get_price_from_city_result);
                              $price_of_package=$get_price_from_city_fetch_row['price'];
                              $package_id_form_package_detail=$get_price_from_city_fetch_row['city_id'];
                              $row_city_name=$row['name_of_city'];
                              $row_city_image=$row['image_of_city'];
                              $row_city_date=$row['created_date'];
                              $get_no_of_package_in_states="SELECT COUNT(city_id) FROM package_details WHERE city_id='$row_city_id' AND package_status='0'";
                              $get_no_of_package_in_states_result=mysqli_query($conn,$get_no_of_package_in_states);
                              $get_no_of_package_in_states_fetch_row=mysqli_fetch_assoc($get_no_of_package_in_states_result);
                              $count_of_state_package=$get_no_of_package_in_states_fetch_row['COUNT(city_id)'];
                              $get_minimum_price="SELECT MIN(price) FROM package_details WHERE package_status='0' AND city_id='$row_city_id'";
                              $get_minimum_price_result=mysqli_query($conn,$get_minimum_price);
                              $get_minimum_price_fetch_row=mysqli_fetch_assoc($get_minimum_price_result);
                              $minimum_price_of_package=$get_minimum_price_fetch_row['MIN(price)'];
                               ?>
      
              <div class="col-md-4">
            <div class="product-item">
              <a href="package-detail.php?city_id=<?php echo $row_city_id;?>"><img src="images/<?php echo $row_city_image; ?>" class="card-img-top" alt="..." width="100%;" height="220px;"></a>
              <div class="down-content">
                <a href="package-detail.php?city_id=<?php echo $row_city_id;?>"><h4><?php echo $row_city_name;?></h4></a>

                <h6>Starting Price ₹<?php echo $minimum_price_of_package;?></h6>
                <p>No of Packages :<?php echo $count_of_state_package;?></p>
                <p><?php echo $row_city_desc;?></p>
              </div>
            </div>
          </div>
<?php
}}
?> 
           

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
