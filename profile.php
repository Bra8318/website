<?php
include "dbconnect.php";
include "admin_head.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        .wrapper{
            width:500px;
            margin: 0 auto;
            color: white;
        }
    </style>
</head>
<body style="background-color:#004528; ">
    <div class="container">
         <form method="post">
            <button class="btn btn-default" style="float: right; width:80px;" type="submit" name="submit">Edit</button>
         </form>
         <div class="wrapper">
            <?php
            if(isset($_POST['submit'])){
                  ?>
                  <script>
                     window.location = "edit.php";

                  </script>
                  <?php
            }
            $query = mysqli_query($db,"SELECT * FROM admin where user = '$_SESSION[login_user]';");

            ?>
            <h2 style="text-align:center;">My Profile</h2>
            <?php
            $row = mysqli_fetch_assoc($query);
               echo "<div style='text-align:center'>
               <img class='img-circle profile_image' height=110 width =120
                src = 'image/".$_SESSION['pic']."'></div>";
               
            ?>
            <div style='text-align:center'><b> Welcome.</b>
            <h4>
            <?php
            echo $_SESSION['login_user'];
            ?>
            </h4>
            </div>
            <?php
              echo "<table class= 'table table-bordered'>";
		
		 echo "<tr>";
                   echo "<td>";
                          echo "<b> Id.: </b>";
                   echo "</td>";
            
                   echo "<td>";
                      echo $row['id'];
                   echo "</td>";
                echo "</tr>";
                  
                echo "<tr>";
                  echo "<td>";
                     echo "<b> Name: </b>";
                  echo "</td>";
              
                  echo "<td>";
                     echo $row['admin'];
                  echo "</td>";
               echo "</tr>";



            echo "<tr>";
            echo "<td>";
               echo "<b> Email: </b>";
            echo "</td>";
        
            echo "<td>";
               echo $row['email'];
            echo "</td>";
         echo "</tr>";
            echo "</tr>";

        echo "<tr>";
            echo "<td>";
               echo "<b> Contact No.: </b>";
            echo "</td>";
        
            echo "<td>";
               echo $row['contact'];
            echo "</td>";
         echo "</tr>";

         

                
              echo "</table>";
            ?>
           </div>
    </div>

</body>
</html>