<?php  include("conect.php");  
    session_start();
    $id = $_GET['id'];

$userprofile = $_SESSION['user_name'];

if($userprofile == true)
{

}
else{
    header('location:login.php');
}

    $query = "SELECT * FROM FORM where Id='$id' ";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    $result = mysqli_fetch_assoc($data);

    $lag = $result['lang'];
    $lag1 = explode(",",$lag);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Update</title>
</head>
<body>
    <form action="" method="POST">

        <div id="continer">
            <div id="title">
                Update details
            </div>
            
            <div id="form">
            <div id="input_field" >
                    <label>Upload img</label>
                    <input type="file" name="uploadfile" style="width:100%;">
                </div>
                
                <div id="input_field">
                    <label>First Name</label>
                    <input type="text" value="<?php echo $result['fname']; ?>"id="input" name="fname" required>
                </div>
                
                <div id="input_field">
                    <label>Last Name</label>
                    <input type="text" value="<?php echo $result['lname']; ?>"id="input" name="lname"  required>
                </div>
                
                <div id="input_field">
                    <label>Password</label>
                    <input type="password" value="<?php echo $result['password']; ?>"id="input" name="pass"  required>
                </div>
                
                <div id="input_field">
                    <label>confirm Password</label>
                    <input type="password" value="<?php echo $result['conpassword']; ?>"id="input" name="conpass"  required>
                </div>
                
                <div id="input_field">
                    <label>Gender</label>
                    <select name="gender"  required>
                        <option value="">Select</option>

                        <option value="Male"
                            <?php 
                                if($result['gender'] == 'Male')
                                {
                                    echo "selected";
                                }
                            ?>
                        >
                            Male</option>
                        <option value="Female"
                        <?php 
                                if($result['gender'] == 'Female')
                                {
                                    echo "selected";
                                }
                            ?>
                        >
                            Female</option>
                    </select>
                </div>
                
                <div id="input_field">
                    <label>Email id</label>
                    <input type="email" value="<?php echo $result['email']; ?>"id="input" name="email"  required>
                </div>
                
                <div id="input_field">
                    <label>Contact no</label>
                    <input type="int" value="<?php echo $result['contact']; ?>"id="input" name="contact"  required>
                </div>

                <div id="input_field">
                    <label style="margin-right: 80px;">Caste</label>
                    <input type="radio"  name="r1" value="Genral" required 
                    <?php 
                        if($result['Caste'] == "Genral")
                        {
                            echo "checked";
                        }
                    ?>
                    >
                    <label style="margin-left: 5px;">Genral</label>
                    <input type="radio"  name="r1" value="OBC" required
                    <?php 
                        if($result['Caste'] == "OBC")
                        {
                            echo "checked";
                        }
                    ?>
                    ><label style="margin-left: 5px;">OBC</label>
                    <input type="radio"  name="r1" value="SC" required
                    <?php 
                        if($result['Caste'] == "SC")
                        {
                            echo "checked";
                        }
                    ?>
                    ><label style="margin-left: 5px;">SC</label>
                    <input type="radio"  name="r1" value="ST" required
                    <?php 
                        if($result['Caste'] == "ST")
                        {
                            echo "checked";
                        }
                    ?>
                    ><label style="margin-left: 5px;">ST</label>
                </div>

                <div id="input_field">
                    <label style="margin-right: 50px;">Language</label>
                    <input type="checkbox"  name="c1[]" value="Hindi" 
                    <?php 
                        if(in_array('Hindi', $lag1))
                        {
                            echo "checked";
                        }
                    ?> 
                    >
                    <label style="margin-left: 5px;">Hindi</label>
                    <input type="checkbox"  name="c1[]" value="Urdu" 
                    <?php 
                        if(in_array('Urdu', $lag1))
                        {
                            echo "checked";
                        }
                    ?> 
                    >
                    <label style="margin-left: 5px;">Urdu</label>
                    <input type="checkbox"  name="c1[]" value="English"
                    <?php 
                        if(in_array('English', $lag1))
                        {
                            echo "checked";
                        }
                    ?> 
                    >
                    <label style="margin-left: 5px;">English</label>
                    
                </div>
                
                <div id="input_field">
                    <label>Address</label>
                    <textarea id="textarea" name="address"  required><?php echo $result['address'];?></textarea>
                </div>
                
                <div id="input_field_term">
                    <label id="check">
                        <input type="checkbox" id="inpt" name="check"  required>
                        <span id="check_mark"></span>
                    </label>
                    <p>I accpet the terms</p>
                </div>
                
                <div id="input_field">
                    <input type="submit" value="Update" id="btn" name="update">
                </div>
                
                
            </div>
        </div>
    </form>
    </body>
    </html>

    <?php 
         if($_POST[ 'update' ] )
        {
           $fname    = $_POST['fname'];
           $lname    = $_POST['lname'];
           $pass      = $_POST['pass'];
           $conpass = $_POST['conpass'];
           $gender   = $_POST['gender'];
           $email     = $_POST['email'];
           $contact  = $_POST['contact'];
           $caste  = $_POST['r1'];
           
           $lag  = $_POST['c1'];

           $lang1 = implode(",",$lag);
           $address = $_POST['address'];

        //    if($fname != "" && $lname != "" && $pass != "" &&$conpass != "" &&$gender != "" &&$email != "" &&$contact != "" &&$address != "")
        //    {

           
      
           $query = "INSERT INTO FORM (fname,lname,password,conpassword,gender,email,contact,address) VALUES('$fname' ,'$lname' ,'$pass' ,'$conpass' ,'$gender' ,'$email' ,'$contact' ,'$lang1','$address')";
           
           $query = "UPDATE form set fname='$fname',lname='$lname',password='$pass',conpassword='$conpass',gender='$gender',email='$email',contact='$contact',Caste='$caste',lang='$lang1',address='$address' WHERE id='$id'";
           $data = mysqli_query($conn,$query);
      
           if($data)
           {
               echo "<script>alert('Record updated')</script>";
               ?>

                    <meta http-equiv="refresh" content="0; url =http://localhost/php-project/display.php " />
                <?php     
           }
       else
           {
               echo "Update failed";
           }
        }
        // else
        // {
        //     echo "<script>alert('Please fill the form');</script>";
        // }
    // }
?>  
    