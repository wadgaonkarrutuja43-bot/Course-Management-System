<?php
if(!isset($_SESSION)){
    session_start();
}
include('Aheader.php');
include('dbconnection.php');

?>
<div class="col-sm-9 mt-5">
<div class="row mx-5 text-center">
<?php
// First set of courses
$sql = "SELECT * FROM addcourse";
$result = $conn->query($sql);
$total_courses = $result->num_rows; // Counting total courses

if ($total_courses > 0) {
    // Display the total number of courses
    echo '<div class="col-sm-4 mt-5" style="margin-right: 200px; margin-left: 50px;">
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">Courses</div>
                        <div class="card-body">
                            <h4 class="card-title">'.$total_courses.'</h4>
                            <a class="btn text-white" href="acourse.php">View</a>
                        </div>
                    </div>
                </div>';
}
?>

<?php
$sql = "SELECT * FROM register";
$result = $conn->query($sql);
$total_students = $result->num_rows; // Counting total courses

if ($total_students > 0) {
    // Display the total number of courses
    echo '<div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header">Students</div>
            <div class="card-body">
                            <h4 class="card-title">'.$total_students.'</h4>
                            <a class="btn text-white" href="student">View</a>
                        </div>
                    </div>
                </div>';
}
?>

<div class="mx-5 mt-5 text-center">
    <h1 class="text-white">Welcome To Admin Area</h1>
</div>
<?php
// Check if username and password are correct
$username = $_POST['username'];
$password = $_POST['password'];

// You should have a proper authentication mechanism here, such as querying a database
$correct_username = 'admin@gmail.com';
$correct_password = 'ad1212';

if ($username === $correct_username && $password === $correct_password) {
//    echo json_encode(['success' => true]);
} else {
    echo "<script> location.href='index.php'; </script>";
    echo " ";
 }

?>
<?php
include('Afooter.php');
?>
