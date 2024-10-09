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
    <style>
        .comment{
            margin: 10px;
        }
       .form-control {
            height: 70px;
            width: 60%;
        }
        .scroll{
            width: 100%;
            height: 350px;
            overflow:auto;
        }
    </style>
</head>
<body style="background-color: grey;">
    <div class="comment">
    <h3>If you have any suggestion or questions please comment below..</h3>
    <form method="post">
        <input class="form-control"  type="text" name="comment" placeholder="Write something"><br>
        <input type="submit" name="submit" value="comment" ><br><br>
    </form>
   
    <div class="scroll">
        <?php
        if(isset($_POST['submit'])){
            $sql = "INSERT INTO `feedback` VALUES('','Admin','$_POST[comment]');";
            if(mysqli_query($db,$sql)){
                $query = "SELECT * FROM `feedback` ORDER BY `feedback`.`id` DESC";
                $result = mysqli_query($db,$query) ;
                echo "<table class = 'table table-bordered'>";
                while($row = mysqli_fetch_assoc($result))  {
                    echo "<tr>";
                    echo "<td>";  echo $row['user']; echo "</td>";
                    echo "<td>";  echo $row['comment']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        else{
            
             $query = "SELECT * FROM `feedback` ORDER BY `feedback`.`id` DESC";
                $result = mysqli_query($db,$query) ;
                echo "<table class = 'table table-bordered'>";
                while($row = mysqli_fetch_assoc($result))  {
                    echo "<tr>";
                    echo "<td>";  echo $row['user']; echo "</td>";
                    echo "<td>";  echo $row['comment']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                
        }
        ?>
    </div>
    </div>
</body>
</html>