<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from `user_details` where username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $user_username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_contact'];

    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $user_username=$_POST['username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_contact'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp'];
        move_uploaded_file($user_image_tmp,"user_images/$user_image");

        //update query
        $update_data="update `user_details` set username='$user_username', user_email='$user_email', user_image='$user_image', user_address='$user_address', user_contact='$user_mobile' where user_id='$update_id'";
        $update_data_query=mysqli_query($con,$update_data);
        if($update_data_query){
            echo "<script>alert('datas updated successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";

        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit account</title>
</head>
<body>
    <h3 class="text-center text-success my-2">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
    <input type="text" class="form-control m-auto w-50"name="user_username" value="<?php echo $user_username ?>">
    </div>
    <div class="form-outline mb-4">
    <input type="email" class="form-control m-auto w-50"name="user_email"value="<?php echo $user_email ?>">
    </div>
    <div class="form-outline mb-4">
    <input type="file" class="form-control m-auto w-50"name="user_image">
    </div>
    <div class="form-outline mb-4">
    <input type="text" class="form-control m-auto w-50"name="user_address"value="<?php echo $user_address?>">
    </div>
    <div class="form-outline mb-4">
    <input type="text" class="form-control m-auto w-50"name="user_mobile"value="<?php echo $user_mobile ?>">
    </div>
    <div class="form-outline mb-4">
    <input type="submit" value="update"class="bg-info py-2 px-3 border-0"name="user_update">
    </div>

    </form>
</body>
</html>