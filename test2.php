<?php
  include("layout/db.php");
function get_package_detail(){
  global $conn;
  $package_detail="SELECT * FROM package_details";
  $package_detail_query=mysqli_query($conn,$package_detail);
  if(mysqli_num_rows($package_detail_query)>0){
  while($row_fetch=mysqli_fetch_assoc($package_detail_query)){
  echo   '<br>package_id:'.$package_id=$row_fetch['package_id'];
  // return $package_id;
    }
  }
}


function insert_data($t_id, $package_show, $city_data){
  global $conn;
  $insert_query="INSERT INTO test(t_id,package_show,city_data)VALUES('$t_id','$package_show','$city_data')";
  mysqli_query($conn,$insert_query); 
  echo 'DATA INSERTED '; 
}


function update_data($t_id, $package_show, $city_data){
global $conn;
 $select_data="SELECT * FROM test WHERE t_id=$t_id";
 $select_data_query=mysqli_query($conn,$select_data);
 $select_data_get_row=mysqli_fetch_assoc($select_data_query);
 echo '<br>Data Before Update';
 echo '<br>'.$t_id= $select_data_get_row['t_id']; 
 echo '<br>'.$t_package_show= $select_data_get_row['package_show'];
 echo '<br>'.$t_city_data= $select_data_get_row['city_data']; 

 $edit_data = "UPDATE test SET package_show='$package_show',city_data='$city_data' WHERE t_id='$t_id'";
 mysqli_query($conn,$edit_data);
 echo '<br>Data After Update';
 $select_data="SELECT * FROM test WHERE t_id=$t_id";
 $select_data_query=mysqli_query($conn,$select_data);
 $select_data_get_row=mysqli_fetch_assoc($select_data_query);

 echo '<br>'.$t_id= $select_data_get_row['t_id']; 
 echo '<br>'.$t_package_show= $select_data_get_row['package_show'];
 echo '<br>'.$t_city_data= $select_data_get_row['city_data']; 
}


function delete_deta($delete_id){
  global $conn;
  $mysql_delete="DELETE FROM TEST WHERE t_id='$delete_id'";
  mysqli_query($conn,$mysql_delete);
  echo '<br>Data Delete where t_id='.$delete_id;
}
?>