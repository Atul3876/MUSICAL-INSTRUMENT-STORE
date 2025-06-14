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
								<img src="assets/logos/transparent3.png" alt>
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
										<li><a href="products.php">Products</a></li>
										<li><a href="checkout.php">Check Out</a></li>
										<li><a href="cart2.php">Cart</a></li>
									</ul>
								</li>
								<li><a href="classjoin.php">Join Classes</a>
								</li>
								<li>
									<div class="header-icons">
										<a class="storeping-cart" href="cart2.php"><i class="fas fa-storeping-cart"></i></a>
										<?php
											session_start();
											if (isset($_SESSION['email'])) {
    										echo '<span class="email-welcome orange-text">Welcome, ' . $_SESSION['email'] . '</span>';
    										echo '<a href="logout-user.php">Logout</a>';
											} else {
											echo '<a href="signup-user.php">Sign Up</a>';
											echo '<a href="login-user.php">Login</a>';
											}
										?>
										<a href="../web/index.php">Admin Login</a>
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
	<script>
		$(document).ready(function() {
  		$(".search-bar-form").submit(function(event) {
    	event.preventDefault();
    	var searchQuery = $(".search-bar-input").val();
    	console.log("Search query: " + searchQuery);
    	// Add your search functionality here
  		});
		});
		$(document).ready(function() {
  $(".search-bar-form").submit(function(event) {
    event.preventDefault();
    var searchQuery = $(".search-bar-input").val();
    if (searchQuery === "") {
      $("#search-results").html("");
      return;
    }
    var searchResults = [
      {
        title: "Search Result 1",
        url: "#"
      },
      {
        title: "Search Result 2",
        url: "#"
      },
      {
        title: "Search Result 3",
        url: "#"
      }
    ];

    if (searchResults.length === 0) {
      $("#search-results").html("<p>NO RESULTS FOUND</p>");
      return;
    }

    var searchResultsHtml = "";
    for (var i = 0; i < searchResults.length; i++) {
      searchResultsHtml += "<a href='" + searchResults[i].url + "'>" + searchResults[i].title + "</a><br>";
    }
    $("#search-results").html(searchResultsHtml);
  });
});
	</script>

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Music Instrumental Store</p>
							<h1>Music Is A Therapy</h1>
							<div class="hero-btns">
								<a href="products.php" class="boxed-btn">Instruments Collection</a>
								<a href="contact.php" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order over ₹1999</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund within 3-4 Bussiness days!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->
	<!-- cart banner section -->
	<section class="cart-banner pt-100 pb-100">
		<div class="container">
			<div class="row clearfix">
				<!--Image Column-->
				<div class="image-column col-lg-6">
					<div class="image">
						<div class="price-box">
							<div class="inner-price">
								<span class="price">
									<strong>GET ADDITIONAL DISCOUNTS.
								</span>
							</div>
						</div>
						<img src="assets/img/a.jpg" alt>
					</div>
				</div>
				<!--Content Column-->
				<div class="content-column col-lg-6">
					<h3><span class="orange-text">Hurry</span> Up.</h3>
					<h4>Big Discounts.</h4>
					<div class="text">Sometimes you want to give up the guitar, you'll hate
						the guitar. But if you stick
						with it, you're gonna be rewarded.Owning a handgun doesn't make you
						armed any more than owning a
						guitar makes you a musician.</div>
					<!--Countdown Timer-->
					<div class="time-counter">
						<div class="time-countdown clearfix" data-countdown="2020/2/01">
							<div class="counter-column">
								<div class="inner"><span class="count">00</span>Days</div>
							</div>
							<div class="counter-column">
								<div class="inner"><span class="count">00</span>Hours</div>
							</div>
							<div class="counter-column">
								<div class="inner"><span class="count">00</span>Mins</div>
							</div>
							<div class="counter-column">
								<div class="inner"><span class="count">00</span>Secs</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end cart banner section -->
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i
								class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2024</p>
						<h2>We are <span class="orange-text">Musical Instrument Store
							</span></h2>
						<p>Selling Best quality of Product</p>
						<p>All Types Of Instruments</p>
						<a href="about.php" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->


	
	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>We serene melody & co. group is an upcomming manufacture and supplier of musical instruments
							like guitar ,violin,percu</p>
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