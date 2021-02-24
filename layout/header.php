<?php include("db.php");?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Travel Agency Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Travel <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <!-- <li class="nav-item"><a class="nav-link" href="packages.php">Packages</a></li> -->

                <li class="nav-item"><a class="nav-link" href="city-category.php">City</a></li>
               <!--  <li class="nav-item"><a class="nav-link" href="package-category.php">States</a></li> -->

                 <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>

                 <?php
                 $get_category_deatils="SELECT * FROM package_category LIMIT 2";
                 $get_category_deatils_result=mysqli_query($conn,$get_category_deatils);
                 if(mysqli_num_rows($get_category_deatils_result)>0){
                  while($row_category=mysqli_fetch_assoc($get_category_deatils_result)){
                     $category_id=$row_category['category_id'];
                     $category_name=$row_category['category_name'];
                 ?>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $category_name;?></a>
                      <div class="dropdown-menu" style="font-size: 10px;">
                    <?php
                     $get_state_data="SELECT * FROM package_details  WHERE category='$category_id' LIMIT 5";
                     $get_state_data_result=mysqli_query($conn,$get_state_data);
                     if(mysqli_num_rows($get_state_data_result)>0){
                     while($row_package_card=mysqli_fetch_assoc($get_state_data_result)){
                     $city_id=$row_package_card['package_id'];
                     $city_name=$row_package_card['name_of_place'];  
                    ?>
                      <a class="dropdown-item" href="package-details.php?package_id=<?php echo $city_id;?>"><?php echo $city_name;?> Tour Packages</a>
                    <?php }}
                    ?>
                     <a class="dropdown-item" href="packages.php">View All</a>
                    <?php }}?>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.php">About Us</a>
                      <a class="dropdown-item" href="contact.php">Contact Us</a>
                      <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                      <a class="dropdown-item" href="terms.php">Terms</a>
                    </div>
                </li>
               
               <!--  <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li> -->
            </ul>
          </div>
        </div>
      </nav>
    </header>