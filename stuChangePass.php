<?php
if(!isset($_SESSION)){
    session_start();
}
include('Sheader.php');
include_once('dbconnection.php');

if(isset($_SESSION['is_login']) && isset($_SESSION['stuEmail']))
{
    $stuEmail = $_SESSION['stuEmail'];
}

if(isset($_REQUEST['stuPassUpdatebtn']))
    {
        if (($_REQUEST['stuNewPass'] == ""))
        {
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
        }
    }
    else 
    {
        $sql = "SELECT * FROM register WHERE email='sonum@gmail.com'";
        $result = $conn->query($sql);
        if($result->num_rows == 1)
        {
            $stuPass = $_REQUEST['stuNewPass'];
            $sql = "UPDATE register SET password = '$stuPass' WHERE email = 'sonum@gmail.com'";

            if($conn->query($sql) == TRUE) 
                {
                    $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
                }
                else
                {
                    $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to update </div>';
                }
            }
    }

?>
<div class="col-sm-9 col-mod-10">
        <div class="row">
            <div class="col-sm-6">
                <form class="mt-5 mx-5" method="post">
                    <div class="form-group">
                        <label for="stuEmail">Email</label>
                        <input type="email" class="form-control" id="stuEmail" name="stuEmail">
                    </div>

                    <div class="form-group">
                        <label for="stuNewPass">New Password</label>
                        <input type="password" class="form-control" 
                        id="stuNewPass" placeholder="New Password" name="stuNewPass">
                    </div>

                    <button type="submit" class="btn btn-danger mr-4 mt-4" name="stuPassUpdatebtn">Update</button>
                    <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                    <?php if(isset($passmsg)) {echo $passmsg;}?>

                    </form>
            </div>
        </div>
    </div>

    <?php
include('Afooter.php');
?>