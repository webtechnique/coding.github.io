<?php
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>File Upload</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadfile"><br><br>
        <input type="submit" name="submit" value="Upload File">
    </form>
</body>
</html>
<?php 
    // print_r($_FILES["uploadfile"]);
    $filename =  $_FILES["uploadfile"]["name"];
    $tempname =  $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    echo "<img src='$folder' height='100px' widht='100px'>";
    if(move_uploaded_file($tempname,$folder))
    {
      echo "<script>alert('image uploded')</script>";
    }
    

    
?>
<img src="images/" height="100px" width="100px">