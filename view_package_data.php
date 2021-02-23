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
            <h1 class="m-0 text-dark">View Packages</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Packages</li>
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
              <form role="form" action=""  method="POST">
                <div class="card-body">
                   <div class="form-group">
                        <label>Select States</label>
                        <select class="custom-select" name="city">
                          <option value="">Select States</option>
                          <?php 
                          $get_city_name="SELECT * FROM `package_card` ORDER BY `package_card`.`name_of_city` ASC";
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
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="search_city">Submit</button>
                </div>
              </form>
              <?php
              if(isset($_POST['search_city'])){
              $city_id_by_search_form=$_POST['city'];
              ?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S_No.</th>
                    <th>States</th>
                    <th>City</th>
                     <th>Category</th>
                      <th>Name of Package</th>
                    <th>Image of Package</th>
                    <th>Total Day</th>
                    <th>Total Seat(available)</th>
                    <th>Price</th>
                    <th>Other charges</th>
                    <th>GST</th>
                    <th>Status</th> 
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                          $get_city_name="SELECT * FROM package_details WHERE city_id='$city_id_by_search_form' ORDER BY package_id DESC";
                          $get_city_name_result=mysqli_query($conn,$get_city_name);
                          if(mysqli_num_rows($get_city_name_result)>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($get_city_name_result)){
                              $row_city_id=$row['package_id'];
                              $i++;
                               $city_id_package_data=$row['city_id'];
                               $name_of_place=$row['name_of_place'];
                               $image_of_place=$row['image_of_place'];
                               $total_day=$row['day'];
                               $total_seat=$row['total_seat'];
                               $price=$row['price'];
                               $other_charges=$row['other_charges'];
                               $gst=$row['gst'];
                               $date=$row['date'];
                               $status=$row['package_status'];
                               $category=$row['category'];
                               $city_data=$row['city_data'];
                               $get_name_of_city="SELECT * FROM package_card WHERE city_id='$city_id_package_data'";
                               $get_name_of_city_result=mysqli_query($conn,$get_name_of_city);
                               $get_name_of_city_fetch=mysqli_fetch_assoc($get_name_of_city_result);
                               $name_of_city_package_data= $get_name_of_city_fetch['name_of_city'];

                               $get_name_of_category="SELECT * FROM package_category WHERE category_id='$category'";
                               $get_name_of_category_result=mysqli_query($conn,$get_name_of_category);
                               $get_name_of_category_fetch=mysqli_fetch_assoc($get_name_of_category_result);
                               $name_of_category_package_data= $get_name_of_category_fetch['category_name'];

                               $get_name_of_city_data="SELECT * FROM package_city WHERE package_city_id='$city_data'";
                               $get_name_of_city_data_result=mysqli_query($conn,$get_name_of_city_data);
                               $get_name_of_city_data_fetch=mysqli_fetch_assoc($get_name_of_city_data_result);
                               $name_of_city_data_data= $get_name_of_city_data_fetch['package_city_name'];

                               $get_no_of_available_seat="SELECT SUM(no_of_adult) FROM package_booking WHERE package_id=$row_city_id";
                               $get_no_of_available_seat_result=mysqli_query($conn,$get_no_of_available_seat);
                               $row_fetch_no_of_available_seat=mysqli_fetch_assoc($get_no_of_available_seat_result);
                               $available_seat=$row_fetch_no_of_available_seat['SUM(no_of_adult)'];
                               $available_seat_now=$total_seat-$available_seat;
                               ?>

                               <tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $name_of_city_package_data;?></td>
                              <td><?php echo $name_of_city_data_data;?></td>
                              <td><?php echo $name_of_category_package_data;?></td>
                              <td><?php echo $name_of_place;?></td>
                               <td><img src="images/<?php echo $image_of_place; ?>" width="100px;"height="100px;"></td>
                              <td><?php echo $total_day;?></td>
                              <td><?php echo $total_seat;?><?php echo '('.$available_seat_now.')';?></td>
                              <td><?php echo $price;?></td>
                              <td><?php echo $other_charges;?></td>
                              <td><?php echo $gst;?></td>
                              <td><?php if($status==0){echo 'Active';}else{ echo 'Disable';}?></td>
                              <td><a href="edit_package_data.php?edit_package_id=<?php echo $row_city_id;?>">Edit</a></td>
                              <td><a href="?delete_package_id=<?php echo $row_city_id;?>">Delete</a></td>
                            </tr>
                               <?php
                            }
                          }
                          ?>
                 </tbody>
                  <tfoot>
                  <tr>
                     <th>S_No.</th>
                     <th>States</th>
                     <th>City</th>
                     <th>Category</th>
                    <th>Name of Package</th>
                    <th>Image of Package</th>
                    <th>Total Day</th>
                    <th>Total Seat</th>
                    <th>Price</th>
                    <th>Other charges</th>
                    <th>GST</th>
                    <th>Status</th>
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
if(isset($_GET['delete_package_id'])){
  $delete_id=$_GET['delete_package_id'];
  $delete_query="DELETE FROM package_details WHERE package_id='$delete_id'";
  mysqli_query($conn,$delete_query);
  header("Location: view_package_data.php");
}
?>