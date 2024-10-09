<?php
include "admin_head.php";
include "dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="student.css">
  
</head>
<body>
<section class="box"><br>
        <br>
        <div class = "login"><br>
            <h1 style="text-align: center; color: white;">Admin Login Form</h1><br>
            <form action="" method="post">
                <div class="form">
                    <input class = "form-control" type="text" name="user" placeholder="Username" required><br>
                    <input class = "form-control" type="password" name="password" placeholder="Enter password" required><br>
                    <button class="btn btn-success" type="submit" name = "submit">Login</button>
                </div>
            </form><br><br> 
            <p style="color: white; padding-left: 30px;" >
               <a href="password.php">Forget Password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp
                New User <a href="admin_registration.php">Sign Up?</a>
                
            </p>
        </div>
    </section>
	 <?php
    if(isset($_POST['submit'])){
        $count = 0;
        $result = mysqli_query($db,"SELECT * FROM `admin` WHERE user = '$_POST[user]' && password = '$_POST[password]';");
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows( $result );

        if($count == 0){
            ?>
            <!-- <script>
                alert ("The Username And Password Doesn't Match.");
            </script>-->
            <div class = "alert alert-danger" style = "width:700px; margin-left:300px; background-color:grey">
               <strong>The Username And Password Doesn't Match.</strong> 
            </div>
            <?php
        }
        else{
            
            $_SESSION['login_user'] = $_POST['user'];
            $_SESSION['pic'] = $row['pic'];
            ?>
            <script>
                window.location = "home.php";
            </script>
            <?php
        }
    }
    ?>

</body>
</html>