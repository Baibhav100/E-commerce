<?php
include('../includes/connect.php');
if(isset($_POST['insert_product']))
{
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    // accessing the images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    // accessing the temp names
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    //checking
    if($product_title=='' or  $description=='' or  $product_keywords=='' or $product_category=='' or  $product_brands=='' or  $product_price==''
    or  $product_image1=='' or  $product_image2=='' or  $product_image3=='')
    {
        echo "<script>alert('please fill all the available fields')</script>";
        exit();
    }
    else{
        move_uploaded_file($temp_image1,"product_images/$product_image1");
        move_uploaded_file($temp_image2,"product_images/$product_image2");
        move_uploaded_file($temp_image3,"product_images/$product_image3");
        // insert query
        $insert_products="insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values('$product_title','$description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query)
        {
            echo "<script>alert('successfully inserted all the datas')</script>";
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
    <title>insert_products-admin dashboard</title>
      <!-- stylesheet link -->
      <link href="style.css" rel="stylesheet">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
   
    <div class="container mt-5 ">
        <img src="../images/boy.jpg" class="w-50 boy" alt="">
        
        <h1 class="text-center">Insert <i class="fa-brands fa-product-hunt"></i>roducts</h1>
        <!-- form -->
        <form action=""method="post" enctype="multipart/form-data">
            <!-- product title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text"name="product_title"id="product_title"class="form-control"placeholder="enter product title"autocomplete="off"
                required="required">
            </div>
             <!--description -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text"name="description"id="descripion"class="form-control"placeholder="enter product description"autocomplete="off"
                required="required">
            </div>
            <!--keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text"name="product_keywords"id="product_keywords"class="form-control"placeholder="enter product keywords"autocomplete="off"
                required="required">
            </div>
             <!--categories -->
             <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_category" id=""class="form-select">
                <option value="">select a category</option>
                <?php
                $select_query="select *from `categories`";
                $result_query=mysqli_query($con,$select_query); 
                while($row=mysqli_fetch_assoc($result_query))
                {
                    $category_title=$row['category_title'];
                    $category_id=$row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
               </select>
            </div>
              <!--brands -->
              <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_brands" id=""class="form-select">
                <option value="">select a brand</option>
                <?php
                $select_query="select *from `brands`";
                $result_query=mysqli_query($con,$select_query); 
                while($row=mysqli_fetch_assoc($result_query))
                {
                    $brand_title=$row['brand_title'];
                    $brand_id=$row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
               </select>
            </div>
              <!--image1 -->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">product image1</label>
                <input type="file"name="product_image1"id="product_image1"class="form-control"autocomplete="off"
                required="required">
            </div>
             <!--image 2-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">product image2</label>
                <input type="file"name="product_image2"id="product_image2"class="form-control"autocomplete="off"
                required="required">
            </div>
            <!--image 3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">product image3</label>
                <input type="file"name="product_image3"id="product_image3"class="form-control"autocomplete="off"
                required="required">
            </div>
            <!-- price -->
      
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text"name="product_price"id="product_price"class="form-control"autocomplete="off"
                required="required">
            </div>
               <!-- price -->
      
               <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit"name="insert_product" class="btn btn-info"value="insert product">
            </div>
       </form>
       
    </div>
    
</body>
</html>