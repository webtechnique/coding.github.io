<?php  include("conect.php");  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">

        <div id="continer">
            <div id="title">
                Registration Form
            </div>
            <div id="form">
                <div id="input_field" >
                    <label>Upload img</label>
                    <input type="file" name="uploadfile" style="width:100%;">
                </div>

            <div id="form">
                <div id="input_field">
                    <label>First Name</label>
                    <input type="text" id="input" name="fname" required>
                </div>
                
                <div id="input_field">
                    <label>Last Name</label>
                    <input type="text" id="input" name="lname"  required>
                </div>
                
                <div id="input_field">
                    <label>Password</label>
                    <input type="password" id="input" name="pass"  required>
                </div>
                
                <div id="input_field">
                    <label>confirm Password</label>
                    <input type="password" id="input" name="conpass"  required>
                </div>
                
                <div id="input_field">
                    <label>Gender</label>
                    <select name="gender"  required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                
                <div id="input_field">
                    <label>Email id</label>
                    <input type="email" id="input" name="email"  required>
                </div>
                
                <div id="input_field">
                    <label>Contact no</label>
                    <input type="int" id="input" name="contact"  required>
                </div>

                <div id="input_field">
                    <label style="margin-right: 80px;">Caste</label>
                    <input type="radio"  name="r1" value="Genral" required><label style="margin-left: 5px;">Genral</label>
                    <input type="radio"  name="r1" value="OBC" required><label style="margin-left: 5px;">OBC</label>
                    <input type="radio"  name="r1" value="SC" required><label style="margin-left: 5px;">SC</label>
                    <input type="radio"  name="r1" value="ST" required><label style="margin-left: 5px;">ST</label>
                </div>

                <div id="input_field">
                    <label style="margin-right: 50px;">Language</label>
                    <input type="checkbox"  name="c1[]" value="Hindi" ><label style="margin-left: 5px;">Hindi</label>
                    <input type="checkbox"  name="c1[]" value="Urdu" ><label style="margin-left: 5px;">Urdu</label>
                    <input type="checkbox"  name="c1[]" value="English"><label style="margin-left: 5px;">English</label>
                    
                </div>
                
                <div id="input_field">
                    <label>Address</label>
                    <textarea id="textarea" name="address"  required></textarea>
                </div>
                
                <div id="input_field_term">
                    <label id="check">
                        <input type="checkbox" id="inpt" name="check"  required>
                        <span id="check_mark"></span>
                    </label>
                    <p>I accpet the terms</p>
                </div>
                
                <div id="input_field">
                    <input type="submit" value="register" id="btn" name="register">
                </div>
                
                
            </div>
        </div>
    </form>
    </body>
    </html>

    <?php 
         if($_POST[ 'register' ] )
        {
            $filename =  $_FILES["uploadfile"]["name"];
            $tempname =  $_FILES["uploadfile"]["tmp_name"];
            $folder = "images/".$filename;
            echo "<img src='$folder' height='100px' widht='100px'>";
            move_uploaded_file($tempname,$folder);

           $fname    = $_POST['fname'];
           $lname    = $_POST['lname'];
           $pass      = $_POST['pass'];
           $conpass = $_POST['conpass'];
           $gender   = $_POST['gender'];
           $email     = $_POST['email'];
           $contact  = $_POST['contact'];
           $caste  = $_POST['r1'];
           $lang  = $_POST['c1'];

           $lang1 = implode(",",$lang);
           $address = $_POST['address'];

        //    if($fname != "" && $lname != "" && $pass != "" &&$conpass != "" &&$gender != "" &&$email != "" &&$contact != "" &&$address != "")
        //    {

           
      
           $query = "INSERT INTO FORM (std_img,fname,lname,password,conpassword,gender,email,contact,caste,lang,address) VALUES('$folder','$fname' ,'$lname' ,'$pass' ,'$conpass' ,'$gender' ,'$email' ,'$contact' ,'$caste','$lang1','$address')";
           $data = mysqli_query($conn,$query);
      
           if($data)
           {
            echo "<script>alert('Records Are Submit')</script>";
           }
       else
           {
            echo "<script>alert('Failed')</script>";
           }
        }
        // else
        // {
        //     echo "<script>alert('Please fill the form');</script>";
        // }
    // }
?>  
    