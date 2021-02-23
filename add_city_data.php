<?php include("layouts/header.php");
include('layouts/db.php');
$city_image = $city_name = $city_desc = "";
$city_image_error = $city_name_error = $city_desc_error = "";
if(isset($_POST['add_city_submit'])){
$city_name=$_POST['city_name'];
$city_image=$_FILES['city_image']['name'];
$tempname = $_FILES['city_image']['tmp_name'];
$folder = "images/" . $city_image;
move_uploaded_file($tempname, $folder);
$city_desc=$_POST['city_desc'];
$thing_to_do=$_POST['thing_to_do'];
$best_time_to_visit=$_POST['best_time_to_visit'];
$how_to_reach=$_POST['how_to_reach'];
$currency=$_POST['currency'];
if(empty($city_name)){
$city_name_error = 'Please enter name of city';
}
if(empty($city_desc)){
$city_desc_error = 'Please enter Description of city';
}
if(empty($city_image)){
$city_image_error = 'Please choose image of city';
}
if(empty($city_image_error)&&empty($city_name_error)&&empty($city_desc_error)){
$insert_city_data="INSERT INTO package_city(package_city_name,package_city_image,package_city_desc,thing_to_do,best_time_to_visit,how_to_reach,currency)VALUES('$city_name','$city_image','$city_desc','$thing_to_do','$best_time_to_visit','$how_to_reach','$currency')";
mysqli_query($conn,$insert_city_data);
header("Location: add_city_data.php");
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
            <h1 class="m-0 text-dark">Add City</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add City</li>
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
                        <label>Select City</label>
                        <select class="custom-select" name="city_name">
                          <option value="">Select City</option>
                          <?php 
                          $get_place_name="SELECT * FROM `cities` ORDER BY `cities`.`city_name` ASC";
                          $get_place_name_result=mysqli_query($conn,$get_place_name);
                          if(mysqli_num_rows($get_place_name_result)>0){
                            while($row=mysqli_fetch_assoc($get_place_name_result)){
                              $states_id=$row['city_id'];
                               $states_name=$row['city_name'];
                              // $row_place_day=$row['day'];
                               ?>
                               <option value="<?php echo $states_name;?>"><?php echo $states_name;?></option>
                               <?php
                            }
                          }
                          ?>
                          </select>
                      </div>
                  <span class="text-danger"><?php echo $city_name_error; ?></span>
                  
                   <div class="form-group">
                    <label for="exampleInputFile">Insert Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="city_image">
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
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Thing to do</label>
                        <textarea class="form-control" rows="3" placeholder="Enter thing to do ..." name="thing_to_do"><?php #echo $city_desc;?></textarea>
                      </div>
                    </div>
                  </div>
                   <!-- <span class="text-danger"><?php echo $city_desc_error; ?></span> -->

                    <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Best time to visit</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Best time to visit ..." name="best_time_to_visit"><?php #echo $city_desc;?></textarea>
                      </div>
                    </div>
                  </div>
                  <!--  <span class="text-danger"><?php echo $city_desc_error; ?></span> -->

                    <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter How to reach</label>
                        <textarea class="form-control" rows="3" placeholder="Enter How to reach ..." name="how_to_reach"><?php #echo $city_desc;?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Currency</label>
                    <input type="text" class="form-control" id="exampleInput" placeholder="Currency Name" name="currency">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="add_city_submit">Submit</button>
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
