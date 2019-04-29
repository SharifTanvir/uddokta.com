<?php
include "db.php";
?>
<?php
if(isset($_POST["signup_button"])){
    $errorss= 0;


    $nam = $_POST["add_name"];
    $phone = $_POST["identifier"];
    $pass = $_POST["user_password"];
    $pass2 = $_POST["user_password2"];

    if($pass != $pass2){

        echo '<script>alert("Password does not match.");</script>';
        $errorss=1;

    }
    if(!(strlen($phone) == 11)){

        echo '<script>alert("Phone Number must contain 11 digits. Example : 01700000000");</script>';

        $errorss=1;
    }
    else{
        $sql = "SELECT u_id FROM users WHERE u_contact = '$phone'" ;
        $check_query = $conn->prepare($sql);
        $check_query->execute();

            if($check_query->rowCount() > 0){

                echo '<script>alert("Phone number aready exists. Please try with different number.");</script>';

                $errorss=1;
            }
    }

    if( $errorss !=1 && isset($_POST["signup_button"])){

        $sqlupload = "insert into users(u_name,u_contact,u_pass)values ('$nam','$phone','$pass')";
        //echo $sqlupload;
        $runupload = $conn->prepare($sqlupload);
        $runupload->execute();
        header("Location: login.php");;

    }
    else{
        echo '<script>alert("something wrong!");</script>';
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
					<h1>register</h1>
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
	
	<div class="clearfix mb-150"></div>
	
	<!-- Register Section
============================================= -->
	<section id="register" class="register">
		<div class="container">
            <form class="m-t" role="form" method="post" action="">
                <label class="col-sm-12 control-label">Name</label>
                <div class="form-group">
                    <input class="form-control" placeholder="your name" id="add_name" name="add_name" required="" type="text">
                </div>
                <label class="col-sm-12 control-label">Phone Number</label>
                <div class="form-group">
                    <input class="form-control" placeholder="01XXXXXXXXX" id="identifier" name="identifier" required="" type="text">
                </div>
                <label class="col-sm-12 control-label">Password</label>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" id="user_password" name="user_password" required="" type="password">
                </div>
                <label class="col-sm-12 control-label">Type Password Again</label>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" id="user_password2" name="user_password2" required="" type="password">
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b" id="signup_button" name="signup_button">
                    Signup
                </button>
            </form>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #register end -->
	
	<div class="clearfix mb-150"></div>
	
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