<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>

    <link href="style.css" rel="stylesheet">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- fontawesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
     <!-- first child -->
     <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid p-0">
            <a class="navbar-brand" href="#"><img class="logo" src="images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="../index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="../index.php">PRODUCTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="user_registration.php">REGISTER</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="../contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">TOTAL PRICE:<?php total_cost_price(); ?>/-</a>
                    </li>




                </ul>
                <form class="d-flex" action="search_product.php" method="get" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                    <input type="submit" value="search" class="btn btn-ouline-primary" name="search_data_product">
                </form>
            </div>
        </div>
    </nav>
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">

            <?php
            // echo $_SESSION['username'];
            if (isset($_SESSION['username'])) {
                echo " <li class='nav-item'>
                <a class='nav-link' href='profile.php'>Welcome " . $_SESSION['username'] . "</a>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' href='logout.php'>Logout</a>
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
    <div class="row">
        <div class="col-md-2">
            <ul class="navbar-nav bg-secondary text-center">
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="#">
                        <h4>your profile</h4>
                    </a>
                </li>
                <?php
                $username = $_SESSION['username'];
                $user_image = "select * from `user_details`where username='$username'";
                $result_image = mysqli_query($con, $user_image);
                $row_image = mysqli_fetch_array($result_image);
                $user_image = $row_image['user_image'];
                echo "   <li class='nav-items'>
                <img style='width:100%;'src='./user_images/" . $user_image . "' alt=''>
            </li>";
                ?>

                <li class="nav-items">
                    <a class="nav-link text-light" href="profile.php">pending orders</a>
                </li>
                <li class="nav-items">
                    <a class="nav-link text-light" href="profile.php?edit_account">edit account</a>
                </li>
                <li class="nav-items">
                    <a class="nav-link text-light" href="profile.php?my_orders">my orders</a>
                </li>
                <li class="nav-items">
                    <a class="nav-link text-light" href="profile.php?delete_account">delete account</a>
                </li>
                <li class="nav-items">
                    <a class="nav-link text-light" href="logout.php">logout</a>
                </li>


            </ul>
        </div>
        <div class="col-md-10 text-center">
            <?php
            get_user_order_details();
            if(isset($_GET['edit_account'])){
                include('edit_account.php');
            }
            if(isset($_GET['my_orders'])){
                include('user_orders.php');
            }
            if(isset($_GET['delete_account'])){
                include('delete_account.php');
            }

            ?>
        </div>
    </div>

</body>

</html>