<?php include("layouts/header.php"); 
include('layouts/db.php');
$city = $place_name = $place_image = $total_days = $package_desc = $price = $other_charges = $gst_charges = $total_seat = $category_id =
$city_data =  "";
$city_error = $place_name_error = $place_image_error = $total_days_error = $package_desc_error = $price_error = $other_charges_error = $gst_charges_error = $total_seat_error =  $category_id_error =  $city_data_error = "";
if(isset($_POST['package_detail_submit'])){
  $city = $_POST['city'];
  $place_name = $_POST['place_name'];
  $place_image = $_FILES['place_image']['name'];
  $tempname = $_FILES['place_image']['tmp_name'];
  $folder = "images/" . $place_image;
  move_uploaded_file($tempname, $folder);
  $total_days = $_POST['total_days']; 
  $price = $_POST['price'];
  $other_charges = $_POST['other_charges'];
  $gst_charges = $_POST['gst_charges'];
  $package_status= $_POST['package_status'];
  $package_desc = $_POST['package_desc'];
  $total_seat = $_POST['total_seat'];
  $category_id = $_POST['category_id'];
  // $city_data = $_POST['city_data[]'];
  if(empty($city)){
    $city_error = 'Please Select city.';
  }
  if(empty($place_name)){
    $place_name_error ='Please Enter Place Name.';
  }
  if(empty($place_image)){
    $place_image_error = 'Please Choose Image.';
  }
  if(empty($total_days)){
    $total_days_error = 'Please Enter No of Days.';
  }
  if(empty($category_id)){
    $category_id_error = 'Please Select Category.';
  }
  if(empty($city_data)){
    $caity_data_error = 'Please Select City.';
  }
  if(empty($total_seat)){
    $total_seat_error = 'Please Enter No of Seat.';
  }
  if(empty($package_desc)){
   $package_desc_error = 'Please Enter Description of Package.';
  }
  if(empty($price)){
    $price_error = 'Please Enter Price of Package.';
  }
  if(empty($city_error)&&empty($place_name_error)&&empty($place_image_error)&&empty($total_days_error)&&empty($price_error)&&empty($package_desc_error)&&empty($total_seat_error)){
    $count_category_id = count($_POST['category_id']);
    for($i=0;$i<$count_category_id;$i++){
    $category_value = $_POST['category_id'][$i];
    $city_data = $_POST['city_data'][$i];
   // array_push($first_array,$category_value);
      $insert_package_data="INSERT INTO package_details(city_id,city_data,name_of_place,image_of_place,category,package_desc,total_seat,day,price,other_charges,gst,package_status)VALUES('$city','$city_data','$place_name','$place_image','$category_value','$package_desc','$total_seat','$total_days','$price','$other_charges','$gst_charges','$package_status')";
      if(mysqli_query($conn,$insert_package_data)){
    echo "<script>alert('Package created Successfully.');</script>";
    echo "<script>window.open('view_package_data.php','_self');</script>";
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
                        <label>Select States</label>
                        <select class="custom-select" name="city" value="<?php echo $city;?>">
                          <option value="">Select States</option>
                          <?php 
                          $get_city_name="SELECT * FROM package_card";
                          $get_city_name_result=mysqli_query($conn,$get_city_name);
                          if(mysqli_num_rows($get_city_name_result)>0){
                            while($row=mysqli_fetch_assoc($get_city_name_result)){
                              $row_city_id=$row['city_id'];
                               $row_city_name=$row['name_of_city'];
                               ?>
                               <option value="<?php echo $row_city_id?>"><?php echo $row_city_name?></option>
                               <?php
                            }
                          }
                          ?>
                          </select>
                      </div>
                      <span class="text-danger"><?php echo $city_error;?></span>

                      <div class="form-group">
                         <label for="exampleInput">Select Category</label>
                        <div class="custom-control custom-checkbox">                     
                      <?php 
                          $get_category_name="SELECT * FROM package_category ORDER BY `package_category`.`category_name` ASC";
                          $get_category_name_result=mysqli_query($conn,$get_category_name);
                          if(mysqli_num_rows($get_category_name_result)>0){
                          while($row=mysqli_fetch_assoc($get_category_name_result)){
                          $category_id=$row['category_id'];
                          $category_name=$row['category_name'];
                      ?>
                            <input type="checkbox" name="category_id[]" value="<?php echo $category_id;?>">  &nbsp;<?php echo ' '.$category_name;?><br>
                      <?php
                      }}
                      ?>                       
                    </div>
                        <span class="text-danger"><?php echo $category_id_error;?></span>
                    <div class="form-group">
                         <label for="exampleInput">Select City</label>
                        <div class="custom-control custom-checkbox">                     
                      <?php 
                          $get_category_name="SELECT * FROM package_city ORDER BY `package_city`.`package_city_name` ASC";
                          $get_category_name_result=mysqli_query($conn,$get_category_name);
                          if(mysqli_num_rows($get_category_name_result)>0){
                          while($row=mysqli_fetch_assoc($get_category_name_result)){
                          $city_data_id=$row['package_city_id'];
                          $city_data_name=$row['package_city_name'];
                      ?>
                            <input type="checkbox" name="city_data[]" value="<?php echo $city_data_id;?>">  &nbsp;<?php echo ' '.$city_data_name;?><br>
                      <?php
                      }}
                      ?>                       
                    </div>
                        <span class="text-danger"><?php echo $city_data_error;?></span>     
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name of Package</label>
                    <input type="text" class="form-control" id="exampleInput" placeholder="Enter Package Name" name="place_name" value="<?php echo $place_name;?>">
                  </div>
                  <span class="text-danger"><?php echo $place_name_error;?></span>
                   <div class="form-group">
                    <label for="exampleInputFile">Insert Image of Place</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="place_image">
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
                        <textarea class="form-control" rows="3" placeholder="Enter Package Description ..." name="package_desc"><?php echo $package_desc;?></textarea>
                      </div>
                    </div>
                  </div>
                   <span class="text-danger"><?php echo $package_desc_error;?></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Total no of Day</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter no of Day" min="1" name="total_days" value="<?php echo $total_days;?>">
                  </div>
                  <span class="text-danger"><?php echo $total_days_error;?></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Total no of Seat</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter no of Seat" min="1" name="total_seat" value="<?php echo $total_seat;?>">
                  </div>
                  <span class="text-danger"><?php echo $total_seat_error;?></span>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Enter Price</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter Price" min="0" name="price" value="<?php echo $price;?>">
                  </div>
                  <span class="text-danger"><?php echo $price_error;?></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Other Charges</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter Other Charges" min="0" name="other_charges" value="<?php echo $other_charges;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Gst % (percentage)</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter GST amount" min="0" max="25"name="gst_charges" value="<?php echo $gst_charges;?>">
                  </div>
                  <div class="form-group">
                        <label>Select Status</label>
                        <select class="custom-select" name="package_status">
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
