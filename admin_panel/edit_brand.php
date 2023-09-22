<?php 
if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    // echo  $edit_category;
    $get_brands="select * from `brands` where brand_id=$edit_brand";
    $result_query=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result_query);
    $brand_title=$row['brand_title'];
    // echo  $category_title;
}

if(isset($_POST['edit_brand']))
{
$brand_title=$_POST['brand_title'];
$update_query="update `brands` set brand_title='$brand_title' where brand_id=$edit_brand";
$result_query=mysqli_query($con,$update_query);
if($result_query)
{
     echo "<script>alert('brand has been updated successfully')</script>";
     echo"<script>window.open('./index.php?view_brand')</script>";
}
}


?>
<div class="container mt-3">
<h3 class="text-center">edit brand</h3>
<form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="category_title">Brand Title</label>
        <input type="text" name="brand_title" id="brand_title" value="<?php echo $brand_title ?>" class="form-control"required="required">
    </div>
    <input type="submit" name="edit_brand" value="update brand" class="btn btn-info px-3 mb-3">
</form>
</div>