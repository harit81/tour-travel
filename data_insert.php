<?php
include('layouts/db.php');
if(isset($_POST['add_city_submit'])){
  echo $city_name=$_POST['city_name'];
  echo $city_image=$_FILES['city_image']['name'];
  $tempname = $_FILES['city_image']['tmp_name'];
  $folder = "images/" . $city_image;
  move_uploaded_file($tempname, $folder);
  //if(!empty($city_name_error)&&!empty($city_image_error)){
   echo  $insert_city_data="INSERT INTO package_card(name_of_city,image_of_city)VALUES('$city_name','$city_image')";
    if(mysqli_query($conn,$insert_city_data)){
      echo "string";
    }
  }
?>