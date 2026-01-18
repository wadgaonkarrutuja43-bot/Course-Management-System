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
if(isset($_REQUEST['lessonSubmitBtn'])) {
    $sql = "SELECT * FROM lesson WHERE lesson_name = '{$_REQUEST['lesson_name']}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        echo "Lesson with same name already exists in the database.";
    //checking for empty field
    if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc']== "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name']== ""))

     {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }
 } else {
        // Assign form data to variables
            $lesson_name = $_REQUEST['lesson_name'];
            $lesson_desc= $_REQUEST['lesson_desc'];
            $course_id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];
        
        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO lesson (lesson_name, lesson_desc,course_id,course_name) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $lesson_name, $lesson_desc, $course_id, $course_name);
        

        if ($stmt->execute()) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Added Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error: ' . $conn->error . '</div>';
        }
        
        $stmt->close();
    }
}
?>
<?php
if(isset($_SESSION['course_id'])){
echo "course_id is set: ". $_SESSION['course_id'];
}else{
echo "course_id is not set";
}

if(isset($_SESSION['course_name'])){
echo "course_name is set: ". $_SESSION['course_name'];
}else{
echo "course_name is not set";
}
?>

<div class="col-sm-6 mt-5 mx-3" style="background-color:#D6D6D6;">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];} ?>">
    </div>
        
    <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];} ?>">
    </div>

    <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name">
    </div>
    
    <div class="form-group">
        <label for="course_desc">Lesson Description</label>
        <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2></textarea>
    </div>
<br>

<div class="text-center">

<button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
<a href="lessons.php" class="btn btn-secondary">Close</a>
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