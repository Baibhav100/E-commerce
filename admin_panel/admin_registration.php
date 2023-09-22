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
                        <label for="admin_name" class="form-label"> name</label>
                        <input type="text" id="user_username" class="form-control text-center" placeholder="enter the name" autocomplete="off" required="required" name="admin_name">
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-2">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="text" id="user_email" class="form-control text-center" placeholder="enter the email" autocomplete="off" required="required" name="admin_email">
                    </div>
                    <!-- password -->
                    <div class="form-outline mb-2">
                        <label for="admin_password" class="form-label">password</label>
                        <input type="password" id="user_password" class="form-control text-center" placeholder="password" autocomplete="off" required="required" name="admin_password">
                    </div>
                    <!-- confirm-password -->
                    <div class="form-outline mb-2">
                        <label for="admin_conpassword" class="form-label"> Confirm password</label>
                        <input type="password" id="user_password" class="form-control text-center" placeholder="confirm password" autocomplete="off" required="required" name="admin_conpassword">
                    </div>
                    <!--address field-->
                    <div class="form-outline mb-2">
                        <label for="admin_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control text-center" placeholder="address" autocomplete="off" required="required" name="admin_address">
                    </div>
                    <!--contact-->
                    <div class="form-outline mb-2">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control text-center" placeholder="enter your mobile number" autocomplete="off" required="required" name="admin_contact">
                    </div>
                    <div class=" ">
                        <input type="submit" value="registeration" class="bg-info border-0 py-2 px-3" name="admin_register">
                        <p class=" small fw-bold p-2">Already have an account?<a href="admin_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['admin_register'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    //password hash
    $pass=password_hash($admin_password,PASSWORD_DEFAULT);
    $admin_conpassword = $_POST['admin_conpassword'];
    $admin_address = $_POST['admin_address'];
    $admin_contact = $_POST['admin_contact'];
    // $user_ip = getIPAddress();
    //select query
    $select_query="select * from `admin_table`where admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $count_rows=mysqli_num_rows($result);
    if($count_rows>0){
        echo "<script>alert('admin already exists')</script>";
    }
    else{
    // insert the datas into the database
    // move_uploaded_file($user_image_tmp, "./user_images/$user_image");
    if($admin_password!=$admin_conpassword )
    {
        echo "<script>alert('password doesnot match')</script>";
    }
    else{
    $insert_query = "insert into `admin_table`(admin_name,admin_email,admin_password,admin_address,admin_contact)values('$admin_name','$admin_email','$pass','$admin_address','$admin_contact')";
    $sql_execute = mysqli_query($con, $insert_query);
    if ($sql_execute) {
        echo "<script>alert('data is inserted successfully')</script>";
        echo "<script>window.open('admin_login.php')</script>";
    } else {
        echo die(mysqli_error($con));
    }
}

    }



    
}


?>