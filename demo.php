<?php
date_default_timezone_set('Asia/Dhaka');
if(isset($_POST["upload_product"])){
    $title = $_POST["add_new_product_name"];
    $target_dir = "photos/";
    $dateCurrent = date('d-m-Yh-ia', time());
    $target_file = $target_dir .basename($dateCurrent.$_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ".basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $filename = basename( $_FILES["fileToUpload"]["name"]);

            $sqlupload = "insert into products(prod_name,prod_design_path) values ('$title', '$filename')";
            //echo $sqlupload;
            $runupload = $conn->prepare($sqlupload);
            $runupload->execute();
            echo '<script>alert("Product uploaded Successfully");</script>';

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


}

?>
<div class="wrapper wrapper-content animated fadeInRightBig">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Enter New Product Details </h5>
                </div>
                <div class="ibox-content">
                    <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="new_product_name"
                                           name="add_new_product_name" placeholder="name of your product" required>
                                </div>
                                <label class="col-sm-2 control-label">Design</label>
                                <div class="col-sm-4">
                                    <input type="file" class="form-control" name="fileToUpload" required >
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-white" type="reset">Reset</button>
                                <button class="btn btn-primary" type="submit" value="Upload" id="add_new_product_btn"
                                        name="upload_product">Add New Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>