<?php
include "admin_head.php";
include "dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<section class="box"><br>
        
        <div class="register"><br>

        <h1 style="text-align: center;color:white" >Admin Registration Form</h1><br>
     
        <form action="" method="post" >
            <div class ="login">
        <label for="name">Admin Name <span style="color: red;">*</span></label>
        <input class = "form-control" type="text" id="name" name="name" required><br>
        <label for="user">User Name <span style="color: red;">*</span></label>
        <input  class = "form-control"type="text" id="user" name="user" required><br>
        <label for="password">Enter Password <span style="color: red;">*</span></label>
        <input  class = "form-control"type="password" id="password" name="password" required><br>
       
       
        <label for="email">Email ID <span style="color: red;">*</span></label>
        <input  class = "form-control"type="email" id="email" name="email" required><br>
        
        <label for="mob">Mobile No <span style="color: red;">*</span></label>
        <input  class = "form-control"type="text" id="mob" name="mob"><br>
       
        <label for="image">Profile Image</label>
        <input type="file" name="image" id="image"><br>
        
        <input class="btn btn-success" type="submit" value="submit"  name = "submit">
        <input class="btn btn-danger" type="reset" value="reset">

    </div>
        </form>
   
    </div>

</section>
 <?php
     if(isset($_POST['submit']))
     {
        $count = 0;
        $sql = "SELECT user FROM `admin`";
        $result = mysqli_query($db, $sql);
        while($row = mysqli_fetch_assoc($result)){
            if($row['user'] == $_POST['user']){
                $count += 1;
            }
        }
        if($count == 0){
        mysqli_query($db,"insert into `admin` values('','$_POST[name]','$_POST[user]','$_POST[password]','$_POST[email]','$_POST[mob]','user.png'); ");
     
     
     ?>
    <script>
        alert("Registration Successfully Done");
    </script>
    <?php
     }
     else
     {
          ?>
    <script>
        alert(" The Adminname Already Existed.");
    </script>
    <?php
     }
}
    ?>
    

</body>
</html>