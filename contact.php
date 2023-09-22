<?php
include('./includes/connect.php');
include('./functions/common_function.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <!-- fontawesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- navbar -->
<nav class="navbar sticky-top bg-white navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid p-0">
            <a class="navbar-brand" href="index.php"><img class="logo" src="images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
        </div>
    </nav>
<!-- navbar end -->
	<div class="container mt-5">

		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h2 class="card-title text-center mb-4">Contact Us</h2>

						<form method="post" action="send_email.php">

							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
							</div>

							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
							</div>

							<div class="form-group">
								<label for="message">Message:</label>
								<textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
							</div>

							<div class="text-center">
								<button type="submit" class="btn btn-primary btn-lg mt-3">Send Message</button>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>

	</div>

</body>
</html>
