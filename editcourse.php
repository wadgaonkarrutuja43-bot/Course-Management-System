<?php
// if(!isset($_SESSION)){
    session_start();
// }
include('Aheader.php');
include('dbconnection.php');

// if(!isset($_SESSION['is_admin_login']))
// {
//     echo "<script> location.href='index.php'; </script>";
// }


if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") 
    || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "") 
    || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_link'] == "")){
        
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    }
    else{
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $cdesc= $_REQUEST['course_desc'];
        $cauthor= $_REQUEST['course_author'];
        $cduration = $_REQUEST['course_duration'];
        $cprice = $_REQUEST['course_price'];
        $coriginalprice = $_REQUEST['course_original_price'];
        $clink = $_REQUEST['course_link']; 

        if(isset($_FILES['course_img']['name'])) {
            $cimg = 'courseimg/'. $_FILES['course_img']['name'];
            $img_tmp = $_FILES['course_img']['tmp_name'];
            move_uploaded_file($img_tmp, $cimg);
        }
        $clink = mysqli_real_escape_string($conn, $_REQUEST['course_link']);

        $sql = "UPDATE addcourse SET course_name=?, course_desc=?, course_author=?, course_duration=?, course_price=?, 
        course_original=?, course_img=?, 
        course_link=? WHERE course_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssdsssi", $cname, $cdesc, $cauthor, $cduration, $cprice, $coriginalprice, $cimg, $clink, $cid);
        
        if($stmt->execute())
        {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        }
    }
}

?>
<div class="col-sm-6 mt-5 mx-3" style="background-color:#D6D6D6;">
    <h3 class="text-center">Update Course</h3>

    <?php 
    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM addcourse WHERE course_id= {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])) {echo $row['course_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])) {echo $row['course_name']; } ?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" id="course_desc" name="course_desc" row=2><?php if(isset($row['course_desc'])) {echo $row['course_desc']; } ?></textarea>
        </div>

        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if(isset($row['course_author'])) {echo $row['course_author']; } ?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if(isset($row['course_duration'])) {echo $row['course_duration']; } ?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price" value="<?php if(isset($row['course_original'])) {echo $row['course_original']; } ?>">
        </div>
        <div class="form-group">
            <label for="course_price">course selling price</label>
            <input type="text" class="form-control" id="course_price" name="course_price" value="<?php if(isset($row['course_price'])) {echo $row['course_price']; } ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Course image</label><br>
            <img src="<?php if(isset($row['course_img'])) {echo $row['course_img']; } ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>

        <div class="form-group">
            <label for="course_link">Course Link</label>
            <input type="text" class="form-control" id="course_link" name="course_link" value="<?php if(isset($row['course_link'])) {echo $row['course_link']; } ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
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