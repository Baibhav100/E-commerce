<?php
if(isset($_POST['delete_products']))
{
    $delete_id=$_POST['delete_products'];
    $delete_query="delete from `products` where product_id= $delete_id";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('successfully deleted the particular product')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }

}
?>