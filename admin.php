<?php
$ip="127.0.0.1";
$acco="root";
$pass="";
$con=mysqli_connect($ip,$acco,$pass,"");
if($con)
{
    echo"ok\n";
}
else
{
    echo"error\n";
}

mysqli_query( $con, "SET NAMES 'utf8'");
mysqli_set_charset($con, "utf8");

$username =$_POST['username'];
$password = $_POST['password'];

echo $username;
echo "\n";
echo $password;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>
<body>


</body>
</html>



