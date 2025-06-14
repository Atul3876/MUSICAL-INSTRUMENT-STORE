<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql="Select * from `signup` where username='$username' and password='$password'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $_SESSION['loggedin'] = $loggedin;
            echo "Login Successfull";
            header("Location: main.php");
            exit;
        }
        else{
            echo "Invalid username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="newlogg.css">
</head>

<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Login</h2>
            <div class="input-field">
                <input type="text" name="username" required />
                <label>Enter Username</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required />
                <label>Enter password</label>
            </div>
            <button type="submit">Log In</button>
            <div class="Create-account">
                <p>Don't have an account? <a href="signup-user.php">Create account</a></p>
            </div>
        </form>
    </div>
</body>

</html>