    <title>File_Upload</title>
     <meta http-equiv="content-type" charset="UTF-8"/>


     <h1>檔案上傳</h1>



 <?php
    $ip="127.0.0.1";
    $acco="root";
    $pass="";
    $con=mysqli_connect($ip,$acco,$pass,"");

   if(@$_FILES['file']['error']>0){
       echo "檔案上傳失敗";
    }
    else
    {
    
        echo $_FILES['file']['error'];
        echo "<br>";
        echo $_FILES['file']['name'];
        echo "<br>";
        echo $_FILES['file']['type'];
        echo "<br>";
        echo $_FILES['file']['size'];
        echo "<br>";
        echo $_FILES["file"]["tmp_name"];
        $path=$_SERVER['DOCUMENT_ROOT']."/fileup/";
        echo "<BR>".$path;
        if(!file_exists($path))
        {
          mkdir($path,0777);
        }

 	    move_uploaded_file(@$_FILES['file']['tmp_name'], 'fileup/'.@$_FILES['file']['name']); 
        echo "類型：".@$_FILES['file']['type']."<br />大小：".@$_FILES['file']['size']."<br />";
        
        
        $sql = "USE account";
        $data=mysqli_query($con,$sql);
        
        // $sql="INSERT INTO `file_path` (`name`, `path`, `ballot`, `size`) VALUES ('$_FILES['file']['name']', '$path', 0, $_FILES['file']['size'])";
        $sql="INSERT INTO file_path (`name`, `path`,`ballot`,`size`) VALUES ('{$_FILES['file']['name']}', '{$path}',0,{$_FILES['file']['size']})";
        echo $sql;
        $result = mysqli_query($con,$sql);
    }
?>