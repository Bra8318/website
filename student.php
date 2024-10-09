<?php
include "admin_head.php";
include "dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .serach {
            padding-left: 1000px;
           
        }
        .list{
            background-color: white;
        }
    </style>
</head>
<body>

   <div class = "search">
        <form method="post" class = "navbar-form">
            <input type="text" name="search" placeholder="Search Student..">
            <button type="submit" name = "submit" class = "btn btn-default">
                <span class = "glyphicon glyphicon-search"></span>
            </button>
        </form>
    </div>
  


   
    <h2>List of Students</h2>
    <?php
    if(isset($_POST['submit'])){
        $query = mysqli_query($db,"SELECT roll_no,name,email,mob,address,course,dob FROM `student` WHERE name like '%$_POST[search]%' ");
        if(mysqli_num_rows($query)==0){
            echo "Sorry! no books found.Try again";
        }
        else{
        echo "<table class = 'table table-bordered table-hover' >";
        echo "<tr style = 'background-color:white'>";
            echo "<th>"; echo "Roll No"; echo "</th>";
            echo "<th>"; echo "Name"; echo "</th>";
            echo "<th>"; echo "Email"; echo "</th>";
            echo "<th>"; echo "Contact"; echo "</th>";
            echo "<th>"; echo "Adress"; echo "</th>";
            echo "<th>"; echo "Course"; echo "</th>";
            echo "<th>"; echo "DOB"; echo "</th>";
        echo " </tr>";

        while($row = mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td>"; echo $row['roll_no']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['email']; echo "</td>";
            echo "<td>"; echo $row['mob']; echo "</td>";
            echo "<td>"; echo $row['address']; echo "</td>";
            echo "<td>"; echo $row['course']; echo "</td>";
            echo "<td>"; echo $row['dob']; echo "</td>";
            echo "</tr>";
            }
            echo "</table>";


        }
    }

    else{

    $result = mysqli_query($db,"SELECT roll_no,name,email,mob,address,course,dob FROM `student`  ;");
    echo "<table class = 'table table-bordered table-hover'>";
    echo "<tr style = 'background-color:white'>";
        echo "<th>"; echo "Roll No"; echo "</th>";
        echo "<th>"; echo "Name"; echo "</th>";
        echo "<th>"; echo "Email"; echo "</th>";
        echo "<th>"; echo "Contact"; echo "</th>";
        echo "<th>"; echo "Adress"; echo "</th>";
        echo "<th>"; echo "Course"; echo "</th>";
        echo "<th>"; echo "DOB"; echo "</th>";
    echo " </tr>";

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
            echo "<td>"; echo $row['roll_no']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['email']; echo "</td>";
            echo "<td>"; echo $row['mob']; echo "</td>";
            echo "<td>"; echo $row['address']; echo "</td>";
            echo "<td>"; echo $row['course']; echo "</td>";
            echo "<td>"; echo $row['dob']; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

}   
    ?>
    
</body>
</html>