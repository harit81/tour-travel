 <?php
 include("layout/db.php");
if(isset($_POST['package_detail_submit'])){
$delete_id=$_POST['delete_all_id'];
$delete_id_count=count($delete_id);
for($i=0;$i<$delete_id_count;$i++){
$delete_id_value=$_POST['delete_all_id'][$i];
$delete_contact_data="DELETE FROM contact_us WHERE contact_id='$delete_id_value'";
mysqli_query($conn,$delete_contact_data);
}}

 ?>


  <form action="" method="POST">

                   <?php include("layout/db.php");
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
                               
                               ?><?php echo $i;?>
                             <?php echo $row_contact_name;?>
                              <?php echo $row_contact_email;?>
                              <?php echo $row_contact_subject;?>
                              <?php echo $row_contact_message;?>
                              <a href="?delete_id=<?php echo $row_contact_id;?>">Delete</a>
                                <input type="checkbox"  name="delete_all_id[]"value="<?php echo $row_contact_id;?>">
                                <!--  <input type="checkbox" name="city_data[]" value="<?php echo $city_data_id;?>">  &nbsp;<?php echo ' '.$city_data_name;?><br> -->

                           
                               <?php
                            }
                          }
                          ?>
                           <button type="submit" class="btn btn-primary" name="package_detail_submit">Submit</button>
                        </form>
