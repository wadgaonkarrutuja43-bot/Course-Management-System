<!-- Header -->
<?php 
include('dbconnection.php');
include('includes/header.php');
?>
<!-- Header -->

<!-- courses banner -->
<div class="container-fluid bg-dark ">
  <div class="row">
    <img src="course.jpg" alt="Courses" style="height:520px; width: 100%; object-fit:cover; box-shadow:10px; margin-top: 10px;">
  </div>
</div>
<!-- End courses Banner -->

<!-- Start Main Content -->
<div class="container mt-5">
    <?php
    if(isset($_GET['course_id'])){
        $course_id  = $_GET['course_id'];
        $sql =  "SELECT * FROM addcourse WHERE course_id='$course_id'";
        $result = $conn->query($sql);
        $row = $result ->fetch_assoc();
    }
    
    ?>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo str_replace('..','.',$row['course_img']) ?>"style="height:350px; width: 100%; object-fit:cover; box-shadow:10px; margin-top: 10px;">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Course Name: <?php echo $row['course_name'];?></h5>
                <p class="card-text"> Description: <?php echo $row['course_desc'];?></p>
                <p class="card-text"> Duration: <?php echo $row['course_duration'];?></p>
                <form action="" method="post">
                    <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_original'];?></del></small> 
                    <strong>&#8377 <?php echo $row['course_price'];?></strong></p>

                    <button type="button" class="btn btn-primary" style="text:white; font-weight:bold; float:right;" onclick="window.open('<?php echo $row['course_link'];?>', '_blank');">Watch Now</button>
</form>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Lesson No.</th>
                    <th scope="col">Lesson Name</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $sql = "SELECT * FROM lesson";
        $result = $conn->query($sql);
        if($result->num_rows>0)
        {
            $num = 0;
            while( $row=$result-> fetch_assoc())
            {
                if($course_id == $row['course_id'])
                {
                    $num++;
                echo '<tr>
                    <th scope="row">'. $num.'</th>
                    <td>'.$row['lesson_name'].'</td>
                    <td>'.$row['lesson_desc'].'</td>
                </tr>';

                }
            }
        }

    //     if(!isset($_SESSION['buy']))
    // {
    //     echo "<script> location.href='https://youtu.be/zZ6vybT1HQs?feature=shared'; </script>";
    // }
        ?>
       
                
            </tbody>
        </table>
    </div>
</div>
<!-- End Main Content -->


<!-- Footer -->
<?php 
include('includes/footer.php');
?>
<!-- Footer -->