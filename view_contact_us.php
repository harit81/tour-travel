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
            <h1 class="m-0 text-dark">View Contact Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Contact Us</li>
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
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <form action="" method="POST">
                   <?php 
                          $get_contact_us_details="SELECT * FROM contact_us ORDER BY contact_id DESC";
                          $get_contact_us_details_result=mysqli_query($conn,$get_contact_us_details);
                          if(mysqli_num_rows($get_contact_us_details_result)>0){
                            $i=0;
                            while($row=mysqli_fetch_assoc($get_contact_us_details_result)){
                              $row_contact_id=$row['contact_id'];
                              $i++;
                               $row_contact_name=$row['name'];
                               $row_contact_email=$row['email'];
                               $row_contact_subject=$row['subject'];
                               $row_contact_message=$row['message'];
                               
                               ?><tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $row_contact_name;?></td>
                              <td><?php echo $row_contact_email;?></td>
                              <td><?php echo $row_contact_subject;?></td>
                              <td><?php echo $row_contact_message;?></td>
                              <td><a href="?delete_id=<?php echo $row_contact_id;?>">Delete</a>
                                <input type="checkbox"  name="delete_all_id[]"value="<?php echo $row_contact_id;?>">
                                <!--  <input type="checkbox" name="city_data[]" value="<?php echo $city_data_id;?>">  &nbsp;<?php echo ' '.$city_data_name;?><br> -->

                              </td>
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
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
                </table>   
                <button type="submit" class="btn btn-primary" name="package_detail_submit" style="float: right;">Submit</button>
                        </form> 
            </div> 
                        
    </section>    
  </div>
  <?php include("layouts/footer.php"); ?>
</div>
<?php include("layouts/scripts.php"); ?>
</body>
</html>
<?php
if(isset($_POST['package_detail_submit'])){
$delete_id=$_POST['delete_all_id'];
$delete_id_count=count($delete_id);
for($i=0;$i<$delete_id_count;$i++){
$delete_id_value=$_POST['delete_all_id'][$i];
$delete_contact_data="DELETE FROM contact_us WHERE contact_id='$delete_id_value'";
mysqli_query($conn,$delete_contact_data);
}
header("Location: view_contact_us.php");
}
?>