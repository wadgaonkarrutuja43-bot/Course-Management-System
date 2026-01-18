<?php
// if(!isset($_SESSION)){
//     session_start();
// }
include('Aheader.php');
include('dbconnection.php');

if(!isset($_SESSION['is_admin_login']))
{
    echo "<script> location.href='index.php'; </script>";
}

$msg='';
if(isset($_REQUEST['newStuSubmitBtn'])) {
    // checking for empty fields
    //checking for empty field
    if(($_REQUEST['name'] == "") || ($_REQUEST['email']== "") || ($_REQUEST['password'] == ""))
     {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        // Assign form data to variables
            $stu_name = $_REQUEST['name'];
            $stu_email= $_REQUEST['email'];
            $stu_pass = $_REQUEST['password'];
        
        // Insert data into database
        $sql="INSERT INTO register (name, email, password) VALUES ('$stu_name',' $stu_email','$stu_pass')";

        if ($conn->query($sql) === TRUE) 
        {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully</div>';
        } 
        else 
        {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Student</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron" style="background-color:#D6D6D6;">
<h3 class="text-center">Add New Student</h3>
<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
<label for="stu_name">Name</label>
<input type="text" class="form-control" id="name"name="name">
</div>

<div class="form-group">
<label for="stu_email">Email</label>
<input type="text" class="form-control" id="email"name="email">
</div>


<div class="form-group">
<label for="stu_pass">Password</label>
<input type="text" class="form-control" id="password" name="password">
</div>
<br>
<!-- <div class="form-group">
<label for="stu_occ">Occupation</label>
<input type="text" class="form-control" id="stu_occ" name="stu_occ">
</div> -->

<div class="text-center">
<button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>

<a href="students.php" class="btn btn-secondary">Close</a>
</div>
<?php 
if(isset($msg))
{echo "$msg";}
?>
</div>
</div>
<?php
include('Afooter.php');
?>