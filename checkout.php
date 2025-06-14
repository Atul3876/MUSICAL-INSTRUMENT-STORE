<?php

include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('location: login-user.php');
    exit();
}
include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   if($update_value > 3){
      // If the quantity is greater than 10, set it to 10
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
	<link rel="stylesheet" href="check.css">
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
									<div class="header-icons">
										<a class="storeping-cart" href="cart2.php"><i class="fas fa-storeping-cart"></i></a>      
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

   <section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="Payment window.php" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : ₹<?= $grand_total; ?>/- </span>
   </div>

   <div class="flex">
   <div class="inputBox">
      <span>Your Name</span>
      <input type="text" placeholder="Enter your name" name="name" required pattern="[a-zA-Z]+">
   </div>
   <div class="inputBox">
      <span>Phone Number</span>
      <input type="tel" id="mobile" placeholder="Enter Your Mobile Number" name="mobileno" pattern="[0-9]*" minlength="10" maxlength="10" required>
   </div>
   <div class="inputBox">
      <span>Your Email</span>
      <input type="email" placeholder="Enter your email" name="email" required>
   </div>
   <div class="inputBox">
      <span>Payment Method</span>
      <select name="method" required>
         <option value="cash on delivery" selected>Cash on Delivery</option>
         <option value="paypal">UPI</option>
      </select>
   </div>
   <div class="inputBox">
      <span>Address Line 1</span>
      <input type="text" placeholder="e.g. Flat No." name="flat" required>
   </div>
   <div class="inputBox">
      <span>Address Line 2</span>
      <input type="text" placeholder="e.g. Street Name" name="street" required>
   </div>
   <div class="inputBox">
      <span>Country</span>
      <select name="method" required>
         <option value="INDIA" selected>India</option>
      </select>
   </div>
   <div class="inputBox">
      <span>State</span>
      <select id="state" name="state" onchange="showCities()">
        <option value="">Select a State</option>
        <option value="gujarat">Gujarat</option>
        <option value="maharashtra">Maharashtra</option>
        <option value="uttar_pradesh">Uttar Pradesh</option>
        <option value="karnataka">Karnataka</option>
        <option value="punjab">Punjab</option>
        <option value="uttarakhand">Uttarakhand</option>
    </select>
   </div>
   <div class="inputBox">
      <span>City</span>
      <select id="city" name="city">
	  <option value="">Select a City</option>
    </select>
    <script>
        function showCities() {
            const state = document.getElementById("state").value;
            const citySelect = document.getElementById("city");
            citySelect.innerHTML = "";
            switch (state) {
                case "gujarat":
                    citySelect.innerHTML = `
						<option value="ahmedabad">Select a city</option>
                        <option value="ahmedabad">Ahmedabad</option>
                        <option value="surat">Surat</option>
                        <option value="rajkot">Rajkot</option>
                        <option value="vadodara">Vadodara</option>
                        <option value="bhavnagar">Bhavnagar</option>
                    `;
                    break;
                case "maharashtra":
                    citySelect.innerHTML = `
						<option value="ahmedabad">Select a city</option>
                        <option value="mumbai">Mumbai</option>
                        <option value="pune">Pune</option>
                        <option value="nagpur">Nagpur</option>
                        <option value="nashik">Nashik</option>
                        <option value="aurangabad">Aurangabad</option>
                    `;
                    break;
                case "uttar_pradesh":
                    citySelect.innerHTML = `
						<option value="ahmedabad">Select a city</option>
                        <option value="lucknow">Lucknow</option>
                        <option value="kanpur">Kanpur</option>
                        <option value="agra">Agra</option>
                        <option value="ghaziabad">Ghaziabad</option>
                        <option value="noida">Noida</option>
                    `;
                    break;
                case "karnataka":
                    citySelect.innerHTML = `
						<option value="ahmedabad">Select a city</option>
                        <option value="bangalore">Bangalore</option>
                        <option value="mysore">Mysore</option>
                        <option value="hubli">Hubli</option>
                        <option value="mangalore">Mangalore</option>
                        <option value="bellary">Bellary</option>
                    `;
                    break;
                case "punjab":
                    citySelect.innerHTML = `
						<option value="ahmedabad">Select a city</option>
                        <option value="chandigarh">Chandigarh</option>
                        <option value="amritsar">Amritsar</option>
                        <option value="jalandhar">Jalandhar</option>
                        <option value="ludhiana">Ludhiana</option>
                        <option value="patiala">Patiala</option>
                    `;
                    break;
                case "uttarakhand":
                    citySelect.innerHTML = `
						<option value="ahmedabad">Select a city</option>
                        <option value="dehradun">Dehradun</option>
                        <option value="haridwar">Haridwar</option>
                        <option value="roorkee">Roorkee</option>
                        <option value="mussoorie">Mussoorie</option>
                        <option value="nainital">Nainital</option>
                    `;
                    break;
                default:
                    citySelect.innerHTML = "";
            }
        }
    </script>
   </div>
   <div class="inputBox">
      <span>Pin Code</span>
      <input type="text" placeholder="e.g. 123456" name="pin_code" pattern="[0-9]*" minlength="6" maxlength="6" required>
   </div>
</div>
<input type="submit" value="Order Now" name="order_btn" class="btn">
</form>

</section>

	</div>

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>We serene melody & co. group is an upcomming manufacture and supplier of musical instruments
							like guital ,violin,percu</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch With Us.</h2>
						<ul>
							<li> Plot-no.443 ,Ward 3/B,Near Balaji Super Market,Rambagh Hospital
								Rd,Adipur,370205,Gandhidham,Gujarat</li>
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