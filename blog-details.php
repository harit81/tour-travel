<?php include("layout/header.php");
include("layout/db.php"); 
if(isset($_GET['blog_id'])){
$blog_id = $_GET['blog_id'];
$get_blog_details="SELECT * FROM blog WHERE blog_id='$blog_id'";
$get_blog_details_result=mysqli_query($conn,$get_blog_details);
$get_blog_details_fetch_row=mysqli_fetch_assoc($get_blog_details_result);
 $blog_heading=$get_blog_details_fetch_row['blog_heading'];
 $blog_desc=$get_blog_details_fetch_row['blog_desc'];
 $blog_image=$get_blog_details_fetch_row['blog_image'];
 $blog_date=$get_blog_details_fetch_row['date'];
 $blog_views=$get_blog_details_fetch_row['views'];
 $blog_views_increment=$blog_views+1;
 $update_views="UPDATE blog SET views='$blog_views_increment' WHERE blog_id='$blog_id'";
 mysqli_query($conn,$update_views);
}
?>

    <div class="page-heading about-heading header-text" style="background-image: url(images/<?php echo $blog_image; ?>);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4><i class="fa fa-calendar"></i> <?php $today= new DateTime($blog_date);echo $today->format('j-m-Y h:i A');?>   &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-eye"></i><?php echo ' '.$blog_views;?></h4>
              <h2><?php echo $blog_heading;?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2><?php echo $blog_heading;?></h2>
              </div>
            </div>

            <div class="col-md-10" style="text-align: justify;">
                <p><?php echo $blog_desc;?><br>
            </div>
             <img src="images/<?php echo $blog_image;?>" class="cimg-fluid" alt="blog mid image" width="80%;" style="margin-left: 2%;">
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
