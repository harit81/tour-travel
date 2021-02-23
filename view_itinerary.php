<?php include("layouts/header.php");
include('layouts/db.php');
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
            <h1 class="m-0 text-dark">View Itinerary</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Itinerary</li>
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
              <form role="form" action="" name="" method="POST">
                <div class="card-body">
                   <div class="form-group">
                        <label>Select Package</label>
                        <select class="custom-select" name="package_id">
                          <option value="">Select Package</option>
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
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="search_itinerary">Submit</button>
                </div>
              </form>
              <?php 
              if(isset($_POST['search_itinerary'])){
                $package_id_search_itinerary=$_POST['package_id'];
              ?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Day</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                          $get_city_name="SELECT * FROM `itinerary_details` WHERE package_id='$package_id_search_itinerary'  ORDER BY day ASC";
                          $get_city_name_result=mysqli_query($conn,$get_city_name);
                          if(mysqli_num_rows($get_city_name_result)>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($get_city_name_result)){
                              $row_itinerary_id=$row['Itinerary_id'];
                              $i++;
                               $row_package_id=$row['package_id'];
                               $get_name_of_package="SELECT * FROM package_details WHERE package_id='$row_package_id'";
                               $get_name_of_package_result=mysqli_query($conn,$get_name_of_package);
                               $get_name_of_package_row=mysqli_fetch_assoc($get_name_of_package_result);
                               $package_name=$get_name_of_package_row['name_of_place'];
                               $row_day=$row['day'];
                               $row_heading=$row['heading'];
                               $row_image=$row['image'];
                               $row_desc=$row['description'];
                               ?><tr>
                              <td><?php echo $row_day;;?></td>
                              <td><?php echo $package_name;?></td>
                              <td><img src="images/<?php echo $row_image; ?>" width="100px;"height="100px;" alt="current Image"></td>
                              <td><?php echo $row_heading;?></td>
                              <td><?php echo $row_desc;?></td>
                              <td><a href="edit_itinerary.php?itinerary_edit_id=<?php echo $row_itinerary_id;?>">Edit</a></td>
                              <td><a href="?itinerary_delete_id=<?php echo $row_itinerary_id;?>">Delete</a></td>
                            </tr>
                               <?php
                            }
                          }
                          ?>
                 </tbody>
                  <tfoot>
                  <tr>
                   <th>Day</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
                </table>    
              <?php }?>
            </div> 
                        
    </section>    
  </div>
  <?php include("layouts/footer.php"); ?>
</div>
<?php include("layouts/scripts.php"); ?>
</body>
</html>
<?php
if(isset($_GET['itinerary_delete_id'])){
  $delete_id=$_GET['itinerary_delete_id'];
  $delete="DELETE FROM itinerary_details WHERE Itinerary_id='$delete_id'";
  mysqli_query($conn,$delete);
  header("Location: view_itinerary.php");
}
?>