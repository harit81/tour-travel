<?php include("layouts/header.php"); 
include('layouts/db.php');
$city = $place_name = $place_image = $package_desc = $total_days = $price = $other_charges = $gst_charges = $total_seat =  $category ="";
$city_error = $place_name_error = $place_image_error = $package_desc_error = $total_days_error = $price_error = $other_charges_error = $gst_charges_error = $total_seat_error = $category_error = "";
if(isset($_GET['edit_package_id'])){
$package_id= $_GET['edit_package_id'];
$get_package_detail="SELECT * FROM package_details WHERE package_id='$package_id'";
$get_package_detail_result=mysqli_query($conn,$get_package_detail);
$get_package_detail_fetch_row=mysqli_fetch_assoc($get_package_detail_result);
$city_id_place= $get_package_detail_fetch_row['city_id'];
$name_of_place= $get_package_detail_fetch_row['name_of_place'];
$image_of_place= $get_package_detail_fetch_row['image_of_place'];
$package_id_table= $get_package_detail_fetch_row['package_id'];
$no_of_day= $get_package_detail_fetch_row['day'];
$total_seat= $get_package_detail_fetch_row['total_seat'];
$desc_of_pack = $get_package_detail_fetch_row['package_desc'];
$price_of_tour= $get_package_detail_fetch_row['price'];
$other_charges= $get_package_detail_fetch_row['other_charges'];
$gst =  $get_package_detail_fetch_row['gst'];
$status = $get_package_detail_fetch_row['package_status'];
$category = $get_package_detail_fetch_row['category'];
if(isset($_POST['package_detail_submit'])){
$city = $_POST['city'];
$place_name = $_POST['place_name'];
$place_image = $_FILES['place_image']['name'];
$tempname = $_FILES['place_image']['tmp_name'];
$folder = "images/" . $place_image;
move_uploaded_file($tempname, $folder);
$total_days = $_POST['total_days'];
$total_seat = $_POST['total_seat'];
$price = $_POST['price'];
$other_charges = $_POST['other_charges'];
$gst_charges = $_POST['gst_charges'];
$status=$_POST['package_status'];
$package_desc = $_POST['package_desc'];
$category = $_POST['category'];
if(empty($city)){
$city_error = 'Please Select city.';
}
if(empty($place_name)){
$place_name_error ='Please Enter Place Name.';
}
if(empty($total_days)){
$total_days_error = 'Please Enter No of Days.';
}
if(empty($total_seat)){
    $total_seat_error = 'Please Enter No of Seat.';
  }
if(empty($category)){
    $category_error = 'Please Select Category.';
  }
if(empty($price)){
$price_error = 'Please Enter Price of Package.';
}
if(empty($package_desc)){
$package_desc_error = 'Please Enter Description of Package.';
}
if(empty($place_image)){
$place_image_error = 'Please Choose Image.';
} /*if(empty($city_error)&&empty($place_name_error)&&empty($place_image_error)&&empty($total_days_error)&&empty($price_error)){*/
else{
$update_package_data = "UPDATE package_details SET city_id='$city',name_of_place='$place_name',image_of_place='$place_image',category='$category',package_desc='$package_desc',total_seat='$total_seat',day='$total_days',price='$price',other_charges='$other_charges',gst='$gst_charges',package_status='$status' WHERE package_id='$package_id'"; 
 if(mysqli_query($conn,$update_package_data)){
    // echo "<script>alert('Package Updated Successfully.');</script>";
    // echo "<script>window.open('view_package_data.php','_self');</script>";
}
}
}
}
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
<?php include("layouts/top_nav.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include("layouts/sidebar.php"); ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Package Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Package Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content Start Here-->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Package Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" name="" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="form-group">
                        <label>Select City</label>
                        <select class="custom-select" name="city">
                          <?php 
                          $get_current_city_detail="SELECT * FROM package_card WHERE city_id='$city_id_place'";
                          $get_current_city_detail_result=mysqli_query($conn,$get_current_city_detail);
                          $fetch_get_current_city_detail=mysqli_fetch_assoc($get_current_city_detail_result);
                          $city_id_table=$fetch_get_current_city_detail['city_id'];
                          $city_name_table=$fetch_get_current_city_detail['name_of_city'];
                          ?>
                          <option value="<?php echo $city_id_table;?>"><?php echo $city_name_table;?></option>
                          <?php 
                          $get_city_name="SELECT * FROM package_card";
                          $get_city_name_result=mysqli_query($conn,$get_city_name);
                          if(mysqli_num_rows($get_city_name_result)>0){
                            while($row=mysqli_fetch_assoc($get_city_name_result)){
                              $row_city_id=$row['city_id'];
                               $row_city_name=$row['name_of_city'];
                               ?>
                                <option value="<?php echo $row_city_id?>"><?php echo $row_city_name;?></option>
                               <?php
                            }
                          }
                          ?>
                          </select>
                      </div>
                      <span class="text-danger"><?php echo $city_error;?></span>
                       <div class="form-group">
                        <label>Select Category</label>
                        <select class="custom-select" name="category" required="required">
                          <?php 
                          $get_category_name="SELECT * FROM package_category WHERE category_id='$category'";
                          $get_category_name_result=mysqli_query($conn,$get_category_name);
                          $get_category_name_fetch_row=mysqli_fetch_assoc($get_category_name_result);
                          $category_id_category_name=$get_category_name_fetch_row['category_id'];
                          $category_name_category_name=$get_category_name_fetch_row['category_name'];
                          ?>
                          <option value="<?php echo $category_id_category_name;?>"><?php echo $category_name_category_name;?></option>
                          <?php 
                          $get_category_name="SELECT * FROM package_category ORDER BY `package_category`.`category_name` ASC";
                          $get_category_name_result=mysqli_query($conn,$get_category_name);
                          if(mysqli_num_rows($get_category_name_result)>0){
                            while($row=mysqli_fetch_assoc($get_category_name_result)){
                              $category_id=$row['category_id'];
                              $category_name=$row['category_name'];
                               ?>
                               <option value="<?php echo $category_id;?>"><?php echo $category_name;?></option>
                               <?php
                            }
                          }
                          ?>
                          </select>
                        </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name of Place</label>
                    <input type="text" class="form-control" id="exampleInput" placeholder="Enter Place" name="place_name" value="<?php echo $name_of_place;?>">
                  </div>
                  <span class="text-danger"><?php echo $place_name_error;?></span>
                   <div class="form-group">
                    <label for="exampleInputFile">Insert Image of Place</label>
                     <img src="images/<?php echo $image_of_place; ?>"  style="float: right;"width="100px;"height="100px;" alt="current image">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="place_image"
                         value="<?php echo $image_of_place;?>">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <span class="text-danger"><?php echo $place_image_error;?></span>
                   <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Package Description ..." name="package_desc"><?php echo $desc_of_pack;?></textarea>
                      </div>
                    </div>
                  </div>
                   <span class="text-danger"><?php echo $package_desc_error;?></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter no of Day</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter no of Day" min="1" name="total_days" value="<?php echo $no_of_day;?>">
                  </div>
                  <span class="text-danger"><?php echo $total_days_error;?></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Total no of Seat</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter no of Seat" min="1" name="total_seat" value="<?php echo $total_seat;?>">
                  </div>
                  <span class="text-danger"><?php echo $total_seat_error;?></span>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Enter Price</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter Price" min="0" name="price" value="<?php echo $price_of_tour;?>">
                  </div>
                  <span class="text-danger"><?php echo $price_error;?></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Other Charges</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter Other Charges" min="0" name="other_charges" value="<?php echo $other_charges;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Gst % (percentage)</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter GST amount" min="0" max="25"name="gst_charges" value="<?php echo $gst;?>">
                  </div>
                   <div class="form-group">
                        <label>Select Status</label>
                        <select class="custom-select" name="package_status">
                          <option value="<?php echo $status;?>"><?php if($status==0){echo 'Active';}else{echo 'Disable';}?></option>
                          <option value="0">Active</option>
                           <option value="1">Disable</option>
                          </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="package_detail_submit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
       
    </section>    


    
    <!-- /.content End Here -->
  </div>
  <!-- /.content-wrapper -->

  <?php include("layouts/footer.php"); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include("layouts/scripts.php"); ?>
</body>
</html>
