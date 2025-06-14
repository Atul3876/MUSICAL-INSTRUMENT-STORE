<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('location: login-user.php');
    exit();
}
if(isset($_SESSION['cart'])) {
    // destroy the cart session
    session_destroy();
}
include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   if($update_value > 3){

      $update_value = 3;
   }
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart2.php');
   }
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart2.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart2.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 store Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Cart</title>

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
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="shopcart.css">
</head>
<body>
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="main.php">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
                                                       <ul>
								<li class="current-list-item"><a href="main.php">Home</a>
									
								</li>
								<li><a href="about.php">About Us</a></li>
                                                                <li><a href="products.php">Store</a>
									        <ul class="sub-menu">
										<li><a href="products.php">Store</a></li>
										<li><a href="checkout.php">Check Out</a></li>
										<li><a href="cart2.php">Cart</a></li>
									</ul>
								</li>
                                                                <li><a href="contact.php">Contact Us</a></li>
								<li><a href="classjoin.php">Join Classes</a>
									
								</li>
								<li>
								</li>
							</ul>
						</nav>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Musical Instruments Store</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<div class="container">

		<section class="shopping-cart">
		
		   <table>
		
			  <thead>
				 <th>image</th>
				 <th>name</th>
				 <th>price</th>
				 <th>quantity</th>
				 <th>total price</th>
				 <th>action</th>
			  </thead>
		
			  <tbody>
		
				 <?php 
				 
				 $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
				 $grand_total = 0;
				 if(mysqli_num_rows($select_cart) > 0){
					while($fetch_cart = mysqli_fetch_assoc($select_cart)){
				 ?>
		
				 <tr>
					<td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt=""></td>
					<td><?php echo $fetch_cart['name']; ?></td>
					<td>₹<?php echo ($fetch_cart['price']); ?>/-</td>
					<td>
					   <form action="" method="post">
						  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
						  <input type="number" name="update_quantity" min="1" max="3" value="<?php echo $fetch_cart['quantity']; ?>">
						  <input type="submit" value="update" name="update_update_btn">
					   </form>   
					</td>
					<td>₹<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
					<td><a href="cart2.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
				 </tr>
				 <?php
				   $grand_total += $sub_total;  
					};
				 };
				 ?>
				 <tr class="table-bottom">
					<td><a href="products.php" class="option-btn" style="margin-top: 0;" onclick="session_destroy()">continue shopping</a></td>
					<td colspan="3">grand total</td>
					<td>₹<?php echo $grand_total; ?>/-</td>
					<td><a href="cart2.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
				 </tr>
		
			  </tbody>
		
		   </table>
		
		   <div class="checkout-btn">
			  <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
		   </div>
		
		</section>
		
		</div>
		   
		<!-- custom js file link  -->
		<script src="js/script.js"></script>
	<!-- logo carousel 
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<!-- end logo carousel -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>We serene melody & co. group is an upcomming manufacture and supplier of musical instruments like guital ,violin,percu</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch With Us.</h2>
						<ul>
							<li> Plot-no.443 ,Ward 3/B,Near Balaji Super Market,Rambagh Hospital Rd,Adipur,370205,Gandhidham,Gujarat</li>
							<li>support@SereneMelodyAndCo.com</li>
							<li>+91 8460440408</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="main.php">Home</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="products.php">Store</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2024 - <a href="#">Serene
							Melody And Co.</a>, All
						Rights Reserved.<br>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>