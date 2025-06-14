<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'shopconnection.php';

	$stmt = $con->prepare("INSERT INTO contact (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");

	if ($stmt) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
	
		$sql = "insert into contact (name, email, phone, subject, message) values ('$name', '$email', '$phone', '$subject', '$message')";
		$result = mysqli_query($con, $sql);
		if ($result) {
            echo "Data entered Successfully";
            exit;
        } else {
			echo "Error: ";
		}
	
		$stmt->close();
	} else {
		echo "Error preparing statement: " . $conn->error;
	}
	
	$con->close();
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
	<title>Contact</title>

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

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="main.php">
								<img src="assets/logos/transparent3.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="main.php">Home</a>
								<li><a href="about.php">About Us</a></li>
                                        <li><a href="products.php">Store</a>
									        <ul class="sub-menu">
										<li><a href="products.php">Store</a></li>
										<li><a href="checkout.php">Check Out</a></li>
										<li><a href="cart2.php">Cart</a></li>
									</ul>
								</li>
                                                               
								<li><a href="classjoin.php">Join Classes</a>	
								</li>
								</li>
								<li>
									<div class="header-icons">
										<a class="storeping-cart" href="cart2.php"><i class="fas fa-storeping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										<?php
											if (isset($_SESSION['username'])) {
    										echo '<span class="username-welcome orange-text">Welcome, ' . $_SESSION['username'] . '</span>';
    										echo '<a href="Logout.php">Logout</a>';
											} else {
											echo '<a href="signup-user.php">Sign Up</a>';
											echo '<a href="login-user.php">Login</a>';
											}
											?>
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
						<p>Get 24/7 Support</p>
						<h1>Contact us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Have you any question?</h2>
						<p>Have you any enquiry for our music class or products. </p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form action="contact.php" method="post" id="music-instrument-store-contact" onSubmit="return valid_datas( this );">
							<p>
								<label for="name"></label>
								<input type="text" placeholder="Name" name="name" id="name">
								<label for="email"></label>
								<input type="email" placeholder="Email" name="email" id="email">
							</p>
							<p>
								<label for="phone"></label>
								<input type="tel" placeholder="Phone" name="phone" id="phone" pattern="[0-9]*" maxlength="10">
								<label for="subject"></label>
								<input type="text" placeholder="Subject" name="subject" id="subject">
							</p>
							<label for="message"></label>
							<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
							<input type="hidden" name="token" value="FsWga4&@f6aw" />
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Store Address</h4>
							<p> Plot-no.443 ,Ward 3/B,Near Balaji Super Market,Rambagh Hospital Rd,Gujarat <br> Gandhidham,Gujarat <br> India</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Store Hours</h4>
							<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: +91 8460440408 <br> Emails:support@serenemelodyandco.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->

	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3670.6313673650884!2d70.0926514241663!3d23.073972564410305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3950b96ea43f62bb%3A0x5939791d9891832a!2sSerene%20Melody%20And%20Co.!5e0!3m2!1sen!2sin!4v1710133279259!5m2!1sen!2sin" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	</div>
	<!-- end google map section -->


	<!--footer -->
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
							<li><a href="Main.php">Home</a></li>
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
	<!-- form validation js -->
	<script src="assets/js/form-validate.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>
	
</body>
</html>