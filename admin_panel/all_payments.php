<h3 class="text-center text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-secondary text-light">
        <?php
        $get_payments="select * from `user_payments`";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);

        
        echo" <tr>
        <th>Slno.</th>
        <th>Invoice Number</th>
        <th>amount</th>
        <th>payment mode</th>
        <th>date</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>";
    if($row_count==0)
    {
        echo "<h2 class='bg-danger text-center mt-5'>No payments received yet</h2>";
    }
    else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_id=$row_data['payment_id'];
            $amount=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $payment_mode=$row_data['payment_mode'];
            $date=$row_data['date'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>
            <td><a href='./index.php?delete_payments=<?php echo $payment_id?>' class='text-dark' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a class="text-light text-decoration-none"href="./index.php?all_payments">No</a></button>
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_payments=<?php echo $payment_id?>"class=" text-decoration-none text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>
       
  
      
    </tbody>
</table>