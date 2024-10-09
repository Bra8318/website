<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    
    <!-- <link rel="stylesheet" href="student.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   
</head>
<body>
    <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                 <img src="logo.jpg" alt="Library_logo" height="120" width="200">
                 <h1 style="color: white;">LIBRARY MANAGEMENT SYSTEM</h1>
            </div>
        
            
                <ul class="nav navbar-nav">
                     <li><a href="home.php">HOME</a></li>
                     <li><a href="Books.php">BOOKS</a></li>
                     <li><a href="feedback.php">FEEDBACK</a></li>

                </ul>
                <?php
                if(isset($_SESSION['login_user'])){?>
                     <ul class="nav navbar-nav">
                        <li><a href="profile.php">PROFILE</a></li>
                    </ul>
                     <ul class="nav navbar-nav">
                        <li><a href="student.php">STUDENT-INFO</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="profile.php">
                    <div style = "color:white">
                        <?php 
                        echo "<img class='img-circle profile_img' height = 50 width=50
                        src = 'image/".$_SESSION['pic']."'>";

                        echo " ".$_SESSION['login_user'];
                        ?>
                    </div>
                    </a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                   
                    </ul>
                   <?php
                   
                }
                else{
                    ?>
                    <ul class="nav navbar-nav navbar-right">

                    <li><a href="admin.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                    <li><a href="admin_registration.php"><span class="glyphicon glyphicon-user"> SIGN_UP</span></a></li>
                    </ul>
                    <?php
                }?>
                
                     
                  
               
            
        </div>
    </nav>
</body>
</html>