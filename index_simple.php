<?php include('layouts/db.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>View Packages</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="container-fluid" style="max-width: 80%;margin-top: 5%;">
 <?php 
                          $get_city_name="SELECT * FROM package_card WHERE status_of_package='0' ORDER BY city_id DESC";
                          $get_city_name_result=mysqli_query($conn,$get_city_name);
                          if(mysqli_num_rows($get_city_name_result)>0){
                            while($row=mysqli_fetch_assoc($get_city_name_result)){
                              $row_city_id=$row['city_id'];
                              $row_city_desc=$row['city_desc'];
                              $get_price_from_city_id="SELECT * FROM package_details WHERE city_id=$row_city_id";
                              $get_price_from_city_result=mysqli_query($conn,$get_price_from_city_id);
                              $get_price_from_city_fetch_row=mysqli_fetch_assoc($get_price_from_city_result);
                              $price_of_package=$get_price_from_city_fetch_row['price'];
                              $package_id_form_package_detail=$get_price_from_city_fetch_row['city_id'];
                              $row_city_name=$row['name_of_city'];
                              $row_city_image=$row['image_of_city'];
                              $row_city_date=$row['created_date'];
                              $get_no_of_package_in_states="SELECT COUNT(city_id) FROM package_details WHERE city_id='$row_city_id' AND package_status='0'";
                              $get_no_of_package_in_states_result=mysqli_query($conn,$get_no_of_package_in_states);
                              $get_no_of_package_in_states_fetch_row=mysqli_fetch_assoc($get_no_of_package_in_states_result);
                              $count_of_state_package=$get_no_of_package_in_states_fetch_row['COUNT(city_id)'];
                              $get_minimum_price="SELECT MIN(price) FROM package_details WHERE package_status='0' AND city_id='$row_city_id'";
                              $get_minimum_price_result=mysqli_query($conn,$get_minimum_price);
                              $get_minimum_price_fetch_row=mysqli_fetch_assoc($get_minimum_price_result);
                              $minimum_price_of_package=$get_minimum_price_fetch_row['MIN(price)'];
                               ?>
 
<div class="card" style="width: 18rem;margin-top: 2%;">
  <img src="images/<?php echo $row_city_image; ?>" class="card-img-top" alt="..." width="100%;" height="100%;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row_city_name;?></h5>
    <h6 class="card-title">No of Packages :<?php echo $count_of_state_package;?></h6>
    <p class="card-text"><?php echo $row_city_desc;?></p>
    <h5 class="card-title">Starting Price ₹<?php echo $minimum_price_of_package;?></h5>
    <a href="view_package_full_detail.php?package_id=<?php echo  $package_id_form_package_detail;?>" class="btn btn-primary">View Packages</a>
  </div>
</div>
<?php
}}
?>
</div>
</body>
</html>