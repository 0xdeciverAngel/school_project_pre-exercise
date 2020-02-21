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

$username = $_POST['username'];
$password = $_POST['password'];

echo $username;
echo "\n";
echo $password;

$sql = "USE account";
$data = mysqli_query($con, $sql);

$sql = "select * from table1 where name = '$username' and password='$password'"; //檢測資料庫是否有對應的username和password的sql
$result = mysqli_query($con, $sql);

$rows = mysqli_num_rows($result);
$rs = mysqli_fetch_row($result);

if ($rows) {
    echo "correct";
} else {
    echo mysqli_error($con);
    echo "使用者名稱或密碼錯誤";
    echo "";
}
$is_admin = $rs[2];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form id="admin_form" action="admin.php" method="post">
        <?php
        foreach ($_POST as $a => $b) {
            echo '<input type="hidden" name="' . htmlentities($a) . '" value="' . htmlentities($b) . '">';
        }
        ?>
    </form>
    <form id="user_form" action="user.php" method="post">
        <?php
        foreach ($_POST as $a => $b) {
            echo '<input type="hidden" name="' . htmlentities($a) . '" value="' . htmlentities($b) . '">';
        }
        ?>
    </form>
    <script type="text/javascript">
        var is_admin = "<?php print($is_admin); ?>";
        if (is_admin == '1') {
            document.getElementById('admin_form').submit();
        }
        if (is_admin == '0') {
            document.getElementById('user_form').submit();
        }
    </script>


</body>

</html>