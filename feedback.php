<?php
// Establish database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "courses"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve feedback data
    $fcontent = $_POST['fcontent'];

    // Sanitize the input (to prevent SQL injection)
    $fcontent = mysqli_real_escape_string($conn, $fcontent);

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (f_content) VALUES ('$fcontent')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Feedback submitted successfully');
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="feedback.css">  
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <p class="text">How Would You Rate This App?</p>
                <div class="emoji">
                    <div>😣</div>
                    <div>😐</div>
                    <div>🙂</div>
                    <div>😃</div>
                    <div>😍</div>
                </div>
                <textarea class="textarea" name="fcontent" cols="30" rows="3" placeholder="Write your opinion!"></textarea>
                <button type="submit" class="btn">Send</button>
            </form>
        </div>
    </div>
    <script src="js/feedback.js"></script>  
</body>
</html>