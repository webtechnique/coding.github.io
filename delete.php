<?php
     include("conect.php");

     $id = $_GET['id'];
     $query = "DELETE FROM form WHERE Id='$id' ";
     $data = mysqli_query($conn,$query);

     if($data)
     {
        echo "<script>alert('Record deleted')</script>";
        ?>

<meta http-equiv="refresh" content="0; url =http://localhost/php-project/display.php " />

        <?php

     }
     else{
        echo "<script>alert('Failed to delete')</script>";
     }
?>