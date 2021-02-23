<?php include("layouts/header.php");
include('layouts/db.php');
$city_image = $city_name = $city_desc = "";
$city_image_error = $city_name_error = $city_desc_error = "";
if(isset($_GET['city_edit_id'])){
$city_id=$_GET['city_edit_id'];
$get_edit_data="SELECT * FROM package_card WHERE city_id='$city_id'";
$get_edit_data_result=mysqli_query($conn,$get_edit_data);
$get_row_of_edit_data_result=mysqli_fetch_assoc($get_edit_data_result);
$get_city_name=$get_row_of_edit_data_result['name_of_city'];
$get_image_of_city=$get_row_of_edit_data_result['image_of_city'];
$get_status_of_city=$get_row_of_edit_data_result['status_of_package'];
$city_desc=$get_row_of_edit_data_result['city_desc'];
 if(isset($_POST['update_city_submit'])){
$city_name=$_POST['city_name'];
$city_image=$_FILES['city_image']['name'];
$tempname = $_FILES['city_image']['tmp_name'];
$folder = "images/" . $city_image;
move_uploaded_file($tempname, $folder);  
$city_status=$_POST['package_city_status'];
$city_desc=$_POST['city_desc'];
if(empty($city_name)){
  $city_image_error = "Please enter name of city"; 
}
if(empty($city_image)){
 $city_image_error = 'Please choose image of city';
 }
 if(empty($city_image_error)&&empty($city_name_error)&&empty($city_desc_error)){
   $update_city_data="UPDATE package_card SET name_of_city='$city_name',image_of_city='$city_image',status_of_package='$city_status',city_desc='$city_desc' WHERE city_id='$city_id'";
 mysqli_query($conn,$update_city_data);
  header("Location: view_city.php");
 }
}
}
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
            <h1 class="m-0 text-dark">Add States</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add States</li>
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
                        <label>Select States</label>
                        <select class="custom-select" name="city_name">
                          <?php 
                          $get_place_selected_data="SELECT * FROM package_card WHERE city_id='$city_id'";
                          $get_place_selected_data_result=mysqli_query($conn,$get_place_selected_data);
                          $get_place_selected_data_fetch_row=mysqli_fetch_assoc($get_place_selected_data_result);
                          $city_id_selected=$get_place_selected_data_fetch_row['city_id'];
                          $city_name_selected=$get_place_selected_data_fetch_row['name_of_city'];
                          ?>
                          <option value="<?php echo $city_id_selected;?>"><?php echo $city_name_selected;?></option>
                          <?php 
                          $get_place_name="SELECT * FROM `states` ORDER BY `states`.`states_name` ASC";
                          $get_place_name_result=mysqli_query($conn,$get_place_name);
                          if(mysqli_num_rows($get_place_name_result)>0){
                            while($row=mysqli_fetch_assoc($get_place_name_result)){
                              $states_id=$row['states_id'];
                               $states_name=$row['states_name'];
                               $row_place_day=$row['day'];
                               ?>
                               <option value="<?php echo $states_name;?>"><?php echo $states_name?></option>
                               <?php
                            }
                          }
                          ?>
                          </select>
                      </div>
                  <span class="text-danger"><?php echo $city_name_error; ?></span>
                   <div class="form-group">
                    <label for="exampleInputFile">Insert Image</label>
                    <img src="images/<?php echo $get_image_of_city; ?>"  style="float: right;"width="100px;"height="100px;" alt="current image">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="city_image" value="<?php echo $get_image_of_city;?>">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <span class="text-danger"><?php echo $city_image_error; ?></span>
                   <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter city Description ..." name="city_desc"><?php echo $city_desc;?></textarea>
                      </div>
                    </div>
                  </div>
                   <span class="text-danger"><?php echo $city_desc_error; ?></span>
                    <div class="form-group">
                        <label>Select Status</label>
                        <select class="custom-select" name="package_city_status">
                          <option value="<?php echo $get_status_of_city;?>"><?php if($get_status_of_city==0){echo 'Active';}else{echo 'Disable';}?></option>
                          <option value="0">Active</option>
                           <option value="1">Disable</option>
                          </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update_city_submit">Submit</button>
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
