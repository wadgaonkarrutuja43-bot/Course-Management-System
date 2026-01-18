<?php
define('PAGE', 'stuProfile');
include_once('dbconnection.php');
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['is_Login']))
{
    $stuLogEmail = $_SESSION['email'];
}
// else{
//     echo"<script> location='index.php';</script>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Bootstrap file -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome Css -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="../css/style.css"> -->

</head>
<body>
    <!-- top navbar -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0"
    href="stuProfile.php">E-learning</a>
</nav>

<!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top:40px; background-image:url('student.jpg'); padding-bottom: 400px;">
    <div class="row">
        <nav class="col-sm-2 bg-light sidebar py-5 d-print-none"style="background-image:url('std.jpg'); background-size: cover; height: 100vh;">
            <div class="sidebar-sticky" >
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" <?php if(PAGE == 'stuProfile'){echo 'active';}?>
                        href="stuProfile.php">
                        <i class="fas fa-user"></i>
                        Profile<span class="sr-only">(current)</span>
                    </a>
                    </li> 
                    
                    <li class="nav-item">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="stuChangePass.php">
                            <i class="fas fa-key"></i>
                            Change password</a>
                        </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-white" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
</body>
</html>