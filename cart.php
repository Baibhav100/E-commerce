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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
                        <a class="nav-link text-dark" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                    </li>




                </ul>
                <form class="d-flex" action="search_product.php" method="get" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                    <input type="submit" value="search" class="btn btn-ouline-primary bg-success" name="search_data_product">
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
                <a class="nav-link" href="user_panel/user_login.php">Login</a>
            </li> -->
            <?php
            // echo $_SESSION['username'];
            if (isset($_SESSION['username'])) {
                echo " <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome  ". $_SESSION['username'] . "</a>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' href='user_panel/logout.php'>Logout</a>
            </li>
            ";
            } else {
                echo " <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome guest </a>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' href='user_panel/user_login.php'>Login</a>
            </li>";
            }
            ?>
        </ul>
    </nav>
    <?php
    // cart();
    ?>
    <!-- layout of the static cart -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- code to display dynamic table -->
                        <?php
                        // global $con;
                        $total_price =0;
                        $ip = getIPAddress();
                        $cart_query = "select *from `cart_info` where ip_address='$ip'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count=mysqli_num_rows($result); 
                        if($result_count>0){
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "select *from `products` where product_id='$product_id'";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_immage1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total_price += $product_values;

                        ?>
                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="./images/<?php echo $product_immage1 ?>" class="card-img-top cart_img" alt=""></td>
                                    <td><input type="number" name="qty" class="form-input w-50" id=""></td>
                                    <!-- php code for quantity -->
                                    <?php 
                                          $ip = getIPAddress();
                                          if(isset($_POST['update_cart']))
                                          {
                                            $quantities=$_POST['qty'];
                                            $update_cart="update `cart_info` set quantity=$quantities where product_id=$product_id and ip_address='$ip'";
                                            $result_products_quantity= mysqli_query($con,$update_cart); 
                                             $total_price=$total_price*(int)$quantities;
                                        }

                                    ?>
                                    <td><?php echo $price_table ?>/-</td>
                                    <td><input type="checkbox"name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                    <td>
                                        <!-- <button class="bg-secondary border-0 p-2 text-light mx-3">Update</button> -->
                                        <input class="bg-secondary border-0 p-2 text-light mx-3" type="submit" value="update cart"
                                        name="update_cart">
                                        <!-- <button class="bg-secondary border-0 p-2 text-light mx-3">Remove</button> -->
                                        <input class="bg-secondary border-0 p-2 text-light mx-3" type="submit" value="remove cart"
                                        name="remove_cart">
                                    </td>
                                </tr>
                        <?php       }
                        } }
                            else{
                                echo "<h1 class='text-center'>the cart is empty</h1>";
                            }
                    
                        ?>
                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex">
                    <?php
                    //   $total_price =0;
                      $ip = getIPAddress();
                      $cart_query = "select *from `cart_info` where ip_address='$ip'";
                      $result = mysqli_query($con, $cart_query);
                      $result_count=mysqli_num_rows($result); 
                      if($result_count>0){
                        echo "<h4 class='px-4'>subtotal:<strong class='text-primary'> $total_price/-</strong></h4>
                        <a class='bg-info border-0 p-2 text-light text-decoration-none' href='index.php'>Continue Shopping</a>
                        <a href='payment.php'class='bg-secondary border-0 p-2 text-light mx-2 text-decoration-none'>Checkout</a>";
                      }
                      else{
                        echo "<a class='bg-info border-0 p-2 text-light text-decoration-none' href='index.php'>Continue Shopping</a>";
                      }
                    ?>
                    
                </div>
            </form>
            <!-- function to remove items -->
         <?php
            function remove_cart_item(){
                global $con;
                if(isset($_POST['remove_cart'])){
                    foreach($_POST['removeitem'] as $remove_id)
                    {
                        echo $remove_id;
                        $delete_query="delete from `cart_info` where product_id=$remove_id";
                        $run_delete=mysqli_query($con,$delete_query);
                        if($run_delete){
                            echo "<script>window.open('cart.php','_self')</script>";
                        }

                    }
                }
            }
            $remove_item=remove_cart_item();
         ?>

        </div>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>