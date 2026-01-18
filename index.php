<!-- Header -->
<?php 
include('dbconnection.php');
include('includes/header.php');
?>
<!-- Start Main Page -->
<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <div class="vid-overlay"></div>
        <video playsinline autoplay muted loop>
            <source src="video/video2.mp4" type="video/mp4">
        </video>
    </div>
    <div class="vid-content">
            <h6 class="my-content">Welcome to</h6>
            <h1 class="my-content">Online Course Registration</h1>

            <?php
            if(!isset($_SESSION['is_login'])){
                echo '<a href="login.php" class="btn btn-danger mt-3">Get Started</a>';
            }
            else{
                echo '<a class="btn btn-primary mt-3" href="stuProfile.php">My Profile</a>';
            }
            ?>
            
        </div>
</div>
<!-- End main Page -->

 <!-- Text Banner -->
 <div class="container-fluid bg-danger txt-banner">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5> 
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fa-solid fa-indian-rupee-sign"></i> Free Of Cost Access</h5>
            </div>
        </div>
    </div>
    </div>
    <!-- End of text Banner -->

 <div class="container mt-4">
    <h1 class="text-center">All Courses</h1>
    <div class="row mt-4">
        <?php
        // First set of courses
        $sql = "SELECT * FROM addcourse LIMIT 3";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_id = $row["course_id"];
                echo '<div class="col-md-4 mb-4">
                    <a href="cdetail.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                        <div class="card">
                            <img src="'.str_replace('..','.',$row['course_img']).'" class="card-img-top" alt="Guitar" />
                            <div class="card-body">
                                <h5 class="card-title">'.$row['course_name'].'</h5>
                                <p class="card-text">'.$row['course_desc'].'</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original'].'</del></small>
                                    <strong>&#8377 '.$row['course_price'].'</strong>
                                </p>
                                <a class="btn btn-primary" style="text:white; font-weight:bold; float:right;" href="cdetail.php?course_id='.$course_id.'">See Full Course</a>
                            </div>
                        </div>
                    </a>
                </div>';
            }
        }
        
?>
</div>
</div>

        <div class="text-center m-2">
        <a href="courses.php" class="btn btn-danger btn-sm">View All Courses</a>        
    </div>
    <!-- End of popular course -->


<!-- Footer -->
<?php 
include('includes/footer.php');
?>
<!-- Bootstrap Js -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Font Awesome js -->
    <script src="js/all.min.js"></script>
    
</body>
</html>