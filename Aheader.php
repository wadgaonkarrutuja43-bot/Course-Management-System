<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
     <!-- Bootstrap file -->
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome css -->
    <link rel="stylesheet" href="css/all.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="Admin.css">
</head>

<body>
    <!--Top Navbar -->
<nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php">Course Registration 
    <small class="text-white">Admin Area</small></a>
</nav>

<!-- Side Bar -->
<div class="container-fluid mb-5" style="margin-top:40px; background-image:url('dashboard.jpg'); background-size: cover;
    background-position: center;">
<div class="row">
<nav class="col-sm-3 col-md-2  sidebar py-5 d-print-none" style="margin-top:10px; background-image:url('side.jpg'); background-size: cover;
    background-position: center; height: 100vh;">
<div class="sidebar-sticky">
<ul class="nav flex-column">
<li class="nav-item">
<a class="nav-link" href="Admindashboard.php">
<i class="fa-sharp fa-solid fa-gauge-high"></i>Dashboard</a></li>

<li class="nav-item">
<li class="nav-item">
<a class="nav-link" href="acourses.php">
<i class="fab fa-accessible-icon"></i>Courses</a></li>

<li class="nav-item">
<a class="nav-link" href="lessons.php">
<i class="fab fa-accessible-icon"></i>Lessons</a</li>

<li class="nav-item">
<a class="nav-link" href="student.php">
<i class="fas fa-users"></i>Students</a></li>


<li CLass="nav-item">
<a class="nav-link" href="aChangePass.php">
<i class="fas fa-key"></i>Change Password</a></li>

<li class="nav-item">
<a class="nav-link" href="logout.php">
<i class="fas fa-sign-out-alt"></i>Logout</a></li>

</ul>
</div>
</nav>