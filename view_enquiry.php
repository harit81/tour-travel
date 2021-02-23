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
            <h1 class="m-0 text-dark">View Enquiry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Enquiry</li>
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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                          $get_enquiry_details="SELECT * FROM enquiry ORDER BY enquiry_id DESC";
                          $get_enquiry_details_result=mysqli_query($conn,$get_enquiry_details);
                          if(mysqli_num_rows($get_enquiry_details_result)>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($get_enquiry_details_result)){
                              $row_enquiry_id=$row['enquiry_id'];
                              $i++;
                               $row_enquiry_name=$row['name'];
                               $row_enquiry_email=$row['email'];
                               $row_enquiry_phone=$row['phone'];
                               $row_enquiry_subject=$row['subject'];
                               $row_enquiry_message=$row['message'];
                               ?><tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $row_enquiry_name;?></td>
                              <td><?php echo $row_enquiry_email;?></td>
                              <td><?php echo $row_enquiry_phone;?></td>
                              <td><?php echo $row_enquiry_subject;?></td>
                              <td><?php echo $row_enquiry_message;?></td>
                              <td><a href="?delete_id=<?php echo $row_enquiry_id;?>">Delete</a></td>
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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
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
  $enquiry_delete_id=$_GET['delete_id'];
  $delete_query="DELETE FROM enquiry WHERE enquiry_id='$enquiry_delete_id'";
  mysqli_query($conn,$delete_query);
  header("Location: view_enquiry.php");
}
?>