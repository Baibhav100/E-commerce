<?php
if(isset($_GET['delete_users']))
{
    $delete_users=$_GET['delete_users'];
    //delete query
    $delete_query="delete from `user_table` where user_id=$delete_users";
    $result=mysqli_query($con,$delete_query);
    if($result)
    {
        echo "<script>alert('the user has been deleted successfully')/script>";
        echo "<script>window.open(./index.php?all_orders)</script>";
    }
    
}
?>