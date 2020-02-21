<?php
$ip = "127.0.0.1";
$acco = "root";
$pass = "";
$con = mysqli_connect($ip, $acco, $pass, "");
if ($con) {
    echo "ok\n";
} else {
    echo "error\n";
}

mysqli_query($con, "SET NAMES 'utf8'");
mysqli_set_charset($con, "utf8");
$type = $_POST['type'];
echo $type;


if ($type == "add") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin = $_POST['admin'];
    
    $sql = "USE account;";
    $data = mysqli_query($con, $sql);
    $sql = "INSERT INTO `table1` (`name`, `password`, `admin`) VALUES ('{$username}', '{$password}', '{$admin}')";
    $data = mysqli_query($con, $sql);
    echo $sql;

}
if ($type == "del") {
    $del_name = $_POST['del_name'];

    $sql = "USE account;";
    $data = mysqli_query($con, $sql);
    $sql = "DELETE FROM `table1` WHERE name='{$del_name}'";
    $data = mysqli_query($con, $sql);
    echo $sql;

}
