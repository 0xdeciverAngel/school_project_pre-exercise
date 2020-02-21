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

$sql="select name,path from file_path order by ballot DESC"


?>

