<?php
if(!isset($_SESSION))
{
    session_start();
}
include('Sheader.php');
include_once('dbconnection.php');

if(isset($_SESSION['is_login']) && isset($_SESSION['stuEmail']))
{
    $stuEmail = $_SESSION['stuEmail'];
}
// else
// {
//     echo "<script>location.href='index.php'; </script>";
// }

$sql= "SELECT *FROM register WHERE email= 'sonum@gmail.com'";  
$result = $conn->query($sql); 
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $stuId = $row["id"]; 
    $stuName = $row["name"]; 
}

if(isset($_REQUEST['updateStuNameBtn']))
{
    if(isset($_REQUEST["name"]))
    {
        $stuName = $_REQUEST["name"];
        $sql = "UPDATE register SET name = '$stuName' WHERE email ='sonum@gmail.com'";

        if($conn->query($sql) ==TRUE)
        {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2 role="alert"> Updated Successfully <div>';
        }
        else
        {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2 role="alert"> Unable to update <div>';  
        }
    }
    else
    {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    }
}
?>

<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST">
        <div class="form-group">
            <label for="id">Student ID</label>
            <input type="text" class="form-control" id="id" name="id" value=" <?php if(isset($stuId)) {echo $stuId;}?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
        <input type="email" class="form-control" id="stuEmail" name="stuEmail" value=" <?php if(isset($stuEmail)) {echo $stuEmail;}?>">
        </div>

<br>
        <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
        <?php if(isset($passmsg)) {echo $passmsg;}?>
    </form>
</div>
<div>
    <?php
    include('Sfooter.php');
    ?>