<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount=$row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment']))
{
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payments` (order_id, invoice_number,amount,payment_mode)values($order_id, $invoice_number, $amount, '$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result) 
    {
        echo "<h3 class='text-center text-light'>successfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="update `user_orders` set order_status='complete' where order_id= $order_id";
    $result_orders=mysqli_query($con,$update_orders);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
       <!-- stylesheet link -->
       <link href="../style.css" rel="stylesheet">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <div class="container-fluild payment p-0">
        <!-- <div class="payment"> -->
            <img src="https://media.istockphoto.com/id/1257791022/photo/close-up-of-girl-hold-bank-card-and-type-on-laptop.jpg?s=612x612&w=0&k=20&c=PR1hKTsr3lu5HVAs2Z82T7pOyx0xgXadNUXwLItYDbA=" alt="">
        <div class="div1">
        <h3 class="text-center text-dark ">CONFIRM PAYMENT</h3>
        <form action="" method="post">
            <div class="form-outline my-5 text-center">
                <input type=""class="form-outline text-center"placeholder="Invoice number"name="invoice_number" 
                value="<?php echo $invoice_number;?>">
            
                
            </div>
            <div class="form-outline mb-5 text-center ">
               
                <input type="text"class="form-outline text-center" placeholder="Amount"name="amount" value="<?php echo $amount;?>">
            </div>
            <div class="form-outline mb-5 text-center ">
                <select name="payment_mode"id="">
                    <option value="">SELECT PAYMENT MODE</option>
                    <option value="<?php echo 'UPI'?>">UPI</option>
                    <option value="<?php echo 'NET BANKING'?>">NET BANKING</option>
                    <option value="<?php echo 'PAYPAL'?>">PAYPAL</option>
                    <option value="<?php echo 'CASH ON DELIVERY'?>">CASH ON DELIVERY</option>
                    <option value=""></option>
                </select>
            </div>
            <div class="form-outline mb-5 text-center ">
                <input type="submit" value="confirm" class="bg-info border-0 p-1"name="confirm_payment">
            </div>
        </form>
        </div>
        <!-- </div> -->
    </div>
    
</body>
</html>