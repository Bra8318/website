<?php
include "dbconnect.php";
include "admin_head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body{
            height: 650px;
	    backgroung-color:grey;
        }
        .wrapper{
            width:400px;
            height:400px;
            margin: 100px auto;
            background: #000;
            opacity: .7;
            color:white;
            padding: 25px;
        }

    </style>
</head>
<body>
   <div class="wrapper">
        <div>
        <h1 style="text-align: center; color: white;">Change Your Password.</h1><br>

        </div>
        <form method="post">
            <input class="form-control" type="text" name="user" placeholder="Username" required><br>
            <input class="form-control" type="email" name="email" placeholder="Email" required><br>
            <input  class="form-control" type="text" name="password" placeholder="New Password" required><br>
            <button class="btn btn-default" type="submit" name="submit">Update</button>
        </form>
   </div>
<?php
    if(isset($_POST['submit'])){
        if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]'
         WHERE user = '$_POST[user]' AND email = '$_POST[email]';"))
         {
            ?>
 		<script>
                alert ("Password updated successfully .");
            </script>
            
            <?php
         }

    }
?>
</body>
</html>