<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="head.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .fa{
            padding: 5px;
            font-size: 30px;
            width: 30px;
            height: 30px;
            text-decoration: none;
            border-radius: 50%;
        }
        .fa:hover{
            opacity: .7;
        }

        .fa-twitter{
            background-color: #55ACEE;
            color: white;
        }
        .fa-facebook{
            background-color: #3b5998;
            color: white;
        }
        .fa-google{
            background-color: #dd4b39;
            color: white;
        }
        .fa-instagram{
            background-color: #125688;
            color: white;
        }
    </style>
</head>
<body>
    
        <header >
            <div class="logo">
            <img src="logo.jpg" alt="Library_logo" height="120" width="200">
            <h1 style="color: white;">LIBRARY MANAGEMENT SYSTEM</h1>
            </div>
            <?php
            if(isset($_SESSION['login_user'])){

            ?>
                <nav>
                    <ul>
                         <li><a href="home.php">HOME</a></li>
                         <li><a href="books.php">BOOKS</a></li>
                         <li><a href="logout.php">LOGOUT</a></li>
                         
                         <li><a href="feedback.php">FEEDBACK</a></li>
                    </ul>
                </nav>
                <?php
            }
            else{
                ?>

                <nav>
                <ul>
                     <li><a href="home.php">HOME</a></li>
                     <li><a href="books.php">BOOKS</a></li>
                     
                     <li><a href="admin.php">ADMIN_LOGIN</a></li>
                     <li><a href="feedback.php">FEEDBACK</a></li>
                </ul>
            </nav>
            <?php
            }
            ?>

            
        </header>
        <section style="background-image: url(library.jpg);">
            <br><br><br><br>
            <div class = "section"><br>
                <h1 style="color: white;">Welcome To Library</h1>
                <h1 style="color: white;">Opens At: 09:00</h1>
                <h1 style="color: white;">Closes At: 17:00</h1>

            </div>
        </section>
        <footer>
            <br><br>
            <h3 style="color: white; text-align: center;">Contact Us:</h3>
            <div style="margin: 0px 570px; text-align: center;">
                <a href="#" class="fa fa-facebook"></a>  
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-google"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
                <br><br>
                <p style="color: white; text-align: center;" >
                    Email : OnlineLibrary@gmail.com <br><br>
                    Mobile No: +918265478595
                </p>



        </footer>
    </div>
    
</body>
</html>