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



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        function send(type) {
            alert(type);
            $('#' + type).append('<input type="hidden" name="type" value="'+type+'" />');
            // $('#' + type).submit;

        }
    </script>
</head>

<body>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        選擇檔案：<input id="file" name="file" type="file" />
        <br />
        <input type="submit" value="上傳檔案" />
    </form>
    <FORM METHOD=POST ACTION="manage_account.php" id="add">

        <p>username</p>
        <input type="text" name="username" id="">
        <p>password</p>
        <input type="text" name="password" id="">
        <p>is admin</p>
        <input type="text" name="admin" id="">
        <button onclick="send('add')">add</button>

    </FORM>
    <!-- <div class="show" style="display:none"> -->
    <div class="show" >
        <table width="700" border="1" align="center">
            <tr>
                <td>name</td>
                <td>password</td>
            </tr>
            <?php
            $sql = "USE account;";
            $data = mysqli_query($con, $sql);
            $sql = "SELECT * FROM `table1`";
            $data = mysqli_query($con, $sql);
            if (!$data) {
                echo mysqli_error($con);
                // exit();

            }
            for ($i = mysqli_num_rows($data); $i >= 1; $i--) {
                $rs = mysqli_fetch_row($data);

            ?>
                <tr>
                    <td><?php echo $rs[0] ?></td>
                    <td><?php echo $rs[1] ?></td>
                    <td><?php echo $rs[2] ?></td>
                </tr>
            <?php
            }
            ?>
    </div>
    <div class="del_account">
        <FORM METHOD=POST ACTION="manage_account.php" id="del">


            <select class="select" name="del_name">

                <?php

                $sql = "USE account;";
                $data = mysqli_query($con, $sql);
                $sql = "SELECT * FROM `table1`";
                $data = mysqli_query($con, $sql);
                if (!$data) {
                    echo mysqli_error($con);
                    // exit();

                }
                for ($i = mysqli_num_rows($data); $i >= 1; $i--) {
                    $rs = mysqli_fetch_row($data);
                ?>

                    <option value="<?php echo $rs[0] ?>"><?php echo $rs[0] ?></option>

                <?php
                }
                ?>
            </select>
            <button onclick="send('del')">del</button>

            </FORM>


    </div>
    　




</body>

</html>