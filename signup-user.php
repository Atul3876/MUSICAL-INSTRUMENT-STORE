<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <style>
        .valid {
            border-color: green;
        }
        .invalid {
            border-color: red;
        }   
</style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="log-style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Signup</h2>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" required value="<?php echo $username ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="tel" id="mobile" placeholder="Enter Your Mobile Number" name="mobileno" pattern="[0-9]*" minlength="10" maxlength="10" required>
                    </div>
                    <div class="form-group">
                    <div id="password-strength">
                        <input class="form-control" type="password" name="password" placeholder="Password" minlength="8"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
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