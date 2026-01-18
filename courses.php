<!-- Header -->
<?php 
include('dbconnection.php');
include('includes/header.php');
?>
<!-- courses banner -->
<div class="container-fluid bg-dark ">
  <div class="row">
    <img src="course.jpg" alt="Courses" style="height:520px; width: 100%; object-fit:cover; box-shadow:10px; margin-top: 10px;">
  </div>
</div>
<!-- End courses Banner -->

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
        
        // Second set of courses
        $sql = "SELECT * FROM addcourse LIMIT 3,3";
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
        
        // Third set of courses
        $sql = "SELECT * FROM addcourse LIMIT 6,3";
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

<!-- Footer -->
<?php 
include('includes/footer.php');
?>
