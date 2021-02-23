<?php
include("layout/db.php");
include("layout/header.php");
?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Find your car today!</h4>
            <h2>Book Your Holiday</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Fugiat Aspernatur</h4>
            <h2>Book Your Holiday</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Saepe Omnis</h4>
            <h2>Book Your Holiday</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->
        <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Trending Indian Destinations</h2>
              <a href="package-category.php">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
 <?php 
                          $get_city_name="SELECT * FROM package_card WHERE status_of_package='0' ORDER BY city_id DESC LIMIT 3";
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
        <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Packages</h2>
              <a href="packages.php">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
 <?php 
                         $get_package_data="SELECT * FROM `package_details` WHERE package_status ='0'LIMIT 6";
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
              </div>
            </div>
          </div>
<?php
}}
?> 
    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Us</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <p>Travel Website Limited (Formerly Travel Website Pvt. Ltd.)  is a step-down subsidiary of Fairfax Financial Holdings Group; held through its Indian listed subsidiary, Thomas Cook (India) Limited (TCIL). SOTC India is a leading travel and tourism company active across various travel seg tempora ipsa. Accusantium tenetur voluptate labore aperiam molestiae rerum excepturi minus in pariatur praesentium, corporis, aliquid dicta.</p>
              <ul class="featured-list">
                <li><a href="#">Leisure Travel</a></li>
                <li><a href="#">Incentive Travel</a></li>
                <li><a href="#">Business Travel</a></li>
              </ul>
              <a href="about-us.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/pexels-te-lensfix-1371360.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest blog posts</h2>

              <a href="blog.php">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php 
           $get_city_name="SELECT * FROM blog ORDER BY blog_id DESC LIMIT 3";
                          $get_city_name_result=mysqli_query($conn,$get_city_name);
                          if(mysqli_num_rows($get_city_name_result)>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($get_city_name_result)){
                              $row_blog_id=$row['blog_id'];
                              $i++;
                               $row_blog_heading=$row['blog_heading'];
                               $row_blog_image=$row['blog_image'];
                               $row_blog_date=$row['date'];
                               $row_blog_desc=$row['blog_desc'];
                               $row_blog_views=$row['views'];
          ?>
           <div class="col-md-4">
                <div class="service-item">
                  <a href="blog-details.php?blog_id=<?php echo $row_blog_id;?>" class="services-item-image"><img src="images/<?php echo $row_blog_image; ?>" class="card-img-top" alt="blog image" width="100%;" height="220px;"></a>

                  <div class="down-content">
                    <h4><a href="blog-details.php?blog_id=<?php echo $row_blog_id;?>"><?php echo $row_blog_heading;?></a></h4>

                    <p style="margin: 0;"><?php $today=new DateTime($row_blog_date);echo '<br>'.$today->format('j-m-Y h:i A');?> | <?php echo $row_blog_views;?></p>
                  </div>
                </div>
              </div>
              <?php }} ?>
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Happy Clients</h2>

              <a href="testimonials.php">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Mohit Sharma</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Rahul Sagwan</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Kapil Kumar</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Radhe Shyam</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Jatin Negi</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Archana</h4>
                  <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Travel customer focused strategies.</h4>
                  <p>Incentive Travel amongst others. Travel’s customer focus, innovation and operational excellence investments.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="contact.php" class="filled-button">Contact Us</a>
                </div>
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


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
</html>