<?php
if(isset($_GET['delete_payments']))
{
    $delete_payments=$_GET['delete_payments'];
    //delete query
    $delete_query="delete from `user_payments` where payment_id=$delete_payments";
    $result=mysqli_query($con,$delete_query);
    if($result)
    {
        echo "<script>alert('payment record has been deleted successfully')/script>";
        echo "<script>window.open(./index.php?all_payments)</script>";
    }
    
}
?>