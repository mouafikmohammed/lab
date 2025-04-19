<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

# ------------- code for Table --------------------

   $res= mysqli_query($con,"select * from contacts");
   
   

   #----------------contacts----------------------
   #button variable contacts
   $name='';
   $email='';
   $phone='';
   if(isset($_POST['name'])){
      $name=$_POST['name'];
   }
   if(isset($_POST['email'])){
      $email=$_POST['email'];
   }
   if(isset($_POST['phone'])){
      $phone=$_POST['phone'];
   }
   #--------add db contacts----------------------
   $sqls='';
   if(isset($_POST['add'])){
      $sqls = "insert into contacts (name,email,phone) value('$name','$email','$phone')";
      mysqli_query($con,$sqls);
      header("location: contacts.php");
   }

   #--------delete db from contacts---------------
   if(isset($_POST['del'])){
      $sqls= "delete from contacts where name='$name'";
      mysqli_query($con,$sqls);
      header("location: contacts.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Business Management</title>
	<link rel="stylesheet" href="css/contacts.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" type="image/x-icon" href="img/logo.png" />
</head>

<body>
   <div id="background">
      <img src="img/backgroud.jpg" class="stretch" alt="" />
   </div>
   <div class="wrapper">
      <div class="sidebar">
         <!-- <a href="#"><img class="logo" src="img/logo.png"></a> -->
         <ul>
               <li><a  href="search.php"><img class="fas"src="icons/search.svg">Search</a></li>
               <li><a href="index.php"><img class="fas" src="icons/dashboard.svg">DashBoard</a></li>
               <li class="active"><a  href="contacts.php"><img class="fas"src="icons/contacts.svg">Contacts</a></li>
               <li><a  href="note.php"><img class="fas"src="icons/contacts.svg">Notes</a></li>
               <li><a href="purchase.php"><img class="fas"src="icons/buy.svg">Purchase</a></li>
               <li><a href="sells.php"><img class="fas"src="icons/sells.svg">Sells</a></li>
               <li><a href="stock.php"><img class="fas"src="icons/stock.svg">Stock</a></li>
               <li><a href="expired.php"><img class="fas"src="icons/expired.svg">Expired Products</a></li>
               <li><a href="logout.php"><img class="fas"src="icons/logout.svg">Logout</a></li>
         </ul> 
         <div class="our_team">
            <ul>
               <li class="ourteam"><a href="ourteam.php"><img src="icons/team.svg" style="width: 25px; padding-right: 5px;">Our Team</i></a></li>
            </ul>
         </div>
      </div>
      <div class="main_content">
         <div class="header">Contacts</div> 
         <!--Contacts-->
         <div class="contact">
            <h2> Contacts </h2>
            <form method='post'>
               <div class="info">
                   <label>Name</label>
                  <input type="text" name="name" placeholder="name or company name" required>
                  <label> Email </label>
                  <input type="email" name="email" placeholder="email">
                  <label>Phone</label>
                  <input type="text" name="phone" placeholder="phone number">
                  <br>
                  <button name="add">ADD</button>
                  <button name="del">Del</button>
               </div>
            </form>
            <table class="contbl">
               <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
               </tr>
               <?php
                  while ($row = mysqli_fetch_array($res)){
                     echo "<tr>";
                     echo "<td>".$row['name']."</td>";
                     echo "<td>".$row['email']."</td>";
                     echo "<td>".$row['phone']."</td>";
                     echo "</tr>";
                     }
               ?>
            </table>
         </div>
      </div>
</body>
</html>