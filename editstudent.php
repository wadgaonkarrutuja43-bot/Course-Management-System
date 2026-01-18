<?php
// if(!isset($_SESSION)){
//     session_start();
// }
include('Aheader.php');
include('dbconnection.php');

// if(!isset($_SESSION['is_admin_login']))
// {
//     echo "<script> location.href='index.php'; </script>";
// }


if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['id'] == "") || ($_REQUEST['name'] == "") || ($_REQUEST['email']== "") || ($_REQUEST['password'] == ""))
    {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    }
    else{
        // Assigning User Values to Variable

        $sid = $_REQUEST['id'];
        $stu_name = $_REQUEST['name'];
        $stu_email= $_REQUEST['email'];
        $stu_pass= $_REQUEST['password'];
       

        $sql = "UPDATE register SET id = '$sid', name ='$stu_name', 
       email = '$stu_email', password='$stu_pass'
        WHERE id = '$sid'";

        if($conn->query($sql)==TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
        }
        else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
        }
    }
}

?>
<div class="col-sm-6 mt-5 mx-3" style="background-color:#D6D6D6;">
    <?php 
    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM register WHERE id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>

<h3 class="text-center">Update Student Details</h3>
<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
<label for="Stu_id">Student ID</label>
<input type="text" class="form-control" id="id" name="id" value="<?php if(isset($row['id'])) { echo $row['id'];} ?>" readonly>
</div>

<div class="form-group">
<label for="stu_name">Name</label>
<input type="text" class="form-control" id="name"name="name" value="<?php if(isset($row['name'])) { echo $row['name'];} ?>">
</div>

<div class="form-group">
<label for="stu_email">Email</label>
<input type="text" class="form-control" id="email"name="email" value="<?php if(isset($row['email'])) { echo $row['email'];} ?>">
</div>


<div class="form-group">
<label for="stu_pass">Password</label>
<input type="text" class="form-control" id="password" name="password" value="<?php if(isset($row['password'])) { echo $row['password'];} ?>">
</div>
<br>

<div class="text-center">
<button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>

<a href="student.php" class="btn btn-secondary">Close</a>
</div>
<?php 
if(isset($msg))
{echo "$msg";}
?>

</div>

<?php
include('Afooter.php');
?>