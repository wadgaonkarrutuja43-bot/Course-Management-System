<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
  <section>
      <div class="signup-box">
          <form id="signupForm" action="" method="post">
            <h2>Student Registration</h2>

            <div class="input-box">
                <span class="icon"><ion-icon name="person-circle"></ion-icon></span>    
                <input type="text" name="username" id="username" required autocomplete="off">
                <label>Username</label>
            </div>

            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>    
                <input type="email" name="email" id="email" required>
                <label>Email-Id</label>
            </div>
            
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>    
                <input type="password" name="password" id="password" required>
                <label>Password</label>
            </div>

            <button type="submit">Signup</button>
            <div class="register-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
          </form>
      </div>
  </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>