<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <!-- stylesheet link -->
  <link href="style.css" rel="stylesheet">
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- php code to access the user id -->
  <?php
  $user_ip = getIPAddress();
  // echo $user_ip;
  $get_user = "select * from `user_details` where user_ip='$user_ip'";
  $result = mysqli_query($con,$get_user);
  $run_query = mysqli_fetch_array($result);
  $user_id = $run_query['user_id'];
  ?>
  <!-- first child -->
  <nav class="navbar sticky-top bg-white navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid p-0">
      <a class="navbar-brand" href="#"><img class="logo" src="images/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php">PRODUCTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="user_panel/user_registration.php">REGISTER</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-dark" href="contact.php">CONTACT</a>
          </li>




        </ul>
        <form class="d-flex" action="search_product.php" method="get" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
          <input type="submit" value="search" class="btn btn-ouline-primary" name="search_data_product">
        </form>
      </div>
    </div>
  </nav>
  <!-- second child -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">

      <?php
      // echo $_SESSION['username'];
      if (isset($_SESSION['username'])) {
        echo " <li class='nav-item'>
                <a class='nav-link' href='user_panel/profile.php'>Welcome " . $_SESSION['username'] . "</a>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' href='user_panel/logout.php'>Logout</a>
            </li>
            ";
      } else {
        echo " <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome guest</a>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' href='user_panel/user_login.php'>Login</a>
            </li>";
      }
      ?>

    </ul>
  </nav>
  <div class="container">
    <h1 class="text-center" style="color:black;">payment options</h1>
    <div class="row d-flex mt-4">
      <div class="col-md-6">
        <img style="width:100%;" src="images/payment.png" alt="">
      </div>
      <div class="col-md-6 text-center">
        <a href="order.php?user_id=<?php echo $user_id ?>">
          <h2>pay offline</h2>
        </a>
      </div>
    </div>
  </div>
  </div>
</body>

</html>