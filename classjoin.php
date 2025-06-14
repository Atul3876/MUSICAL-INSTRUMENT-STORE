<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'shopconnection.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $mobileno = $_POST['mobileno'];

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO class (name, email, age, mobileno) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $age, $mobileno);

    // Execute the SQL statement
    $result = $stmt->execute();

    if ($result) {
        echo "<script>alert('We will let you know details soon');</script>";
        header('location:classjoinn.php');
    } else {
        echo "Error: " . $con->error;
    }
    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Classes</title>
    <link rel="stylesheet" href="joinclass.css">
</head>
<body>
    <div class="form-container">
        <h2>Join Class Form</h2>
        <form action="classjoin.php" method="post" onsubmit="return submitForm();">
            <label for="name">Name:</label><br>
            <input type="text" placeholder="Enter Your Name" name="name" required pattern="[a-zA-Z]+">
            <label for="email">Email:</label><br>
            <input type="email" placeholder="Enter Your Email" id="email" name="email" required><br>
            <label for="age">Age:</label><br>
            <input type="number" id="age" placeholder="Enter Your Age" name="age" required pattern="[0-9]{1,2}|100" min="6" max="100">
            <label for="mobile">Mobile No:</label><br>
            <input type="tel" id="mobile" placeholder="Enter Your Mobile Number" name="mobileno" pattern="[0-9]*" minlength="10" maxlength="10" required><br>
            <input type="submit" value="Join Class">
        </form>
    </div>
    <script>
        function submitForm() {
            alert('We will let you know details soon');
            return true;
        }
    </script>
</body>
</html>