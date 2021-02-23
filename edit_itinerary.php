<?php include("layouts/header.php");
include('layouts/db.php');
$package_id = $day_number = $heading = $image = $desc = "";
$package_id_error = $day_number_error = $heading_error = $image_error = $desc_error = "";
if(isset($_GET['itinerary_edit_id'])){
$edit_id=$_GET['itinerary_edit_id'];
$get_itinerary_data="SELECT * FROM itinerary_details WHERE Itinerary_id='$edit_id'";
$get_itinerary_data_result=mysqli_query($conn,$get_itinerary_data);
$get_itinerary_data_fetch=mysqli_fetch_assoc($get_itinerary_data_result);
$package_id_itinerary_data=$get_itinerary_data_fetch['package_id'];
$day_itinerary_data=$get_itinerary_data_fetch['day'];
$heading_itinerary_data=$get_itinerary_data_fetch['heading'];
$image_itinerary_data=$get_itinerary_data_fetch['image'];
$desc_itinerary_data=$get_itinerary_data_fetch['description'];

if(isset($_POST['add_itinerary_submit'])){
 $package_id=$_POST['package_id'];
 $day_number=$_POST['day_number'];
 $heading=$_POST['heading'];
 $image=$_FILES['image']['name'];
 $tempname = $_FILES['image']['tmp_name'];
 $folder = "images/" . $image;
 move_uploaded_file($tempname, $folder);
 $desc=$_POST['desc'];
if(empty($package_id)){
  $package_id_error = "Please Select Package";
}
if(empty($day_number)){
  $day_number_error = "Please Enter no of Day.";
}
if(empty($heading)){
  $heading_error = "Please Enter Heading of the Day.";
}
if(empty($image)){
  $image_error = "Please Insert image of the Day.";
}
if(empty($desc)){
  $desc_error = "Please Enter Description of the Day.";
}else{
 $get_no_of_day="SELECT * FROM package_details WHERE package_id='$package_id'"; 
 $result_get_no_of_day=mysqli_query($conn,$get_no_of_day);
 $row_fetch_data_day=mysqli_fetch_assoc($result_get_no_of_day);
 $day_data=$row_fetch_data_day['day'];
 if($day_data>=$day_number){
 $update_city_data="UPDATE itinerary_details SET package_id='$package_id',day='$day_number',heading='$heading',image='$image',description='$desc' WHERE Itinerary_id='$edit_id'";  
 if(mysqli_query($conn,$update_city_data)){
  echo "<script>alert('Data Update Successfully.');</script>";
echo "<script>window.open('view_itinerary.php','_self');</script>";
}else{
echo "<script>alert('Please Enter correct Itinerary Details.');</script>";
echo "<script>window.open('edit_itinerary.php','_self');</script>";
}
}
}}}
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include("layouts/top_nav.php"); ?>
<?php include("layouts/sidebar.php"); ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Itinerary Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Itinerary Details</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" name="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                   <div class="form-group">
                        <label>Select Package</label>
                        <select class="custom-select" name="package_id">
                          <?php 
                          $get_name_of_package="SELECT * FROM package_details WHERE package_id='$package_id_itinerary_data'";
                          $get_name_of_package_result=mysqli_query($conn,$get_name_of_package);
                          $get_name_of_package_fetch_row=mysqli_fetch_assoc($get_name_of_package_result);
                          $id_of_package=$get_name_of_package_fetch_row['package_id'];
                          $name_of_package=$get_name_of_package_fetch_row['name_of_place'];
                          $day_of_package=$get_name_of_package_fetch_row['day'];
                          ?>
                          <option value="<?php echo $id_of_package;?>"><?php echo $name_of_package;?> (<?php echo $day_of_package;?> Days <?php echo $day_of_package-1 ;?> Nights) </option>
                          <?php 
                          $get_place_name="SELECT * FROM package_details";
                          $get_place_name_result=mysqli_query($conn,$get_place_name);
                          if(mysqli_num_rows($get_place_name_result)>0){
                            while($row=mysqli_fetch_assoc($get_place_name_result)){
                              $row_place_id=$row['package_id'];
                               $row_place_name=$row['name_of_place'];
                               $row_place_day=$row['day'];
                               ?>
                               <option value="<?php echo $row_place_id?>"><?php echo $row_place_name?>( <?php echo $row_place_day;?>  Days <?php echo $row_place_day-1;?> Nights )</option>
                               <?php
                            }
                          }
                          ?>
                          </select>
                      </div>
                      <span class="text-danger"><?php echo $package_id_error; ?></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Day</label>
                    <input type="number" class="form-control" id="exampleInput" placeholder="Enter Day 1,2,3" name="day_number" value="<?php echo $day_itinerary_data;?>">
                  </div>
                   <span class="text-danger"><?php echo $day_number_error; ?></span>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Enter Heading</label>
                    <input type="text" class="form-control" id="exampleInput" placeholder="Enter Heading" name="heading" value="<?php echo $heading_itinerary_data;?>">
                  </div>
                   <span class="text-danger"><?php echo $heading_error; ?></span>
                    <div class="form-group">
                    <label for="exampleInputFile">Insert Image</label>
                    <img src="images/<?php echo $image_itinerary_data; ?>" style="float: right;"width="100px;"height="100px;" 
                    alt="current image">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image" required="required">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <span class="text-danger"><?php echo $image_error; ?></span>
                   <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Description" name="desc"><?php echo $desc_itinerary_data;?></textarea>
                      </div>
                    </div>
                  </div>
                   <span class="text-danger"><?php echo $desc_error; ?></span>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="add_itinerary_submit">Submit</button>
                </div>
              </form>
            </div>       
    </section>    
  </div>
  <?php include("layouts/footer.php"); ?>
</div>
<?php include("layouts/scripts.php"); ?>
</body>
</html>
