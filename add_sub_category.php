<?php include("layouts/header.php");
include('layouts/db.php');
if(isset($_POST['add_sub_category_submit'])){
$sub_category_name=$_POST['sub_category_name'];
$category_id=$_POST['category_id'];
$insert_category_data="INSERT INTO package_sub_category(category_id,sub_category_name)VALUES('$category_id','$sub_category_name')";
mysqli_query($conn,$insert_category_data);  
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
            <h1 class="m-0 text-dark">Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
                        <label>Select Category</label>
                        <select class="custom-select" name="category_id" required="required">
                          <option value="">Select Category</option>
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
                    <label for="exampleInputEmail1">Name of Sub-Category</label>
                    <input type="text" class="form-control" id="exampleInput" placeholder="Enter Category Name" name="sub_category_name" required="required">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="add_sub_category_submit">Submit</button>
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
