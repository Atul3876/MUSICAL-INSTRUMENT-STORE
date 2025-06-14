<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Add any necessary CSS files here -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Product List</h1>
        <ul>
            <?php
            // Fetch the products from the database
            $query = "SELECT * FROM products";
            $result = mysqli_query($conn, $query);

            // Loop through the results and display each product
            while ($product = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo "<a href='product-details.php?id={$product['id']}'>";
                echo "<img src='{$product['image']}' alt='Product Image'>";
                echo "<h3>{$product['name']}</h3>";
                echo "<div class='price'>{$product['price']}</div>";
                echo "</a>";
                echo "</li>";
            }
           ?>
        </ul>
    </div>
</body>
</html>