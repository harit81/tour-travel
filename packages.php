<?php
include("layout/header.php");
include("layout/db.php");?>
    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <!-- <h4>Lorem ipsum dolor sit amet</h4> -->
              <h2>Packages</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="products">
      <div class="container">
        <div class="row">
<?php 
                         $get_package_data="SELECT * FROM `package_details` WHERE package_status ='0'";
                         $get_package_data_result=mysqli_query($conn,$get_package_data);
                         if(mysqli_num_rows($get_package_data_result)>0){
                          while($row_fetch_of_package_data=mysqli_fetch_assoc($get_package_data_result)){
                         $package_image=$row_fetch_of_package_data['image_of_place'];
                         $package_name=$row_fetch_of_package_data['name_of_place'];
                         $package_id=$row_fetch_of_package_data['package_id'];
                         $package_desc=$row_fetch_of_package_data['package_desc'];
                         $package_desc_limit=substr($package_desc,0,50);
                         $package_price=$row_fetch_of_package_data['price'];

                               ?>
   
          <div class="col-md-4">
            <div class="product-item">
              <a href="package-details.php?package_id=<?php echo $package_id;?>"><img src="images/<?php echo $package_image; ?>" class="card-img-top" alt="..." width="100%;" height="220px;"></a>
              <div class="down-content">
                <a href="package-details.php?package_id=<?php echo $package_id;?>"><h4><?php echo $package_name;?></h4></a>
                <h6>Price ₹<?php echo $package_price;?></h6>
                <p><?php echo $package_desc_limit;?></p>
                <a href="?<?php echo $package_id;?>"></a>
              </div>
            </div>
          </div>
<?php }}?>
 
          <div class="col-md-12">
            <ul class="pages">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
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
