<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Login</title>

</head>
<body>
    <div id="box">
        <h1>Login</h1>
            <form action="" method="POST" autocomplete="off">

                <!-- <label>User name</label> -->
                <div id="form">
                    
                    <input type="text" id="inpt" name="us_name" placeholder="User name" required>
                    <input type="text" id="inpt" name="us_pass"  placeholder="password">
                    <div id="forgot"><a href="#" id="link" onclick="message()">Forget password ?</a></div>
                    <input type="submit" id="login_btn" name="login" value="Login">
                    <div id="sin_up">New member ? <a href="form.php" id="link">Sign up</a></div>
                    
                </div>
                
                
            </div>
        </form>

    <script>
        function message(){
            alert("!! Remember Your Password !!");
        }
    </script>
</body>
</html>

<?php
    include("conect.php");
    session_start();
    if(isset($_POST['login']))
    {
        $username = $_POST['us_name'];
        $pwd = $_POST['us_pass'];

        $query = "SELECT * FROM form WHERE email='$username' && password='$pwd'  ";
        $data = mysqli_query($conn,$query);
        $total = mysqli_num_rows($data);
        // echo $total;

        if($total ==1)
        {
            // echo "Login ok";
            $_SESSION['user_name'] = $username;
            header('location:display.php');

        }
        else
        {
            echo "Login failed";
        }
    }
?>