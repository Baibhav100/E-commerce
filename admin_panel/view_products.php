<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View products</title>
    <style>
        .product_img {
            width: 10%;
        }
    </style>
</head>

<body>
    <h3 class="text-center">View Products</h3>
    <table class="table table-bordered mt-5">
        <thead class="text-center bg-secondary text-light">
            <tr>
                <th>Product Id </th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

        </thead>
        <tbody class="text-center">
            <?php
            $get_products = "select * from `products`";
            $result = mysqli_query($con, $get_products);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
            ?>
                <tr>
                    <td><?php echo $product_id; ?></td>
                    <td><?php echo $product_title; ?></td>
                    <td><img class='product_img' src='./product_images/<?php echo $product_image; ?>'></td>
                    <td><?php echo $product_price; ?></td>
                    <td>
                        <?php
                        $get_count = "select * from `order_pending` where product_id=$product_id";
                        $result_count = mysqli_query($con, $get_count);
                        $rows_count = mysqli_num_rows($result_count);
                        echo $rows_count;
                        ?>
                    </td>
                    <td><?php echo $status; ?></td>
                    <td><a href='./index.php?edit_products=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='./index.php?delete_products=<?php echo $product_id ?>' class='text-dark'button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
                </tr>
            <?php
            }


            ?>

        </tbody>
    </table>
<!-- 
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>  -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a  class="text-light text-decoration-none"href="./index.php?view_products">No</a></button>
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_products=<?php echo $product_id?>"class=" text-decoration-none text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>
</body>

</html>