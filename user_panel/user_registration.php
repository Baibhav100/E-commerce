<?php
include "../includes/connect.php";
include "../functions/common_function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registeration</title>
    <!-- stylesheet link -->
    <link href="../style.css" rel="stylesheet">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-fluid p-3">
        <h3 class="text-center"><strong>REGISTRATION</strong></h3>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6 p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-2">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control text-center" placeholder="enter the username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-2">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" id="user_email" class="form-control text-center" placeholder="enter the email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- immage -->
                    <div class="form-outline mb-2">
                        <label for="user_image" class="form-label">Image</label>
                        <input type="file" id="user_username" class="form-control text-center" autocomplete="off" required="required" name="user_image">
                    </div>
                    <!-- password -->
                    <div class="form-outline mb-2">
                        <label for="user_password" class="form-label">password</label>
                        <input type="password" id="user_password" class="form-control text-center" placeholder="password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!-- confirm-password -->
                    <div class="form-outline mb-2">
                        <label for="user_conpassword" class="form-label"> Confirm password</label>
                        <input type="password" id="user_password" class="form-control text-center" placeholder="confirm password" autocomplete="off" required="required" name="user_conpassword">
                    </div>
                    <!--address field-->
                    <div class="form-outline mb-2">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control text-center" placeholder="address" autocomplete="off" required="required" name="user_address">
                    </div>
                    <!--contact-->
                    <div class="form-outline mb-2">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control text-center" placeholder="enter your mobile number" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div class=" ">
                        <input type="submit" value="registeration" class="bg-info border-0 py-2 px-3" name="user_register">
                        <p class=" small fw-bold p-2">Already have an account?<a href="user_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_password = $_POST['user_password'];
    //password hash
    $pass=password_hash($user_password,PASSWORD_DEFAULT);
    $user_conpassword = $_POST['user_conpassword'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_ip = getIPAddress();
    //select query
    $select_query="select * from `user_details`where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $count_rows=mysqli_num_rows($result);
    if($count_rows>0){
        echo "<script>alert('user already exists')</script>";
    }
    else{
    // insert the datas into the database
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");
    if($user_password!=$user_conpassword )
    {
        echo "<script>alert('password doesnot match')</script>";
    }
    else{
    $insert_query = "insert into `user_details`(username,user_email,user_password,user_image,user_ip,user_address,user_contact)values('$user_username','$user_email','$pass','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute = mysqli_query($con, $insert_query);
    if ($sql_execute) {
        echo "<script>alert('data is inserted successfully')</script>";
        echo "<script>window.open('user_login.php')</script>";
    } else {
        echo die(mysqli_error($con));
    }
}

    }



    
}


?>