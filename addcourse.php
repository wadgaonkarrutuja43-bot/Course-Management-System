<?php
if(!isset($_SESSION)){
    session_start();
}
include('Aheader.php');
include('dbconnection.php');

// if(!isset($_SESSION['is_admin_login']))
// {
//     echo "<script> location.href='index.php'; </script>";
// }

$msg='';
if(isset($_REQUEST['courseSubmitBtn'])) {
    $sql = "SELECT * FROM addcourse WHERE course_name = '{$_REQUEST['course_name']}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        echo "Course with same name already exists in the database.";
    //checking for empty field
    if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc']== "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration']== "") || ($_REQUEST['course_price'] == "")  || ($_REQUEST['course_original_price'] == ""))

     {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }
 } else {
        // Assign form data to variables
            $course_name = $_REQUEST['course_name'];
            $course_desc= $_REQUEST['course_desc'];
            $course_author = $_REQUEST['course_author'];
            $course_duration = $_REQUEST['course_duration'];
            $course_price = $_REQUEST['course_price'];
            $course_original_price =  $_REQUEST['course_original_price'];
            $course_link = $_REQUEST['course_link'];
            $course_image=$_FILES['course_img']['name'];
            $course_image_temp=$_FILES['course_img']['tmp_name'];
            $img_folder='courseimg/'.$course_image;
            move_uploaded_file($course_image_temp,$img_folder);
        
        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO addcourse (course_name, course_desc, course_author, course_img, course_duration, course_price, course_original, course_link) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $course_name, $course_desc, $course_author, $img_folder, $course_duration, $course_price, $course_original_price, $course_link);
        
        if ($stmt->execute()) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error: ' . $conn->error . '</div>';
        }
        
        $stmt->close();
    }
}
?>

<div class="col-sm-6 mt-5 mx-3" style="background-color:#D6D6D6;">
    <h3 class="text-center">Add new courses</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
<label for="course_name">Course name</label>
<input type="text" class="form-control" id="course_name" name="course_name">

</div>
<div class="form-group">
<label for="course_desc">Course Description</label>
<textarea class="form-control" id="course_desc" name="course_desc" row=2></textarea>
</div>

<div class="form-group">
<label for="course_author">Author</label>
<input type="text" class="form-control" id="course_author" name="course_author">
</div>

<div class="form-group">
<label for="course_duration">Course Duration</label>
<input type="text" class="form-control" id="course_duration" name="course_duration">
</div>

<div class="form-group">
<label for="course_original_price">Course Original Price</label>
<input type="text" class="form-control" id="course_original_price" name="course_original_price">
</div>

<div class="form-group">
<label for="course_price">course selling price</label>
<input type="text" class="form-control" id="course_price" name="course_price">
</div>
<br>
<div class="form-group">
<label for="course_img">Course image</label><br>
<input type="file" class="form-control-file" id="course_img" name="course_img">
</div>
<br>
<div class="form-group">
<label for="course_link">Course Link</label>
<input type="text" class="form-control" id="course_link" name="course_link">
</div>
<br>
<div class="text-center">

<button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
<a href="acourses.php" class="btn btn-secondary">Close</a>
</div>
</form>
<?php 
if(isset($msg))
{echo "$msg";}
?>

</div>
</div>
<?php
include('Afooter.php');
?>