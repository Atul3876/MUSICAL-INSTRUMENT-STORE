<?php
session_start();
$errorMessage = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connection.php';
    $email = $_POST['email'];
    $username = $_POST['username'];
    $mobileno = $_POST['mobileno'];
    $password = $_POST['password'];

    // Check if password meets the criteria (minimum 8 characters, 1 uppercase, and 1 numeric character)
    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        $_SESSION['username'] = $username;

        $sql = "insert into signup (email, username, mobileno, password) values ('$email', '$username', '$mobileno', '$password')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "Data entered Successfully";
            echo "<script>window.location.href = 'login-user.php';</script>";
            exit;
        } else {
            $errorMessage = "Database error: " . mysqli_error($con);
        }
    } else {
        $errorMessage = "Password should be at least 8 characters long with 1 upper case and 1 numeric character.";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="newlogg.css">
    <style>
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .idk{
          color: white;
        }
    </style>
  </head>
  <body>
  <h1 class="text-center">Sign Up</h1>
  <div class="container">
    <?php if ($errorMessage): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo htmlspecialchars($errorMessage); ?>
      </div>
    <?php endif; ?>
    <form action="signup-user.php" method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" placeholder="Enter Your Email" name="email" required>
        <br>
        <label for="username">Username:</label>
        <input type="text" placeholder="Enter your name" name="username" required pattern="[a-zA-Z]+">
        <br>
        <label for="mobile">Mobile Number:</label>
        <input type="tel" id="mobile" placeholder="Enter Your Mobile Number" name="mobileno" pattern="[0-9]*" maxlength="10" required>
        <span class="idk" id="mobileErrorMessage"></span>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" placeholder="Enter Your Password" name="password" required>
        <br>
        <button type="submit">SignUp</button>
        <p class="idk">Already have an account? <a href="login-user.php">Login</a></p>
        <span class="idk" id="passwordErrorMessage"></span>
      </div>
    </form>
  </div>
  <script>
    const passwordInput = document.getElementById("password");
    passwordInput.addEventListener("keyup", function() {
      const password = passwordInput.value.trim();
      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
      if (!passwordRegex.test(password)) {
        document.getElementById("passwordErrorMessage").innerText = "Password should be at least 8 characters long with 1 upper case and 1 numeric character.";
      } else {
        document.getElementById("passwordErrorMessage").innerText = "";
      }
    });
    const mobileInput = document.getElementById("mobile");
mobileInput.addEventListener("input", function () {
  const mobile = mobileInput.value.trim();
  if (mobile.length !== 10) {
    document.getElementById("mobileErrorMessage").innerText = "Mobile number should be exactly 10 digits.";
  } else {
    document.getElementById("mobileErrorMessage").innerText = "";
  }
});
  </script>
</body>
</html>