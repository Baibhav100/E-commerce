 <?php
    //including connect file
    // include('./includes/connect.php');
    //display products
    function getproducts()
    {
        global $con;
        // checking
        // if (!isset($_GET['category'])) {

        //     $select_query = "select *from `products` order by rand()";

        // }

        // else{
        //     $select_query = "select *from `products` where `category_id`=".$_GET['category']." order by rand()";

        // }
        if (isset($_GET['category'])) {
            $select_query = "select *from `products` where `category_id`=" . $_GET['category'] . " order by rand()";
        } elseif (isset($_GET['brand'])) {
            $select_query = "select *from `products` where `brand_id`=" . $_GET['brand'] . " order by rand()";
        } else {
            $select_query = "select *from `products` order by rand()";
        }

        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h1 class='text-center text-dark'>no products are available!</h1>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "
                    <div class='col md-4 mb-2'>
                        <div class='card mb-4' style='width: 18rem;'>
                            <img src='./admin_panel/product_images/$product_image1'class='card-img-top 'alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'> price:$product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'> add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                            </div>
                        </div>
                    </div>";
        }
    }




    //displaying brands in sidenav
    function getbrands()
    {
        global $con;
        $select_brands = "select *from `brands`";
        $result_brands = mysqli_query($con, $select_brands);
        while ($row_data = mysqli_fetch_assoc($result_brands)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo "
        <li class='nav-item text-center'>
            <a href='index.php?brand=$brand_id' class='nav-link text-light'>
            $brand_title
            </a>
        </li>";
        }
    }
    // get unique categories
    function getcategories()
    {
        global $con;
        $select_categories = "select *from `categories`";
        $result_categories = mysqli_query($con, $select_categories);
        while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "
        <li class='nav-item text-center'>
            <a href='index.php?category=$category_id' class='nav-link text-light'>
            $category_title
            </a>
        </li>";
        }
    }
    // search
    function getsearch()
    {
        global $con;
        if (isset($_GET['search_data_product'])) {
            $search_data_value = $_GET['search_data'];
            $search_query = "select *from `products` where product_keywords like '%$search_data_value%'";
        }
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h1 class='text-center text-dark'>Opps no products!</h1>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "
                    <div class='col md-4 mb-2'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_panel/product_images/$product_image1'class='card-img-top 'alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'> price:$product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'> add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                            </div>
                        </div>
                    </div>";
        }
    }
    //view details
    function view_details()
    {
        global $con;
        // checking
        // if (!isset($_GET['category'])) {

        //     $select_query = "select *from `products` order by rand()";

        // }

        // else{
        //     $select_query = "select *from `products` where `category_id`=".$_GET['category']." order by rand()";

        // }
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $select_query = "select *from `products` where product_id=$product_id";
        }
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "
                <div class='col-md-4'>
                <!-- card -->
                <div class='card' style='width: 18rem;'>
                    <img src='./admin_panel/product_images/$product_image1' class='card-img-top ' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>price:$product_price/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'> add to cart</a>
                        <a href='index.php?product_id=$product_id' class='btn btn-secondary'>Go Home</a>
                    </div>
                </div>
            </div>
            <div class='col-md-8'>
                <!-- related cards -->
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-light'>Related Products</h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_panel/product_images/$product_image2' class='card-img-top ' alt='$product_title'>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_panel/product_images/$product_image3' class='card-img-top ' alt='$product_title'>
                    </div>
                </div>
            </div>";
        }
    }
    //get ip address

    function getIPAddress()
    {
        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
        $ip = getIPAddress();
        echo 'User Real IP Address - ' . $ip;
    }
    //cart function
    function cart()
    {
        if (isset($_GET['add_to_cart'])) {
            echo "hhh";
            global $con;
            $ip = getIPAddress();
            $get_product_id = $_GET['add_to_cart'];
            $select_query = "select *from `cart_info` where ip_address='$ip' and product_id= $get_product_id";
            $result_query = mysqli_query($con, $select_query);

            $num_of_rows = mysqli_num_rows($result_query);
            if ($num_of_rows > 0) {
                echo "<script>alert('this item is already present in the cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                if (isset($_SESSION['username'])) {
                $insert_query = "insert into `cart_info` values($get_product_id,'$ip',0)";
                $result_query = mysqli_query($con, $insert_query);
                echo "<script>alert('this item is inserted in the cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
                }
                else{
                    echo "<script>alert('first login first!')</script>";
                    echo "<script>window.open('user_panel/user_login.php','_self')</script>";
                }
            }
        }
    }
    //  function to get cart items
    function cart_item()
    {
        if (isset($_GET['add_to_cart'])) {

            global $con;
            $ip = getIPAddress();
            // $get_product_id=$_GET['add_to_cart'];
            $select_query = "select *from `cart_info` where ip_address='$ip'";
            $result_query = mysqli_query($con, $select_query);
            $count_cart_item = mysqli_num_rows($result_query);
        } else {
            global $con;
            $ip = getIPAddress();
            // $get_product_id=$_GET['add_to_cart'];
            $select_query = "select *from `cart_info` where ip_address='$ip'";
            $result_query = mysqli_query($con, $select_query);
            $count_cart_item = mysqli_num_rows($result_query);
        }
        echo " $count_cart_item";
    }
    // total price function
    function total_cost_price()
    {
        global $con;
        $total_price=0;
        $ip=getIPAddress();
        $cart_query="select *from `cart_info` where ip_address='$ip'";
        $result=mysqli_query($con,$cart_query);
        while ($row=mysqli_fetch_array($result)) {
            $product_id=$row['product_id'];
            $select_products="select *from `products` where product_id='$product_id'";
            $result_products=mysqli_query($con,$select_products);
            while ($row_product_price=mysqli_fetch_array($result_products)) {
                $product_price=array($row_product_price['product_price']);
                $product_values=array_sum($product_price);
                $total_price+=$product_values;
            }
        }
        echo $total_price;
    }
//get user order details
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="select * from `user_details` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query))
    {
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders']))
            {
                if(!isset($_GET['delete_account'])){
                    $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_order_query=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_order_query);
                    if($row_count>0)
                    {
                        echo "<h3 class='text-center text-success my-5'>you have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>order details</a></p>";
                    }
                }

            }

        }
    }
}
    ?>