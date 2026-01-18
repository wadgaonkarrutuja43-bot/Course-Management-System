<?php
if(!isset($_SESSION))
{ 
    session_start();
}
include('Aheader.php'); 
include('dbconnection.php');

// if(isset($_SESSION['is_login']) && isset($_SESSION['email']))
// {
//     $adminEmail = $_SESSION['adminEmail'];
// }
//     else {
//         echo "<script> location.href='index.php'; </script>";
//     }
    // $adminEmail = $_SESSION['adminLogEmail'];
    if(isset($_REQUEST['adminPassUpdatebtn']))
    {
        if (($_REQUEST['adminPass'] == ""))
        {
            // msg displayed if required field missing
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
        } 
        else {
            $sql = "SELECT *FROM admin WHERE admin_email='admin@gmail.com'";
            $result = $conn->query($sql);
            if($result->num_rows == 1)
            {
                $adminPass = $_REQUEST['adminPass'];
                $sql = "UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email = 'admin@gmail.com'";
                
                if($conn->query($sql) == TRUE) 
                {
                    // below msg display on form submit success
                    $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
                }
                else{
                    $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to update </div>';
                }
            }
        }
    }
?>

    <div class="col-sm-9 mt-5">
        <div class="row">
            <div class="col-sm-6"style="background-color:#AFD6D0;">
                <form class="mt-5 mx-5">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="adminEmail" name="adminEmail">
                    </div>

                    <div class="form-group">
                        <label for="inputnewpassword">New Password</label>
                        <input type="password" class="form-control" 
                        id="adminPass" placeholder="New Password" name="adminPass">
                    </div>

                    <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdatebtn">Update</button>
                    <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                    <?php if(isset($passmsg)) {echo $passmsg;}?>

                </form>
            </div>
        </div>
    </div>

    <?php
include('Afooter.php');
?>