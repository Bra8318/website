<?php
include "admin_head.php";
include "dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Book Request</title>
<style>
              body {
                background-color: grey;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 190px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
        .search {
            padding-left: 80%;
           
        }
        .list{
            background-color: white;
        }
        .img-circle{
            margin-left:30px;
        }
        .h:hover{
            color: white;
            width: 300px;
            height: 50;
            background-color: #00544c; 
        }
        .container{
            height:400px;
            width: 600px;
            background-color: black;
            opacity: .8;
        }
        .scroll{
            width: 100%;
            height: 300px;
            overflow: auto;
        }
       
    </style>
</head>
<body>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style = "color:white ;margin-left:50px;font-size:20px;">
    <?php 
    if(isset($_SESSION['login_user']))
      {  echo "<img class='img-circle profile_img' height = 50 width=50
            src = 'image/".$_SESSION['pic']."'>";
        echo "</br></br>";
        echo "Welcome ".$_SESSION['login_user'];
        echo "</br>";}
    ?>
   </div><br><br>
 
   <div class="h"><a href="add.php">Add Books</a></div>
 <div class="h"><a href="request.php">Book Request</a></div>
 <div class="h"><a href="issue_info.php">Issue Information</a> </div> 
 <div class="h"><a href="expired.php">Expired List</a> </div>
  
  
</div>

<div id="main">
 
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
         
  
    
    <?php
    if(isset($_SESSION['login_user'])){
        ?>
        <form method="post">
         <button type="submit" name="submit1" class="btn btn-success">Returned</button>&nbsp;&nbsp;&nbsp;
         <button type="submit" name="submit2" class="btn btn-danger">Expired</button>
         </form>
        <div class="search">
        <form method="post" class = "navbar-form">
            <input type="text" name="user" class="form-control" placeholder="UserName" required><br><br>
            <input type="text" name="bid" class="form-control" placeholder="BID" required><br><br>
            <button type="submit" name = "submit" class = "btn btn-success">
                submit
            </button>
        </form>

  </div>
        <?php
        if(isset($_POST['submit'])){
            $var1 = '<p style="color:yellow; background-color:green;">Returned</p>';
            mysqli_query($db,"UPDATE `issue_book` SET `approve` = '$var1' where
                user = '$_POST[user]' and bid = '$_POST[bid]';");
            mysqli_query($db,"UPDATE books SET quantity = quantity+1 
              WHERE bid = '$_POST[bid]'");
        }
    }
    ?>

  <h3 style="text-align:center;">Expired Books List</h3> <br><br>
  
  <?php
    if(isset($_SESSION['login_user'])){
        $expire = '<p style="color:yellow; background-color:red;">EXPIRED</p>';
        $return = '<p style="color:yellow; background-color:green;">Returned</p>';

        if(isset($_POST['submit1'])){
          $sql = "SELECT student.user,roll_no,books.bid,books.name,books.author,books.edition
        ,approve,issue,issue_book.return From student
         inner join issue_book ON student.user = issue_book.user
         inner join books on issue_book.bid = books.bid where issue_book.approve = '$return'
         ORDER BY `issue_book`.`return` DESC";
        $result = mysqli_query($db,$sql);
        }

        else if(isset($_POST['submit2'])){
          $sql = "SELECT student.user,roll_no,books.bid,books.name,books.author,books.edition
        ,approve,issue,issue_book.return From student
         inner join issue_book ON student.user = issue_book.user
         inner join books on issue_book.bid = books.bid where issue_book.approve = '$expire'
         ORDER BY `issue_book`.`return` DESC";
          $result = mysqli_query($db,$sql);
        }
        else{
          $sql = "SELECT student.user,roll_no,books.bid,books.name,books.author,books.edition
          ,approve,issue,issue_book.return From student
           inner join issue_book ON student.user = issue_book.user
           inner join books on issue_book.bid = books.bid where issue_book.approve != ''
           and issue_book.approve != 'yes'
           ORDER BY `issue_book`.`return` DESC"; 
          $result = mysqli_query($db,$sql);   
        }
        
        
         echo "<div class='scroll'>";
          echo "<table class = 'table table-bordered' >";
         
          echo "<tr style = 'background-color:white'>";
              echo "<th>"; echo "Student Username"; echo "</th>";
              echo "<th>"; echo "Roll No"; echo "</th>";
              echo "<th>"; echo "BID"; echo "</th>";
              echo "<th>"; echo "Book Name"; echo "</th>";
              echo "<th>"; echo "Author Name"; echo "</th>";
              echo "<th>"; echo "Edition"; echo "</th>";
              echo "<th>"; echo "Status"; echo "</th>";
              echo "<th>"; echo "Issue Date"; echo "</th>";
              echo "<th>"; echo "Return Date"; echo "</th>";
           
          echo " </tr>";

          
        
          while($row = mysqli_fetch_assoc($result)){
          
              echo "<tr>";
              echo "<td>"; echo $row['user']; echo "</td>";
              echo "<td>"; echo $row['roll_no']; echo "</td>";
              echo "<td>"; echo $row['bid']; echo "</td>";
              echo "<td>"; echo $row['name']; echo "</td>";
              echo "<td>"; echo $row['author']; echo "</td>";
              echo "<td>"; echo $row['edition']; echo "</td>";
              echo "<td>"; echo $row['approve']; echo "</td>";
              echo "<td>"; echo $row['issue']; echo "</td>";
              echo "<td>"; echo $row['return']; echo "</td>";

             
              echo "</tr>";
              }
             
              echo "</table>";
              echo "</div>";
          }
          else{
            ?>
            <script>
                <h3 style="text-align:center;">Login to see Expired List</h3> 
            </script>
            <?php
          }

    
  ?>

  </div>
</div>
</body>
</html>