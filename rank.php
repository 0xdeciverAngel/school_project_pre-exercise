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
$sql = "USE account;";
$data = mysqli_query($con, $sql);



$sql="select name from file_path order by ballot DESC";
$data = mysqli_query($con, $sql);
if (!$data) {
    echo mysqli_error($con);
    // exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rank</title>
</head>
<body>
<?php
        $num=1;
        for ($i = mysqli_num_rows($data); $i >= 1; $i--) {
            $rs = mysqli_fetch_row($data);

        ?>
            <p><?php echo $num ?></p>
            <img src="fileup/<?php echo $rs[0] ?>" width="25%">
            <!-- <input type="text" class="score" id="pic<?php echo $i ?>"name="<?php echo $rs[0] ?>"> -->
           

        <?php
        $num++;
        }
        ?>
</body>
</html>