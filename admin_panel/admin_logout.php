<?php
session_start();
session_reset();
session_destroy();

echo "<script>alert('you are logged out')</script>";
header("Location:./index.php");

?>