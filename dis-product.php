<?php

require './class/atclass.php';

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive Website Template | Tables :: w3layouts</title>
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
                    <div class="tables">
                        <h2 class="title1">Product Table</h2>
                        

                        
                        <div class="panel-body widget-shadow">
                            <h4>Products List</h4>
                            <button type="button" onclick="window.location='add-product.php';" class="btn btn-primary">Add Product</button>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Details</th>
                                        <th>Image</th>
                                        <th>Edit / Delete</th>
                                    </tr>
                                        <?php
                                        
                                        if(isset($_GET['did'])){
                                            
                                            
                                            $did = $_GET['did'];
                                            
                                            $del_query = mysqli_query($connection,"delete from tbl_product where pro_id='{$did}'");
                                            
                                            if($del_query){
                                                echo "<script>alert('Record Deleted');window.location='dis-product.php'</script>";
                                            }
                                        }
                                        
                                        $dis_query = mysqli_query($connection,"select * from tbl_product");
                                        
                                        $count = mysqli_num_rows($dis_query);
                                        echo "Number of Product $count";

                                        while($data = mysqli_fetch_array($dis_query)){

                                            echo "<tr>";
                                            echo "<td>{$data['pro_id']}</td>";
                                            echo "<td>{$data['pro_name']}</td>";
                                            echo "<td>{$data['pro_price']}</td>";
                                            echo "<td>{$data['pro_details']}</td>";
                                            echo "<td><img src='image/".$data['pro_photo']."' style='width:100px;' alt='This is an image'></td>";
                                            echo "<td><a href='edit-product.php?eid={$data['0']}'><img src='./image/pencil.png' height='15px' width='15px'></a>&nbsp; | &nbsp;<a href='dis-product.php?did=$data[0]'><img src='./image/delete.png' height='15px' width='15px'></a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                </thead>
                            </table>
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