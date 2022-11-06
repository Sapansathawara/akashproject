<?php
        $editid = $_GET['eid'];
        require './class/atclass.php';

        if(!isset($_GET['eid']) || empty($_GET['eid'])){
            
            header("location:dis-product.php");
        }
        
        $selectq = mysqli_query($connection,"select * from tbl_product where pro_id='{$editid}'");
        
        $selectrow = mysqli_fetch_array($selectq);
                
        $msg ="";
        
        if(isset($_POST['btnsubmit'])){
            
            $id = $_POST['id'];
            $pname = $_POST['pname'];
            $pprice = $_POST['pprice'];
            $pdetails = $_POST['pdetails'];
            $filename = $_FILES['file123']['name'];
            $filetemp = $_FILES['file123']['tmp_name'];
            
            if(empty($filename)){
                $query = mysqli_query($connection,"update tbl_product set pro_name='{$pname}',pro_price='{$pprice}',pro_details='{$pdetails}' where pro_id='{$editid}'");
                echo "<script>alert('Record Updated');window.location='dis-product.php';</script>";
            }
            else{
                move_uploaded_file($filetemp,"image/".$filename);
                $query = mysqli_query($connection,"update tbl_product set pro_name='{$pname}',pro_price='{$pprice}',pro_details='{$pdetails}',pro_photo='{$filename}' where pro_id='{$editid}'");
                echo "<script>alert('Record Updated');window.location='dis-product.php';</script>";
            }
        }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive Website Template | Forms :: w3layouts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />

        <!-- font-awesome icons CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- //font-awesome icons CSS -->

        <!-- side nav css file -->
        <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
        <!-- side nav css file -->

        <!-- js-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/modernizr.custom.js"></script>

        <!--webfonts-->
        <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
        <!--//webfonts--> 

        <!-- Metis Menu -->
        <script src="js/metisMenu.min.js"></script>
        <script src="js/custom.js"></script>
        <link href="css/custom.css" rel="stylesheet">
        <!--//Metis Menu -->

    </head> 
    <body class="cbp-spmenu-push">
        <div class="main-content">
            <?php
            include './themepart/sidebar.php';
            ?>
            <!--left-fixed -navigation-->

            <!-- header-starts -->
            <?php
            include './themepart/header.php';
            ?>
            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="forms" method="post" enctype="multipart/form-data">
                        <h2 class="title1">Update Product</h2>

                        <div class=" form-grids row form-grids-right">
                            <div class="widget-shadow " data-example-id="basic-forms"> 
                                <div class="form-title">
                                    <h4>Edit Product Info :</h4>
                                </div>
                                <div class="form-body">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
                                        
                                        <input type="hidden" name="id" value="<?php echo $selectrow['pro_id'] ?>">
                                        
                                        <div class="form-group"> 
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label> 
                                            <div class="col-sm-9"> 
                                                <input type="text" class="form-control" id="inputEmail3" name="pname" value="<?php echo $selectrow['pro_name'] ?>" required placeholder="Enter Product Name"> 
                                            </div> 
                                        </div> 
                                        
                                        <div class="form-group"> 
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Price</label> 
                                            <div class="col-sm-9"> 
                                                <input type="number" class="form-control" id="inputEmail3" name="pprice" value="<?php echo $selectrow['pro_price'] ?>" required placeholder="Enter Price"> 
                                            </div> 
                                        </div> 
                                        
                                        <div class="form-group"> 
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Details</label> 
                                            <div class="col-sm-9"> 
                                                <textarea class="form-control" name="pdetails" required><?php echo $selectrow['pro_details'] ?></textarea>
                                            </div> 
                                        </div> 
                                        
                                        <div class="form-group"> 
                                            <label class="col-sm-2 control-label">Product Image</label> 
                                            <div class="col-sm-9"> 
                                                <input type="file" class="form-control" value="<?php echo $selectrow['pro_photo'] ?>" name="file123"> 
                                            </div> 
                                        </div> 

                                        <div class="col-sm-offset-2"> 
                                            <button type="submit" class="btn btn-primary" name="btnsubmit">Update</button> 
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer-->
            <?php
            include './themepart/footer.php';
            ?>
            <!--//footer-->
        </div>

        <!-- side nav js -->
        <script src='js/SidebarNav.min.js' type='text/javascript'></script>
        <script>
            $('.sidebar-menu').SidebarNav()
        </script>
        <!-- //side nav js -->

        <!-- Classie --><!-- for toggle left push menu script -->
        <script src="js/classie.js"></script>
        <script>
            var menuLeft = document.getElementById('cbp-spmenu-s1'),
                    showLeftPush = document.getElementById('showLeftPush'),
                    body = document.body;

            showLeftPush.onclick = function () {
                classie.toggle(this, 'active');
                classie.toggle(body, 'cbp-spmenu-push-toright');
                classie.toggle(menuLeft, 'cbp-spmenu-open');
                disableOther('showLeftPush');
            };

            function disableOther(button) {
                if (button !== 'showLeftPush') {
                    classie.toggle(showLeftPush, 'disabled');
                }
            }
        </script>
        <!-- //Classie --><!-- //for toggle left push menu script -->

        <!--scrolling js-->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!--//scrolling js-->

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.js"></script>

    </body>
</html>