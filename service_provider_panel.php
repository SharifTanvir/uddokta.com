<?php
include "db.php";
session_start();
$id = $_SESSION['service_provider'];
?>


<?php
$errorss=0;
if (isset($_POST['update'])) {
    $phone = trim($_POST['phone']);
    $cat = trim($_POST['category']);
    $des = $_POST['description'];
    $bill = trim($_POST['bill']);
    $dis = trim($_POST['discount']);
    $status=trim($_POST['status']);

    if(!(strlen($phone) == 11)){

        echo '<script>alert("Phone Number must contain 11 digits. Example : 01700000000");</script>';

        $errorss=1;
    }
    else{
        $sql = "SELECT s_id FROM service_provider WHERE s_contact = '$phone' and s_id != $id" ;
        $check_query = $conn->prepare($sql);
        $check_query->execute();

        if($check_query->rowCount() > 0){

            echo '<script>alert("Phone number aready exists. Please try with different number.");</script>';

            $errorss=1;
        }
    }
    if (isset($_POST['update']) && $errorss==0) {
            $sqlupload= "UPDATE service_provider SET s_cat='$cat',s_des='$des',s_contact='$phone',s_bill='$bill',s_discount='$dis', s_status='$status' where service_provider.s_id=$id ";
            $runupload = $conn->prepare($sqlupload);
            $runupload->execute();

            header("Location: service_provider_panel.php");


    } else {
            $errors[] = 'Failed!.';
    }

}
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
					<h1>Profile</h1>
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
            <?php
            if (! empty($errors)) {
                ?>
                <div class="alert alert-warning">
                    <?php
                    foreach ($errors as $error) {
                        ?>
                        <ul>
                            <li><?php echo $error; ?></li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
			<div class="row">

			</div>
			<!-- .row end -->
            <?php
            $iid= $_SESSION['service_provider'];

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
                    $status = $row["s_status"];


                    echo '
				      <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="prodcut-images">
            <div class="product-img-slider">
                <img src="assets/images/shop/grid/' . $img . '" alt="product image">

            </div>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-7">
        <div class="product-title text-center-xs">
            <h3>' . $name . '</h3>
        </div>';
                }
            }
        ?>
        <form action="" method="post"  style="margin-top: 80px;" enctype="multipart/form-data">

                <label for="inputPhonenumber">Phone Number</label>
                <input type="text" name="phone" class="form-control" value=<?php echo "'$cont'";?>  autofocus required="">
                <label for="inputCategory">Category</label>
                <div class="">
                    <select class="form-control m-b" name="category" required>
                        <option><?php echo "$cat";?></option>

                        <?php
                        $sql = "SELECT * FROM catagory" ;
                        $check_query = $conn->prepare($sql);
                        $check_query->execute();
                        if($check_query->rowCount() > 0) {
                            while ($row = $check_query->fetch(PDO::FETCH_ASSOC)) {
                                $cattt = $row["catagory_name"];
                                echo' <option value="'.$cattt.'">'.$cattt.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <label for="inputDescription">Description</label>
                <input type="text" name="description" class="form-control"  value=<?php echo "'$des'";?> required="">
                <label for="inputBill">Bill Per Hour</label>
                <input type="text" name="bill" class="form-control" value=<?php echo "'$bill'";?>  autofocus required="">
                <label for="inputDiscount">Discount</label>
                <input type="text" name="discount" class="form-control" value=<?php echo "'$dis'";?>  autofocus required="">
                <label for="inputStatus">Status</label>
                <div class="">
                  <select class="form-control m-b" name="status" required>
                    <option><?php echo "$status";?></option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                  </select>
                </div>
                <button class="btn btn-lg btn-primary btn-block"  style="margin-top: 80px;" type="submit" name="update">Update</button>
            </form>
        <!-- .product-share end -->
    </div>
</div>
<!-- .row end -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="product-tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
    
                <li role="presentation">
                    <a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">reviews(2)</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                
                <!-- #description end -->

                <!-- #details end -->
                <div role="tabpanel" class="tab-pane reviews" id="reviews">
                    <ul class="product-review list-unstyled">
                        <li class="review-comment">
                            <h6>Mostafa Amin</h6>
                            <p class="review-date">22/02/2016</p>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <div class="product-comment">
                                <p>Lorem ipsum dolor sit amet, mauris suspendisse viverra eleifend tortor tellus suscipit, tortor aliquet at nulla mus, dignissim neque, nulla neque. Ultrices proin mi urna nibh ut, aenean sollicitudin etiam libero nisl, ultrices ridiculus in magna purus consequuntur, ipsum donec orci ad vitae pede, id odio.</p>
                            </div>
                        </li>
                        <!-- .review-comment end -->

                        <li class="review-comment">
                            <h6>Mohamed Habaza</h6>
                            <p class="review-date">21/02/2016</p>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="product-comment">
                                <p>Lorem ipsum dolor sit amet, mauris suspendisse viverra eleifend tortor tellus suscipit, tortor aliquet at nulla mus, dignissim neque, nulla neque. Ultrices proin mi urna nibh ut, aenean sollicitudin etiam libero nisl, ultrices ridiculus in magna purus consequuntur, ipsum donec orci ad vitae pede, id odio.</p>
                            </div>
                        </li>
                        <!-- .review-comment end -->
                    </ul>
                    <div class="form-review">
                       
                                 </div>
                                     </div>
                                    <!-- #reviews end -->
                                  </div>
                                  <!-- #tab-content end -->
                                  </div>
                                   <!-- .product-tabs end -->
                                 </div>
                             </div>

			<!-- .row end -->
			<div>   </div>

			<!-- .row end -->
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