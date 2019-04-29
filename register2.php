<?php
include "db.php";
?>

<?php
$errors = [];
$errorss=0;
if (isset($_POST['register'])) {
    $nam = trim($_POST['username']);
    $phone = trim($_POST['phone']);
    $cat = $_POST['category'];
    $des = $_POST['description'];
    $bill = trim($_POST['bill']);
    $dis = trim($_POST['discount']);

    $password = trim($_POST['password']);
    $profile_photo = $_FILES['file'];


    $file_info = explode('.', $profile_photo['name']);
    $file_ext = end($file_info);

    if (! in_array($file_ext, ['jpg', 'png'], true)) {
        $errors[] = 'File must be a valid image file';
    }

    if(!(strlen($phone) == 11)){

        echo '<script>alert("Phone Number must contain 11 digits. Example : 01700000000");</script>';

        $errorss=1;
    }
    else{
        $sql = "SELECT s_id FROM service_provider WHERE s_contact = '$phone'" ;
        $check_query = $conn->prepare($sql);
        $check_query->execute();

        if($check_query->rowCount() > 0){

            echo '<script>alert("Phone number aready exists. Please try with different number.");</script>';

            $errorss=1;
        }
    }
    if (empty($errors)  && $errorss==0) {
        $new_file_name = uniqid('pp_', true).'.'.$file_ext;
        // file upload
        $upload = move_uploaded_file($profile_photo['tmp_name'], 'assets/images/shop/grid/'.$new_file_name);
        if ($upload) {

            $status="Active";
            $sqlupload = "insert into service_provider(s_name,s_cat,s_des,s_contact,s_bill,s_discount,s_pass,s_img,s_status)values('$nam','$cat','$des','$phone ','$bill ','$dis ','$password ','$new_file_name','$status')";
            $runupload = $conn->prepare($sqlupload);
            $runupload->execute();

            header("Location: login.php");


        } else {
            $errors[] = 'Failed!.';
        }
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
            <form action="" method="post" enctype="multipart/form-data">

                <label for="inputUsername">Name</label>
                <input type="text" name="username" class="form-control" autofocus required="">
                <label for="inputUsername">Phone Number</label>
                <input type="text" name="phone" class="form-control" autofocus required="">
                <label for="inputUsername">Category</label>
                <div class="">
                    <select class="form-control m-b" name="category" required>
                        <option>Select Category</option>

                        <?php
                        $sql = "SELECT * FROM catagory" ;
                        $check_query = $conn->prepare($sql);
                        $check_query->execute();
                        if($check_query->rowCount() > 0) {
                            while ($row = $check_query->fetch(PDO::FETCH_ASSOC)) {

                                $id = $row["catagory_name"];

                               echo' <option value="'.$id.'">'.$id.'</option>';
                            }
                        }
                        ?>

                    </select>
                </div>
                <label for="inputUsername">Description</label>
                <input type="text" name="description" class="form-control"  required="">
                <label for="inputUsername">Bill Per Hour</label>
                <input type="text" name="bill" class="form-control" autofocus required="">
                <label for="inputUsername">Discount</label>
                <input type="text" name="discount" class="form-control" autofocus required="">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" class="form-control">
                <label for="inputFile">Profile Photo</label>
                <input type="file" name="file" class="form-control"  required="">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
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