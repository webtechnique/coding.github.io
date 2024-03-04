<?php 
session_start();
// echo "wellcome".$_SESSION['user_name'];
?>
<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background: #d071f9;
            }
            table{
                background-color: white;
            }
            #update , #delete{
                background-color: green;
                color: white;
                border: 0;
                outline: 0;
                border-radius: 5px;
                height: 23px;
                width: 80px;
                font-weight: bold;
                cursor: pointer;
            }
            #update:hover{
                background-color:#00ff00;
            }
            #delete{
                background-color: red;
            }
            #delete:hover{
                background-color: lightcoral;
            }
            #logout{
    background-color: blue;
    float: right;
    color: white;
    height: 35px;
    width: 100px;
    margin-top: 20px;
    margin-bottom: 10px;
    font-size: 18px;
    border: 0;
    border-radius: 5px;
    cursor: pointer;

}
#logout:hover{
    background-color: dodgerblue;
}


        </style>
    </head>
</html>
<?php 
    include("conect.php");
    error_reporting(0);
$userprofile = $_SESSION['user_name'];

if($userprofile == true)
{

}
else{
    header('location:login.php');
}

    $query = "SELECT * FROM FORM";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    // echo $total;
    
    
    


    if($total !=0)
        {
            ?>
            <h2 align="center"><mark>Displaying All Records</mark></h2>
             <center><table border="1" cellspacing="5" width="100%">
                <tr>
                <th width="3%">Id</th>
                <th width="3%">Image</th>
                <th width="8%">First name</th>
                <th width="8%">Last name</th>
                <th width="5%">Gender</th>
                <th width="18%">Email id.</th>
                <th width="8%">Contact</th>
                <th width="5%">Caste</th>
                <th width="5%">lang</th>
                <th width="10%">Address</th>
                <th width="15%">Operations</th>
                </tr>
                
                <?php 
            while($result = mysqli_fetch_assoc($data))
            {
                echo " <tr>
                         <td>".$result['Id']."</td>
                         
                         <td><img src='".$result['std_img']."' height='100px' width='100px'></td>

                         <td>".$result['fname']."</td>
                         <td>".$result['lname']."</td>
                         <td>".$result['gender']."</td>
                         <td>".$result['email']."</td>
                         <td>".$result['contact']."</td>
                         <td>".$result['Caste']."</td>
                         <td>".$result['lang']."</td>
                         <td>".$result['address']."</td>

                         <td><a href='update_design.php?id=$result[Id]'><input type='submit' value='Update' id='update'></a>
                         
                         <a href='delete.php?id=$result[Id]'><input type='submit' value='Delete' id='delete' onclick = 'return check()'></a></td>
                    </tr>
                ";
            }
        }
        else
        {
            echo "no record founds";
        }
        ?>
        </table></center>
<a href="logout.php"><input type="submit" name="logout" value="Logout" id="logout"></a>
        <script>
            function check()
            {
                return confirm('Are you sure ?');
            }
        </script>

        <!-- echo $result['fname']." ".$result['lname']." ".$result['gender']." ".$result['email']." ".$result['contact']." ".$result['address']."<br>"; -->