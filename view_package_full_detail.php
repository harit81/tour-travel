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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
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
 <?php if(isset($_GET['package_id'])){
  $package_id=$_GET['package_id'];
                          $get_data_of_all_package="SELECT * FROM package_details WHERE package_status='0' AND city_id='$package_id'";
                          $get_data_of_all_package_result=mysqli_query($conn,$get_data_of_all_package);
                          if(mysqli_num_rows($get_data_of_all_package_result)>0){
                            while($row_fetch_all_package=mysqli_fetch_assoc($get_data_of_all_package_result)){
                            $package_id_all_package=$row_fetch_all_package['package_id'];
                          //$package_id=$_GET['package_id'];
                          $get_package_full_detail="SELECT * FROM `package_details` WHERE package_id='$package_id_all_package'";
                          $get_package_full_detail_result=mysqli_query($conn,$get_package_full_detail);
                          $get_package_full_detail_fetch_row=mysqli_fetch_assoc($get_package_full_detail_result);
                          $package_id_form_package_detail=$get_package_full_detail_fetch_row['package_id'];
                          $name_of_package=$get_package_full_detail_fetch_row['name_of_place'];
                          $image_of_package=$get_package_full_detail_fetch_row['image_of_place'];
                          $desc_of_package=$get_package_full_detail_fetch_row['package_desc'];
                          $day_of_package=$get_package_full_detail_fetch_row['day'];
                          $price_of_package=$get_package_full_detail_fetch_row['price'];
?>
<div class="card" style="width: 30rem;margin-top: 2%;">
  <img src="images/<?php echo $image_of_package; ?>" class="card-img-top" alt="..." width="100%;" height="100%;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $name_of_package;?></h5>
    <p class="card-text"><?php echo $desc_of_package;?></p>
    <h5 class="card-title">Starting Price ₹<?php echo $price_of_package;?></h5>
    <a class="btn btn-outline-dark"><?php echo $day_of_package;?> Day <?php echo $day_of_package-1;?> Nights</a>
    <a href="package_details_simple.php?package_id=<?php echo  $package_id_form_package_detail;?>" class="btn btn-danger" style="float: right;">Book Now</a>
  </div>
</div>

<?php }} ?>
</div>
<?php
}
?>
</div>
</body>
</html>