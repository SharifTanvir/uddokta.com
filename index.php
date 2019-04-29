<?php
include "db.php";
session_start();


?>



<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <!-- Document Meta
        ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="construction html5 template">
    <link href="assets/images/favicon/favicon.ico" rel="icon">

    <!-- Fonts
        ============================================= -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CRaleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CUbuntu:300,300i,400,400i,500,500i,700,700i' rel='stylesheet' type='text/css'>

    <!-- Stylesheets
        ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
            ============================================= -->
    <title>Uddokta</title>
</head>
<body>
<!-- Document Wrapper
	============================================= -->
<div id="wrapper" class="wrapper clearfix">
    <header id="navbar-spy" class="header header-1">

        <!-- .top-bar end -->
        <nav id="primary-menu" class="navbar navbar-fixed-top">
            <?php include 'inc/nav.php'; ?>
        </nav>
    </header>
	<!-- Hero #1
============================================= -->
	<section id="hero" class="hero">
		<div id="hero-slider" class="hero-slider">
			<!-- Slide #1 -->
			<div class="slide bg-overlay">
				<div class="bg-section">
					<img src="assets/images/sliders/1.jpg" alt="Background"/>
				</div>
				<div class="container vertical-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
							<div class="slide-content">
								<div class="slide-icon">
									<i class="icon icon-Settings"></i>
								</div>
								<div class="slide-heading"> The Best Service Provider </div>
								<div class="slide-title">
									<h2>Say Hello To <span class="color-theme">Uddokta.com !</span></h2>
								</div>

								<div class="slide-action">
									<a class="btn btn-primary" href="shop-product-grid-fullwidth.php">Check It Now</a>

								</div>
							</div>
						</div>
						<!-- .col-md-12 end -->
					</div>
					<!-- .row end -->
				</div>
				<!-- .container end -->
			</div>
			<!-- .slide end -->
			
			<!-- Slide #2 -->
			<div class="slide bg-overlay">
				<div class="bg-section">
					<img src="assets/images/sliders/8.jpg" alt="Background"/>
				</div>
				<div class="container vertical-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
							<div class="slide-content">
								<div class="slide-heading"> Search What you need </div>
								<div class="slide-title">
									<h2>get all  easily</h2>
								</div>

								<div class="slide-action">
									<a class="btn btn-primary" href="#">Check It Now</a>
								</div>
							</div>
						</div>
						<!-- .col-md-12 end -->
					</div>
					<!-- .row end -->
				</div>
				<!-- .container end -->
			</div>
			<!-- .slide end -->
			
			<!-- Slide #3 -->
			<div class="slide bg-overlay">
				<div class="bg-section">
					<img src="assets/images/sliders/6.jpg" alt="Background"/>
				</div>
				<div class="container vertical-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
							<div class="slide-content">
								<div class="slide-heading"> Show What You Can Sell </div>
								<div class="slide-title">
									<h2>And Earn <span class="color-theme">Money</span></h2>
								</div>

							</div>
						</div>
						<!-- .col-md-12 end -->
					</div>
					<!-- .row end -->
				</div>
				<!-- .container end -->
			</div>
			<!-- .slide end -->
			
		</div>
		<!-- #hero-slider end -->
	</section>
	<!-- #hero -->
	
	<!-- Featured Items
============================================= -->
	<section id="featuredItems" class="shop">
		<div class="container">
			<div class="row product-boxes">
				<!-- Product Box #1 -->
				<div class="col-xs-12 col-sm-4 col-md-4 product-box">
					<a href="search_result.php?category=Home Service">
					<div class="product-img">
						<img  src="assets/images/shop/small/1.jpg" alt="Product"/>
						<div class="product-hover">
							<div class="product-link">
								<h3>Home Services</h3>
								<p></p>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					</a>
				</div>
				<!-- .product-box end -->
				
				<!--4 Product Box #2 -->
				<div class="col-xs-12 col-sm-4 col-md-4 product-box">

					<a href="search_result.php?category=Home Shifting">
					<div class="product-img">
						<img  src="assets/images/shop/small/3.jpg" alt="Product"/>
						<div class="product-hover">
							<div class="product-link">
								<h3>Home Shifting</h3>
								<p></p>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					</a>
				</div>
				<!-- .product-box end -->
				
				<!-- Product Box #3 -->
				<div class="col-xs-12 col-sm-4 col-md-4 product-box">
					<a href="search_result.php?category=Electrician">
					<div class="product-img">
						<img  src="assets/images/shop/small/3.jpg" alt="Product"/>
						<div class="product-hover">
							<div class="product-link">
								<h3>Electrician</h3>
								<p></p>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					</a>
				</div>
				<!-- .product-box end -->
				
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<p class="subheading">we get</p>
					<h2>Services</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="row product-carousel text-center">

                <?php
                $sql = "SELECT * From service_provider";
                $run = $conn->prepare($sql);
                $run->execute();

                if($run->rowCount() > 0) {
                    while ($row = $run->fetch(PDO::FETCH_ASSOC)) {

                        $id = $row["s_id"];
                        $name = $row["s_name"];
                        $cat = $row["s_cat"];
                        $img = $row["s_img"];
                        $bill = $row["s_bill"];
                        $dis = $row["s_discount"];

                        echo '				<!-- Product #1 -->
				<div class="product">
					<div class="product-img">
						<img  src="assets/images/shop/grid/'.$img.'" alt="Product"/>
						<div class="product-hover">
							<div class="product-action">
								<a class="btn btn-primary" href="shop-single-fullwidth.php?id='.$id.'">Check Info</a>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					<div class="product-bio">
						<div class="prodcut-cat">
							<a href="#">' .$name.'</a>
						</div>
						<!-- .product-cat end -->
						<div class="prodcut-title">
							<h3>
								<a href="#">'.$cat.'</a>
							</h3>
						</div>
						<!-- .product-title end -->
						<div class="product-price">
							<span class="symbole"></span><span>'.$bill.' tk</span>
						</div>
						<!-- .product-price end -->
						
					</div>
					<!-- .product-bio end -->
				</div>';

                    }
                }


                ?>


				<!-- .product end -->

				
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #featuredItems end -->
	
	<!-- Clients
============================================= -->
	<section id="clients" class="clients bg-gray">
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<p class="subheading">Awesome</p>
					<h2>Our Brands</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
			<div class="row heading-desc">
				<div class="col-xs-12 col-sm-12 col-md-10">
					<p>Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres.</p>
				</div>
				<!-- .col-md-10 end -->
				<div class="col-xs-12 col-sm-12 col-md-2">
					<a class="btn btn-primary btn-block" href="#">Check All Brands</a>
				</div>
				<!-- .client end -->
			</div>
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="clients-bg">
				<div class="row">
					<div class="col-xs-12 colsm-12 col-md-12 client-carousel">
						<!-- Client #1 -->
						<div class="client">
							<img src="assets/images/clients/1.png" alt="client">
						</div>
						<!-- .client end -->
						
						<!-- Client #2 -->
						<div class="client">
							<img src="assets/images/clients/2.png" alt="client">
						</div>
						<!-- .client end -->
						
						<!-- Client #3 -->
						<div class="client">
							<img src="assets/images/clients/3.png" alt="client">
						</div>
						<!-- .client end -->
						
						<!-- Client #4 -->
						<div class="client">
							<img src="assets/images/clients/4.png" alt="client">
						</div>
						<!-- .client end -->
						
						<!-- Client #5 -->
						<div class="client">
							<img src="assets/images/clients/5.png" alt="client">
						</div>
						<!-- .client end -->
						
						<!-- Client #6 -->
						<div class="client">
							<img src="assets/images/clients/6.png" alt="client">
						</div>
						<!-- .client end -->
						<!-- Client #4 -->
						<div class="client">
							<img src="assets/images/clients/4.png" alt="client">
						</div>
						<!-- .client end -->
						
						<!-- Client #5 -->
						<div class="client">
							<img src="assets/images/clients/5.png" alt="client">
						</div>
						<!-- .client end -->
						
						<!-- Client #6 -->
						<div class="client">
							<img src="assets/images/clients/6.png" alt="client">
						</div>
						<!-- .client end -->
					</div>
				</div>
				<!-- .row end -->
			</div>
		</div>
		<!-- .container end -->
	</section>
	<!-- #clients end -->
	

	
	<!-- Footer #2
============================================= -->
	<footer id="footer" class="footer footer-2">
		<!-- Footer Info
	============================================= -->
        <?php include 'inc/footer.php'; ?>
		<!-- .footer-copyright end -->
	</footer>
</div>
<!-- #wrapper end -->

<!-- Footer Scripts
============================================= -->
<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/functions.js"></script>
</body>
</html>