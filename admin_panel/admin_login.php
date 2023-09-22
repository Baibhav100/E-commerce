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
    <title>Login</title>
    <!-- stylesheet link -->
    <link href="style.css" rel="stylesheet">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-fluid p-5">
        <h3 class="text-center"><strong>LOGIN</strong></h3>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6 p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-2">
                        <label for="admin_name" class="form-label">name</label>
                        <input type="text" id="admin_name" class="form-control text-center bg-secondary text-light" placeholder="enter the username" autocomplete="off" required="required" name="admin_name">
                    </div>

                    <!-- password -->
                    <div class="form-outline mb-2">
                        <label for="admin_password" class="form-label">password</label>
                        <input type="password" id="admin_password" class="form-control text-center bg-secondary text-light" placeholder="password" autocomplete="off" required="required" name="admin_password">
                    </div>

                    <div class=" ">
                        <input type="submit" value="Login" class="bg-info border-0 py-2 px-3 mt-2" name="admin_login">
                        <p class=" small fw-bold p-2">Don't have an account?<a href="admin_registration.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php

if (isset($_POST['admin_login'])) {
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];
    $select_query = "select * from `admin_table` where admin_name='" . $admin_name . "'";
    $result = mysqli_query($con, $select_query);
    $row_data = mysqli_fetch_assoc($result);
    $row_count = mysqli_num_rows($result);


    // $user_ip = getIPAddress();

    //cart item
    // $select_query_cart="select * from `cart_details` where ip_address='".$user_ip."'";
    // $select_cart=mysqli_query($con,$select_query_cart);
    // $row_count_cart=mysqli_num_rows($select_cart);
    if ($row_count > 0){
        if (password_verify($admin_password, $row_data['admin_password'])) {


            // echo "<script>alert('Login successful')</script>";
            $_SESSION['admin_name'] = $admin_name;
            echo "<script>alert('Login successful')</script>";
            header("Location:index.php");
        } else {
            echo "<script>alert('invalid credentials')</script>";
        }
    } else {
        echo "<script>alert('invalid credentials')</script>";
    }
}


?>