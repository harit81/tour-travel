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
            <h1 class="m-0 text-dark">View States</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View States</li>
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
              <form role="form" action="" name="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                   <div class="form-group">
                       
                  </div>
               
              </form>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S_No.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Status</th>
                    <!-- <th>Created Date</th> -->
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                          $get_city_name="SELECT * FROM package_card ORDER BY city_id DESC";
                          $get_city_name_result=mysqli_query($conn,$get_city_name);
                          if(mysqli_num_rows($get_city_name_result)>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($get_city_name_result)){
                              $row_city_id=$row['city_id'];
                              $i++;
                               $row_city_name=$row['name_of_city'];
                               $row_city_image=$row['image_of_city'];
                               $row_city_status=$row['status_of_package'];
                               $row_city_date=$row['created_date'];
                               $row_city_desc=$row['city_desc'];
                               ?><tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $row_city_name;?></td>
                              <td><img src="images/<?php echo $row_city_image; ?>" width="100px;"height="100px;"></td>
                              <td><?php echo $row_city_desc;?></td>
                              <td><?php if($row_city_status==0){echo "Active";}else{echo 'Disable';}?></td>
                              <!-- <td><?php echo $row_city_date;?></td> -->
                              <td><a href="edit_city.php?city_edit_id=<?php echo $row_city_id;?>">Edit</a></td>
                              <td><a href="?delete_id=<?php echo $row_city_id;?>">Delete</a></td>
                            </tr>
                               <?php
                            }
                          }
                          ?>
                 </tbody>
                  <tfoot>
                  <tr>
                    <th>S_No.</th>
                    <th>Name</th>
                    <th>Image</th>
                     <th>Description</th>
                    <th>Status</th>
                   <!--  <th>Created Date</th> -->
                    <th>Edit</th>
                    <th>Delete</th>
                   
                  </tr>
                  </tfoot>
                </table>    
            </div> 
                        
    </section>    
  </div>
  <?php include("layouts/footer.php"); ?>
</div>
<?php include("layouts/scripts.php"); ?>
</body>
</html>
<?php
if(isset($_GET['delete_id'])){
  $city_delete_id=$_GET['delete_id'];
  $delete_query="DELETE FROM package_card WHERE city_id='$city_delete_id'";
  mysqli_query($conn,$delete_query);
  header("Location: view_city.php");
}
?>