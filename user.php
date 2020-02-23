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

$sql = "USE account;";
$data = mysqli_query($con, $sql);
$sql = "SELECT `name` FROM `file_path`";
$data = mysqli_query($con, $sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <!-- <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <!-- <script type="text/javascript">
        var json_data = {};

        function send() {
            var score = $(".score");
            var num = $(".score").length;
            var i;
            for (i = 0; i < num; i++) {
                
                json_data["'" + score[i].name + "'"] = $("#"+i).val;

            }
            alert(json_data);
        }
    </script> -->
</head>

<body>
    <FORM METHOD=POST ACTION="vote.php">

        <?php
        for ($i = mysqli_num_rows($data); $i >= 1; $i--) {
            $rs = mysqli_fetch_row($data);

        ?>
            <img src="fileup/<?php echo $rs[0] ?>" width="25%">
            <!-- <input type="text" class="score" id="pic<?php echo $i ?>"name="<?php echo $rs[0] ?>"> -->
            <select class="score" name="<?php echo $rs[0] ?>">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

        <?php
        }
        ?>


        <button onclick="send()">summit</button>

        <!-- <input type="hidden" name="" id=""> -->
        </FORM">

</body>

</html>