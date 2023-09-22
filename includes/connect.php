    <?php
$con=mysqli_connect('localhost:3306','root','','store');
if(!$con)
{
    die(mysqli_error($con));
}
else{
    // echo "connected";
}

?>