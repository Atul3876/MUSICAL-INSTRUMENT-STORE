<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM signup WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $mobileno = $_POST['mobileno'];
    $password = $_POST['password'];

    if (!empty($password)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    } else {
        // Use the existing password
        $hashed_password = $row['password'];
    }

    $stmt = $con->prepare("UPDATE signup SET email=?, username=?, mobileno=?, password=? WHERE id=?");
    $stmt->bind_param("sssii", $email, $username, $mobileno, $hashed_password, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
        header('Location: users.php');
    } else {
        echo "Error: " . $stmt->error;
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <h2>Update User</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
        <br>
        <label for="mobileno">Mobile No:</label>
        <input type="text" id="mobileno" name="mobileno" value="<?php echo $row['mobileno']; ?>" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br>
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>