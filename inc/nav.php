<?php
include "db.php";

?>

<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="logo" href="index.php">
            <img src="assets/images/logo/logo.png" alt="Autoshop">
        </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse pull-right" id="header-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a href="shop-product-grid-fullwidth.php">Services</a>
            </li>
            <!-- li end -->

            <!-- li end -->
            <?php
                if(isset($_SESSION['user'])) {

                    $id = $_SESSION['user'];

                    $sql = "SELECT * From users where u_id='$id'";
                    $run = $conn->prepare($sql);
                    $run->execute();

                    if($run->rowCount() > 0) {
                        while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                            $name = $row["u_name"];
                        }

                    }
                    echo '<li>
                             <a href="">' . $name . '</a>
                         </li>
                         
                         <li>
                              <a href="logout.php">LogOut</a>
                         </li>';
                }
                else if(isset($_SESSION['service_provider'])) {

                $id = $_SESSION['service_provider'];

                $sql = "SELECT * From service_provider where s_id='$id'";
                $run = $conn->prepare($sql);
                $run->execute();

                if($run->rowCount() > 0) {
                    while ($row = $run->fetch(PDO::FETCH_ASSOC)) {
                        $name = $row["s_name"];
                    }

                }
                echo '<li>
                             <a href="service_provider_panel.php">'. $name .'</a>
                         </li>
                         
                         <li>
                              <a href="logout.php">LogOut</a>
                         </li>';
            } else{
                    echo'<li>
                           <a href="login.php">LogIn</a>
                        </li>
                      <li class="has-dropdown">
                           <a href="#" data-toggle="dropdown" class="dropdown-toggle">Signup</a>
                       <ul class="dropdown-menu">
                            <li>
                                 <a href="register.php">As User</a>
                            </li>
                            <li>
                                 <a href="register2.php">As Service Provider</a>
                            </li>
                        </ul>
                       </li>';
                }
            ?>

            <li>
                <a href="contact.php">Contact</a>
            </li>
            <!-- li end -->
        </ul>

        <!-- Mod-->
        <div class="module module-search pull-left">
            <div class="search-icon">
                <i class="fa fa-search"></i>
                <span class="title">search</span>
            </div>
            <div class="search-box">
                <?php
                     if(isset($_POST["search"])){
                         $topic = trim($_POST['search_word']);
                         header("Location: search_result.php?category=$topic");
                     }
                ?>
                <form class="search-form" method="post">
                    <div class="form-group">
                        <input class="text" placeholder="Type Your Search Words" id="search_word" name="search_word" required="">
                    </div>
                    <button type="submit" class="btn btn-primary m-b" id="search" name="search">
                        Search
                    </button>
                    <!-- /input-group -->
                </form>
            </div>
        </div>
        <!-- .module-search-->

    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
