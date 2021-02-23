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
            <h1 class="m-0 text-dark">View Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Category</li>
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
                    <th>CategoryName</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                          $get_category_name="SELECT * FROM `package_category` ORDER BY `package_category`.`category_id` DESC";
                          $get_category_name_result=mysqli_query($conn,$get_category_name);
                          if(mysqli_num_rows($get_category_name_result)>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($get_category_name_result)){
                              $row_category_id=$row['category_id'];
                              $i++;
                               $row_category_name=$row['category_name'];
                               ?><tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $row_category_name;?></td>
                              <td><a href="edit_category.php?category_id=<?php echo $row_category_id;?>">Edit</a></td>
                              <td><a href="?delete_id=<?php echo $row_category_id;?>">Delete</a></td>
                            </tr>
                               <?php
                            }
                          }
                          ?>
                 </tbody>
                  <tfoot>
                  <tr>
                     <th>S_No.</th>
                    <th>CategoryName</th>
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
  $category_delete_id=$_GET['delete_id'];
  $delete_query="DELETE FROM package_category WHERE category_id='$category_delete_id'";
  mysqli_query($conn,$delete_query);
  header("Location: view_category.php");
}
?>