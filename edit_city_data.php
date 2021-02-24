<?php include("layouts/header.php");
include('layouts/db.php');
$city_image = $city_name = $city_desc = "";
$city_image_error = $city_name_error = $city_desc_error = "";
if(isset($_GET['city_edit_id'])){
$city_id=$_GET['city_edit_id']; 
$get_city_data="SELECT * FROM package_city WHERE package_city_id='$city_id'";
$result_city_data=mysqli_query($conn,$get_city_data);
$row_fetc_city_data=mysqli_fetch_assoc($result_city_data);
$package_city_name_data=$row_fetc_city_data['package_city_name'];
$package_city_image_data=$row_fetc_city_data['package_city_image'];
$package_city_desc_data=$row_fetc_city_data['package_city_desc'];
$package_city_thing_to_do_data=$row_fetc_city_data['thing_to_do'];
$package_city_best_time_data=$row_fetc_city_data['best_time_to_visit'];
$package_city_how_to_reach_data=$row_fetc_city_data['how_to_reach'];
$package_city_place_to_visit_data= $row_fetc_city_data['place_to_visit'];
$package_city_currency_data=$row_fetc_city_data['currency'];
$visa_info=$row_fetc_city_data['visa'];
}
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
$places_to_visit=$_POST['places_to_visit'];
$visa_info=$_POST['visa_info'];
if(empty($city_name)){
$city_name_error = 'Please enter name of city';
}
if(empty($city_desc)){
$city_desc_error = 'Please enter Description of city';
}
if(empty($city_image)){
//$city_image_error = 'Please choose image of city';
  $city_image=$package_city_image_data;
}
if(empty($city_image_error)&&empty($city_name_error)&&empty($city_desc_error)){
echo $update_city_data="UPDATE package_city SET package_city_name='$city_name',package_city_image='$city_image',package_city_desc='$city_desc',thing_to_do='$thing_to_do',best_time_to_visit='$best_time_to_visit',how_to_reach='$how_to_reach',place_to_visit='$places_to_visit',currency='$currency',visa='$visa_info'  WHERE package_city_id='$city_id'";  
mysqli_query($conn,$update_city_data);
header("Location: view_city_data.php");
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
            <h1 class="m-0 text-dark">Edit City</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit City</li>
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
                          <option value="<?php echo $package_city_name_data;?>"><?php echo $package_city_name_data;?></option>
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
                  <span class="text-danger"><?php #echo $city_image_error; ?></span>
                   <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter city Description ..." name="city_desc"><?php echo $package_city_desc_data;?></textarea>
                      </div>
                    </div>
                  </div>
                   <span class="text-danger"><?php echo $city_desc_error; ?></span>

                    <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Thing to do</label>
                        <textarea class="form-control" rows="3" placeholder="Enter thing to do ..." name="thing_to_do"><?php echo $package_city_thing_to_do_data;?></textarea>
                      </div>
                    </div>
                  </div>
                   <!-- <span class="text-danger"><?php echo $city_desc_error; ?></span> -->

                    <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Best time to visit</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Best time to visit ..." name="best_time_to_visit"><?php echo $package_city_best_time_data;?></textarea>
                      </div>
                    </div>
                  </div>
                  <!--  <span class="text-danger"><?php echo $city_desc_error; ?></span> -->

                    <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter How to reach</label>
                        <textarea class="form-control" rows="3" placeholder="Enter How to reach ..." name="how_to_reach"><?php echo $package_city_how_to_reach_data;?></textarea>
                      </div>
                    </div>
                  </div>
                      <div class="form-group">
                    <label for="exampleInputEmail1">Currency</label>
                    <input type="text" class="form-control" id="exampleInput" placeholder="Currency Name" name="currency" value="<?php echo $package_city_currency_data;?>">
                  </div>
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Enter Places to Visit</label>
                 <section class="content">
                   <div class="row">
                      <div class="col-sm-12">
                        <div class="card card-outline card-info">
                         <div class="card-header">
                            <h3 class="card-title">
                              Places to Visit
               
                            </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here" name="places_to_visit" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $package_city_place_to_visit_data;?></textarea>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
  </div>
   <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Visa Infomation</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Visa Infomation ..." name="visa_info"><?php echo $visa_info;?></textarea>
                      </div>
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
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
