<?php
if(isset($_GET['delete_brand']))
{
    $delete_category=$_GET['delete_category'];
    //delete query
    $delete_query="delete from `categories` where category_id=$delete_category";
    $result=mysqli_query($con,$delete_query);
    if($result)
    {
        echo "<script>alert('category has been deleted successfully')/script>";
        echo "<script>window.open(./index.php?view_category)</script>";
    }
    
}
?>