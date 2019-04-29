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
	
	<!-- Page Title
============================================= -->
	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>Compare</h1>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.html"></a>
						</li>
						<li class="active"></li>
					</ol>
				</div>
				<!-- .col-md-6 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #page-title end -->
	
	<!-- Shop Single right sidebar
============================================= -->
	<section id="shopgrid" class="shop shop-single">
		<div class="container shop-content">
			<div class="row">

			</div>
			<!-- .row end -->
            <?php
            $iid=$_GET["id"];

            $sql = "SELECT * From service_provider where s_id='$iid'";
            $run = $conn->prepare($sql);
            $run->execute();

            if($run->rowCount() > 0) {
                while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                    $name = $row["s_name"];
                    $cat = $row["s_cat"];
                    $img = $row["s_img"];
                    $cont = $row["s_contact"];
                    $des = $row["s_des"];
                    $bill = $row["s_bill"];
                    $dis = $row["s_discount"];
                    $status= $row["s_status"];


                    echo '
				      <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-2">
        <div class="prodcut-images">
            <div class="product-img-slider">
                <img src="assets/images/shop/grid/'.$img.'" alt="product image">

            </div>

        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="product-title text-center-xs">
            <h3>'.$name.'</h3>
        </div>
        <!-- .product-title end -->
        <div class="product-meta mb-30">
            <div class="product-price pull-left pull-none-xs">
                <p><span class="discount">' .$dis.'%</span>' .$bill.' tk</p>
            </div>
            <!-- .product-price end -->
            <div class="product-review text-right text-center-xs">
							<span class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
							<i class="fa fa-star-o"></i>
							</span>
                <span>5 Review(s)</span> / <span>
							<a href="#">Add Review</a>
							</span>
            </div>
            <!--- .product-review end -->
        </div>
        <!-- .product-img end -->

        <div class="product-desc text-center-xs">
            <p class="mb-0">' .$des.'</p>
        </div>
        <!-- .product-desc end -->

        <hr class="mt-30 mb-30">
        <div class="product-details text-center-xs">
            <h5>Other Details :</h5>
            <ul class="list-unstyled">
                <li>Service : <span>' .$cat.'</span></li>
                <li>Contact : <span>'.$cont.'</span></li>
                <li>Status : <span>'.$status.'</span></li>

            </ul>
        </div>
        <!-- .product-details end -->
        <hr class="mt-30 mb-30">
        <div class="product-action">
            <div class="product-cta text-right text-center-xs">
                <a class="btn btn-primary bordered" href="tel:'.$cont.'">Contact</a>
                
            </div>
        </div>
        <!-- .product-action end -->
        <hr class="mt-30 mb-30">
        <div class="product-share  text-center-xs">
            <h5 class="share-title">share: </h5>
            <a class="share-facebook" href="#"><i class="fa fa-facebook"></i></a>
            <a class="share-twitter" href="#"><i class="fa fa-twitter"></i></a>
            <a class="share-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
            <a class="share-pinterest" href="#"><i class="fa fa-pinterest"></i></a>
            <a class="share-dribbble" href="#"><i class="fa fa-dribbble"></i></a>
        </div>
        <!-- .product-share end -->
    </div>'; }
            }?>


    <?php

    $iid2=$_GET["id2"];

    $sql = "SELECT * From service_provider where s_id='$iid2'";
    $run = $conn->prepare($sql);
    $run->execute();

    if($run->rowCount() > 0) {
        while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
            $name = $row["s_name"];
            $cat = $row["s_cat"];
            $img = $row["s_img"];
            $cont = $row["s_contact"];
            $des = $row["s_des"];
            $bill = $row["s_bill"];
            $dis = $row["s_discount"];
            $status= $row["s_status"];
    
      echo' <div class="col-xs-3 col-sm-3 col-md-2">
        <div class="prodcut-images">
            <div class="product-img-slider">
                <img src="assets/images/shop/grid/'.$img.'" alt="product image">

            </div>

        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="product-title text-center-xs">
            <h3>'.$name.'</h3>
        </div>
        <!-- .product-title end -->
        <div class="product-meta mb-30">
            <div class="product-price pull-left pull-none-xs">
                <p><span class="discount">' .$dis.'%</span>' .$bill.' tk</p>
            </div>
            <!-- .product-price end -->
            <div class="product-review text-right text-center-xs">
							<span class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
							<i class="fa fa-star-o"></i>
							</span>
                <span>5 Review(s)</span> / <span>
							<a href="#">Add Review</a>
							</span>
            </div>
            <!--- .product-review end -->
        </div>
        <!-- .product-img end -->

        <div class="product-desc text-center-xs">
            <p class="mb-0">' .$des.'</p>
        </div>
        <!-- .product-desc end -->

        <hr class="mt-30 mb-30">
        <div class="product-details text-center-xs">
            <h5>Other Details :</h5>
            <ul class="list-unstyled">
                <li>Service : <span>' .$cat.'</span></li>
                <li>Contact : <span>'.$cont.'</span></li>
                <li>Status : <span>'.$status.'</span></li>

            </ul>
        </div>
        <!-- .product-details end -->
        <hr class="mt-30 mb-30">
        <div class="product-action">
            <div class="product-cta text-right text-center-xs">
                <a class="btn btn-primary bordered" href="tel:'.$cont.'">Contact</a>
                
            </div>
        </div>
        <!-- .product-action end -->
        <hr class="mt-30 mb-30">
        <div class="product-share  text-center-xs">
            <h5 class="share-title">share: </h5>
            <a class="share-facebook" href="#"><i class="fa fa-facebook"></i></a>
            <a class="share-twitter" href="#"><i class="fa fa-twitter"></i></a>
            <a class="share-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
            <a class="share-pinterest" href="#"><i class="fa fa-pinterest"></i></a>
            <a class="share-dribbble" href="#"><i class="fa fa-dribbble"></i></a>
        </div>
        <!-- .product-share end -->
    </div>
    
</div>
    
</div>
';



                }
            }


            ?>


			<!-- .row end -->
			<div>   </div>

			<!-- .row end -->

								<!-- .product end -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .product-related end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #blog end -->
	
	<!-- Footer #1
============================================= -->
	<footer id="footer" class="footer footer-1">
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