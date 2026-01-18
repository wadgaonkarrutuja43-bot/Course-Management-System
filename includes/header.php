<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online course registration</title>
    <!-- Bootstrap file -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome css -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

<!-- Samp.css -->
<link rel="stylesheet" href="samp.css">
</head>
<body>
<!-- Start Nav -->
<nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Course</a>
    <span class="navbar-text">Learn and Implement</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav custom-nav pl-5">
        <li class="nav-item custom-nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="courses.php">Courses</a>
        </li>

        <?php
        session_start();
          if(isset($_SESSION['is_login']))
          {
            echo  '<li class="nav-item custom-nav-item">
          <a class="nav-link" href="stuProfile.php">My Profile</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';
          }
          else{
            echo '<li class="nav-item custom-nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="signup.php">Signup</a>
        </li>';
          }
        ?>

        <li class="nav-item custom-nav-item">
          <a class="nav-link" href="feedback.php">Feedback</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<!-- End Nav -->