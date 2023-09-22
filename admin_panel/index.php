<?php
include('../includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet"href="../style.css">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- fontawesome cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- navbar -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img class="logo"src="../images/logo.png" alt="">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a href="" class="nav-link">Welcome guest</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin_login.php" class="nav-link">LOGIN</a>
                    </li> -->
                    <?php
            // echo $_SESSION['username'];
            if (isset($_SESSION['admin_name'])) {
                echo " <li class='nav-item'>
                <a class='nav-link' href=''>Welcome " . $_SESSION['admin_name'] . "</a>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' href='admin_logout.php'>Logout</a>
            </li>
            ";
            } else {
                echo " <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome guest</a>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' href='admin_login.php'>Login</a>
            </li>";
            }
            ?>
                </ul>
             </nav>
        </div>
    </nav>
    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center p-3">Manage Details</h3>
    </div>
    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center justify-content-center">
            <div>
                <a href=""><img style="width:200px;height:200px"src="../images/admin_logo.jpg" alt=""></a>
                
            </div>
            <div class="button text-center p-4">
                
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my1 p-1">insert categories</a></button>
                <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my1 p-1">insert brands</a></button>
                <button><a href="insert_product.php" class="nav-link text-light bg-info my1 p-1">insert products</a></button>
                <button><a href="index.php?view_category" class="nav-link text-light bg-info my1 p-1">view categories </a></button>
                <button><a href="index.php?view_brand" class="nav-link text-light bg-info my1 p-1">view brands</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my1 p-1">view products</a></button>
                <button><a href="index.php?all_orders" class="nav-link text-light bg-info my1 p-1">all orders</a></button>
                <button><a href="index.php?all_payments" class="nav-link text-light bg-info my1 p-1">all payments</a></button>
                <button><a href="index.php?all_users" class="nav-link text-light bg-info my1 p-1">list users</a></button>
                <button><a href="" class="nav-link text-light bg-info my1 p-1">logout</a></button>
            </div>

        </div>
    </div>
</div>
<!-- fourth child -->
<div class="container my-5">
    <?php
    if(isset($_GET['insert_category']))
    {
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brand']))
    {
        include('insert_brands.php');
    }
    if(isset($_GET['view_products'])){

        include('view_products.php');
    }
    if(isset($_GET['edit_products'])){

        include('edit_products.php');
    }
    if(isset($_GET['delete_products'])){

        include('delete_products.php');
    }
    if(isset($_GET['view_category'])){

        include('view_category.php');
    }
    if(isset($_GET['view_brand'])){

        include('view_brand.php');
    }
    if(isset($_GET['edit_category'])){

        include('edit_category.php');
    }
    if(isset($_GET['delete_category'])){

        include('delete_category.php');
    }
    if(isset($_GET['edit_brand'])){

        include('edit_brand.php');
    }
    if(isset($_GET['delete_brand'])){

        include('delete_brand.php');
    }
    if(isset($_GET['all_orders'])){

        include('all_orders.php');
    }
    if(isset($_GET['delete_orders'])){

        include('delete_orders.php');
    }
    if(isset($_GET['all_payments'])){

        include('all_payments.php');
    }
    if(isset($_GET['delete_payments'])){

        include('delete_payments.php');
    }
    if(isset($_GET['all_users'])){

        include('all_users.php');
    }
    if(isset($_GET['delete_users'])){

        include('delete_users.php');
    }
    



    ?>
</div>
      <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 


</body>
</html>