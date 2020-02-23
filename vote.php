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
echo "<br>";

mysqli_query($con, "SET NAMES 'utf8'");
mysqli_set_charset($con, "utf8");
$sql = "USE account;";
$data = mysqli_query($con, $sql);

foreach ($_POST as $k => $v) {
    // 點和空白換變成底線
    // $k="006bTJzcgy1g9pli21vtuj335e4q4kjp_jpg";
    // $k=str_replace("."," ",$k);
    
    $k=str_replace("_",".",$k);
    // echo $k;
    // $k="'".$k."'";
    $sql = "SELECT `ballot` FROM `file_path` WHERE `name`='$k'";
    // echo $sql.'<br>';
    $data = mysqli_query($con, $sql);
    if (!$data) {
        echo mysqli_error($con);
        // exit();

    }
    $rs = mysqli_fetch_row($data);
    // echo var_dump($rs);
    $nums= $rs[0];
    // echo $v;
    // $nums= $rs[1];
    $nums=$nums+$v;
    $sql = "UPDATE `file_path`SET `ballot`={$nums} WHERE `name`='{$k}'";
    // echo $sql.'<br>';
    $data = mysqli_query($con, $sql);
    if (!$data) {
        echo mysqli_error($con);
        // exit();

    }



    // echo $_POST[$k];
    // echo $k . '<br>';
    // echo [$v];
}



// if (!$data) {
//     echo mysqli_error($con);
//     // exit();

// }
// for ($i = mysqli_num_rows($data); $i >= 1; $i--) {
//     $rs = mysqli_fetch_row($data);
//     echo $rs[0];
//     echo $rs[1];
// }
?>

<!-- $sql="UPDATE Store_Information SET Sales = 500 WHERE Store_Name = 'Los Angeles' AND Txn_Date = 'Jan-08-1999';";


} -->