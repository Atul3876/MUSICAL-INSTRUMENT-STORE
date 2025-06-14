<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="users.css">
</head>
<body>
    <table border= "2">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>age</td>
            <td>mobile number</td>
        </tr>
        <?php
        include 'shopconnection.php';
        $sql= "select id, name, email, age, mobileno from class";
        $result=$con -> query($sql);
        if($result-> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["age"] . "</td><td>" . $row["mobileno"] . "</td></tr>";
            }
            echo "</table>";
        }
        else{
            echo "no data";
        }
        ?>
    </table>
</body>
</html>