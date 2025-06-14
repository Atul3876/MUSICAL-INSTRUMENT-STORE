<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="users.css">
</head>
<body>
    <h2>Users</h2>
    <table border="2">
        <tr>
            <th>id</th>
            <th>email</th>
            <th>username</th>
            <th>Mobile No</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php
        include 'connection.php';
        $sql = "SELECT id, email, username, mobileno, password FROM signup";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["email"] . "</td><td>" . $row["username"] . "</td><td>" . $row["mobileno"] . "</td><td>" . $row["password"] . "</td><td><a href='update.php?id=" . $row["id"] . "'>Update</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "no data";
        }
        ?>
    </table>
</body>
</html>