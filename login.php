<?php
session_start();
// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courses";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs for security
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query to check if user exists
    $sql = "SELECT * FROM register WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, do something like redirect to dashboard
        $_SESSION['is_login'] = true;
        // Redirect to dashboard or wherever you want
        header("Location: index.php");
        exit();
    } else {
        // User doesn't exist
        echo "Invalid email or password. Please try again.";
    }

    // Close connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
   <link rel="stylesheet" href="log.css">
   <script src="login.js">
</script>
</head>
<body>
    <section>
        <div class="login-box">
            <h2>Login</h2>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="login">

                <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>    
            <input type="email" name="email" id="email" required>
            <label for="email">Email-Id</label>
                </div>

                <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>    
            <input type="password" name="password" required>
            <label for="password">Password</label>
                </div>

            <button type="submit">Login</button>
            <div class="register-link">
            <p>Don't have any account?<a href="signup.php">Register</a></p>
            </div>
        </form>
    </div>
    </section>
   
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>