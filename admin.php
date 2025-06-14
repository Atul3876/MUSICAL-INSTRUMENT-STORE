<?php

include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'product add succesfully';
   }else{
      $message[] = 'could not add the product';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'product updated succesfully';
      header('location:admin.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:admin.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description"
      content="Responsive Bootstrap4 store Template, Created by Shub from https://imransdesign.com/">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- title -->
   <title>Serene Melody And Co.</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <!-- favicon -->
   <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
   <!-- google font -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
   <!-- fontawesome -->
   <link rel="stylesheet" href="assets/css/all.min.css">
   <!-- bootstrap -->
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   <!-- owl carousel -->
   <link rel="stylesheet" href="assets/css/owl.carousel.css">
   <!-- magnific popup -->
   <link rel="stylesheet" href="assets/css/magnific-popup.css">
   <!-- animate css -->
   <link rel="stylesheet" href="assets/css/animate.css">
   <!-- mean menu css -->
   <link rel="stylesheet" href="assets/css/meanmenu.min.css">
   <!-- main style -->
   <link rel="stylesheet" href="assets/css/main.css">
   <!-- responsive -->
   <link rel="stylesheet" href="assets/css/responsivecss">
   <link rel="stylesheet" href="adminstylee.css">

</head>

<body>

   <!-- header -->
   <div class="top-header-area fixed-top bg-blue" id="sticker">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
               <div class="main-menu-wrap">
                  <!-- logo -->
                  <div class="site-logo">
                     <a href="main.php">
                        <img src="assets/logos/transparent3.png" alt>
                     </a>
                  </div>
                  <!-- logo -->

                  <!-- menu start -->
                  <nav class="main-menu">
                     <ul>
                        <li class="current-list-item"><a href="main.php">Home</a>
                        </li>
                        <li><a href="products.php">view products</a></li>
                        <li><a href="users.php">View Users</a></li>
                        <li><a href="students.php">View Students</a></li>
                        <li>
                           <div class="header-icons">
                           </div>
                        </li>
                     </ul>
                  </nav>
                  <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                  <div class="mobile-menu"></div>
                  <!-- menu end -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end header -->
   <!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Musical Instruments Store</p>
						<h1>Admin panel</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
      <div class="container">
         <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
               <div class="hero-text">
                  <div class="hero-text-tablecell">
                     <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                        <ul>
                           <li>
                              <h3>add a new product</h3>
                           </li>
                           <li><input type="text" name="p_name" placeholder="enter the product name" class="box"
                                 required></li>
                           <li><input type="number" name="p_price" min="0" placeholder="enter the product price"
                                 class="box" required></li>
                           <li><input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box"
                                 required></li>
                           <li><input type="submit" value="add the product" name="add_product" class="btn"></li>
                        </ul>
                     </form>
                     <div class="container">
                        <section class="display-product-table">

                           <table>

                              <thead>
                                 <th>product image</th>
                                 <th>product name</th>
                                 <th>product price</th>
                                 <th>action</th>
                              </thead>

                              <tbody>
                                 <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

                                 <tr>
                                    <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                                    <td>
                                       <?php echo $row['name']; ?>
                                    </td>
                                    <td>₹
                                       <?php echo $row['price']; ?>/-
                                    </td>
                                    <td>
                                       <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn"
                                          onclick="return confirm('are your sure you want to delete this?');"> <i
                                             class="fas fa-trash"></i> delete </a>
                                       <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i
                                             class="fas fa-edit"></i> update </a>
                                    </td>
                                 </tr>

                                 <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
                              </tbody>
                           </table>

                        </section>

                        <section class="edit-form-container">

                           <?php
   
                              if(isset($_GET['edit'])){
                              $edit_id = $_GET['edit'];
                              $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
                              if(mysqli_num_rows($edit_query) > 0){
                              while($fetch_edit = mysqli_fetch_assoc($edit_query)){
                           ?>
                           <form action="" method="post" enctype="multipart/form-data">
                              <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                              <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                              <input type="text" class="box" required name="update_p_name"
                                 value="<?php echo $fetch_edit['name']; ?>">
                              <input type="number" min="0" class="box" required name="update_p_price"
                                 value="<?php echo $fetch_edit['price']; ?>">
                              <input type="file" class="box" required name="update_p_image"
                                 accept="image/png, image/jpg, image/jpeg">
                              <input type="submit" value="update the prodcut" name="update_product" class="btn">
                              <input type="reset" value="cancel" id="close-edit" class="option-btn">
                           </form>

                           <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

                        </section>
                     </div>
                  </div>
                  <!-- custom js file link  -->
                  <script src="js/script.js"></script>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</body>
</html>