<h3 class="text-center text-success">All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-secondary text-light">
        <?php
        $get_orders="select * from `user_orders`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);
        
        echo" <tr>
        <th>Slno.</th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Total products</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>";
    if($row_count==0)
    {
        echo "<h2 class='bg-danger text-center mt-5'>No orders yet</h2>";
    }
    else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $amount_due=$row_data['amount_due'];
            $invoice_number=$row_data['invoice_number'];
            $total_products=$row_data['total_products'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='./index.php?delete_orders=<?php echo $order_id?>' class='text-dark' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }
    }
        ?>
       
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a class="text-light text-decoration-none"href="./index.php?all_orders">No</a></button>
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_orders=<?php echo $order_id?>"class=" text-decoration-none text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>
    </tbody>
</table>