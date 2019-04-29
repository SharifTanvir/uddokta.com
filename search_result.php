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
					<h1>All Services</h1>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.html">Home</a>
						</li>
						<li class="active">grid</li>
					</ol>
				</div>
				<!-- .col-md-6 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #page-title end -->
	
	<!-- Shop product grid right sidebar
============================================= -->
	<section id="shopgrid" class="shop shop-grid">
		<div class="container">
			<div class="row">
				<div class="col-xs-12  col-sm-12  col-md-12">
					<div class="shop-options">
						<div class="product-options2 pull-left pull-none-xs">
							<ul class="list-inline">
								<li>
									<div class="product-sort mb-15-xs">
										<span>sort by:</span>
										<i class="fa fa-angle-down"></i>
										<select>
											<option selected="" value="Default">Product Name</option>
											<option value="Larger">Newest Items</option>
											<option value="Larger">oldest Items</option>
											<option value="Larger">Hot Items</option>
											<option value="Small">Highest Price</option>
											<option value="Medium">Lowest Price</option>
										</select>
									</div>
								</li>
								<li>
									<div class="product-sort">
										<span>Show:</span>
										<i class="fa fa-angle-down"></i>
										<select>
											<option selected="" value="10">10 items / page</option>
											<option value="25">25 items / page</option>
											<option value="50">50 items / page</option>
											<option value="100">100 items / page</option>
										</select>
									</div>
								</li>
							</ul>
						</div>
						<!-- .product-options end -->
						<div class="product-view-mode text-right pull-none-xs">
							<span>view as:</span>
							<a class="active" href="#"><i class="fa fa-th-large"></i></a>
							<a href="#"><i class="fa fa-th-list"></i></a>
						</div>
						<!-- .product-num end -->
					</div>
					<!-- .shop-options end -->
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			<div class="row">

                <?php
                $iid=$_GET["category"];
                $sql = "SELECT * From service_provider where s_cat like '%".$iid."%' ";
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


                        echo '
				      <div class="col-xs-12 col-sm-6 col-md-3 product">
					  <div class="product-img">
						<img  src="assets/images/shop/grid/'.$img.'" alt="Product"/>
						<div class="product-hover">
							<div class="product-action">
								
								<a class="btn btn-primary" href="shop-single-fullwidth.php?id='.$id.'">Details</a>
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

						
					</div>

				</div>';

                    }
                }
                else{
                    echo '<script>alert(" Nothing Found ")</script>';
                }


                ?>





				<!-- .product end -->
				
			</div>
			<!-- .row end -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<ul class="pagination">
						<li class="active">
							<a href="#">1</a>
						</li>
						<li>
							<a href="#">2</a>
						</li>
						<li>
							<a href="#">3</a>
						</li>
						<li>
							<a href="#" aria-label="Next">
							<span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
							</a>
						</li>
					</ul>
				</div>
				<!-- .col-md-12 end -->
			</div>
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