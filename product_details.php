<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
    <!-- stylesheet link -->
    <link href="style.css" rel="stylesheet">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- first child -->
    <nav class="navbar sticky-top bg-white navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid p-0">
            <a class="navbar-brand" href="#"><img class="logo" src="images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php">PRODUCTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="user_panel/user_registration.php">REGISTER</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">TOTAL PRICE:<?php total_cost_price();?>/-</a>
                    </li>




                </ul>
                <form class="d-flex" action="search_product.php" method="get" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                    <input type="submit" value="search" class="btn btn-ouline-primary bg-success text-white" name="search_data_product">
                </form>
            </div>
        </div>
    </nav>
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Welcome Guest</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li> -->
            <?php
            // echo $_SESSION['username'];
            if (isset($_SESSION['username'])) {
                echo " <li class='nav-item'>
                <a class='nav-link' href='user_panel/profile.php'>Welcome " . $_SESSION['username'] . "</a>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' href='user_panel/logout.php'>Logout</a>
            </li>
            ";
            } else {
                echo " <li class='nav-item'> 
                <a class='nav-link' href='#'>Welcome guest</a>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' href='user_panel/user_login.php'>Login</a>
            </li>";
            }
            ?>
        </ul>
    </nav>
      <!-- add to cart -->
      <?php
    cart();
    ?>
    <!-- third child -->
    <div class="bg-light">
        <h3 class="text-center">Baibhav's Shop</h3>
        <p class="text-center">A collection of various items</p>

    </div>
    <!-- fourth child -->
    <div class="container-fluid">
        <div class="row r1">
            <div class="col-10 md-10">
                <!-- products -->
                <div class="row">
                    <!-- <div class="col-md-4">
                        <!-- card
                        <div class='card' style='width: 18rem;'>
                            <img src='images/apple1.jpg' class='card-img-top ' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p>$product_price</p>
                                <a href='#' class='btn btn-info'> add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        related cards -->
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center text-light">Related Products</h4>
                            </div>
                            <div class="col-md-6">
                            <img src='images/apple1.jpg' class='card-img-top ' alt='$product_title'>
                            </div>
                            <div class="col-md-6">
                            <img src='images/apple1.jpg' class='card-img-top ' alt='$product_title'>
                            </div>
                        </div>
                    </div> --> 
                <?php
                    view_details();
                    ?>
                   
                </div>
            </div>
            <div class="col-2 md-2 bg-secondary p-0">
                <!-- sidenav -->
                <ul class="navbar-nav me-auto">
                    <!-- brandsto be displayed -->
                    <li class="nav-item  text-center">
                        <a href="" class="nav-link text-dark">
                            <h4>BRANDS</h4>
                        </a>
                    </li>
                    <?php
                    getbrands();
                    ?>

                    <ul class="navbar-nav">
                        <!-- categories to be displayed -->
                        <li class="nav-item text-center">
                            <a href="" class="nav-link text-dark">
                                <h4>CATEGORIES</h4>
                            </a>
                        </li>
                        <?php
                        getcategories();
                        ?>

                    </ul>
            </div>

        </div>
    </div>
    <!-- slider -->
   
    <!-- end of slider -->
    <!-- last child -->
    <div class="bg-secondary text-white p-3 text-center">
        <p>Designed by Baibhav Rajkumar</p>
    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>