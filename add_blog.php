<?php include("layouts/header.php");
include('layouts/db.php');
$blog_image = $blog_heading = $blog_desc = "";
$blog_image_error = $blog_heading_error = $blog_desc_error = "";
if(isset($_POST['add_blog_submit'])){
$blog_heading=$_POST['blog_heading'];
$blog_image=$_FILES['blog_image']['name'];
$tempname = $_FILES['blog_image']['tmp_name'];
$folder = "images/" . $blog_image;
move_uploaded_file($tempname, $folder);
$blog_desc=$_POST['blog_desc'];
if(empty($blog_heading)){
$blog_heading_error = 'Please enter heading of city';
}
if(empty($blog_desc)){
$blog_desc_error = 'Please enter Description of blog';
}
if(empty($blog_image)){
$blog_image_error = 'Please choose image of blog';
}
if(empty($blog_image_error)&&empty($blog_heading_error)&&empty($blog_desc_error)){
$insert_blog_data="INSERT INTO blog(blog_heading,blog_image,blog_desc)VALUES('$blog_heading','$blog_image','$blog_desc')";
mysqli_query($conn,$insert_blog_data);
header("Location: view_blog.php");
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
            <h1 class="m-0 text-dark">Add Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Blog</li>
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
                    <label for="exampleInputEmail1">Add of Blog Heading</label>
                    <input type="text" class="form-control" id="exampleInput" placeholder="Enter of Blog Heading" name="blog_heading" value="<?php echo $blog_heading;?>">
                  </div>
                  <span class="text-danger"><?php echo $blog_heading_error; ?></span>
                  
                   <div class="form-group">
                    <label for="exampleInputFile">Add Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="blog_image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <span class="text-danger"><?php echo $blog_image_error; ?></span>
                   <div class="form-group">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Add Description</label>
                        <textarea class="form-control" rows="6" placeholder="Enter Blog Description ..." name="blog_desc"><?php echo $blog_desc;?></textarea>
                      </div>
                    </div>
                  </div>
                   <span class="text-danger"><?php echo $blog_desc_error; ?></span>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="add_blog_submit">Submit</button>
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
