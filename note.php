<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

# ------------- code for Table --------------------
   $res= mysqli_query($con,"select * from notes");
   

   #----------------contacts----------------------
   #button variable contacts
   $subject='';
   $note='';
   if(isset($_POST['subject'])){
      $subject=$_POST['subject'];
   }
   if(isset($_POST['note'])){
      $note=$_POST['note'];
   }
   #--------add db notes----------------------
   $sqls='';
   if(isset($_POST['add'])){
      $sqls = "insert into notes (subject,note) value('$subject','$note')";
      mysqli_query($con,$sqls);
      header("location: note.php");
   }

   #--------delete db from notes---------------
   if(isset($_POST['del'])){
      $sqls= "delete from notes where subject='$subject'";
      mysqli_query($con,$sqls);
      header("location: note.php");
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
               <li><a  href="contacts.php"><img class="fas"src="icons/contacts.svg">Contacts</a></li>
               <li class="active"><a  href="note.php"><img class="fas"src="icons/contacts.svg">Notes</a></li>
               <li><a href="purchase.php"><img class="fas"src="icons/buy.svg">Purchase</a></li>
               <li><a href="sells.php"><img class="fas"src="icons/sells.svg">Sells</a></li>
               <li><a href="sold.php"><img class="fas"src="icons/sells.svg">Sold</a></li>
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
         <div class="header">Notes</div>
            <!-- Notes -->
            <div class="note">
               <h2>Notes</h2>
               <form method='post'>
                  <div class="note-box">
                     <label>Subject</label>
                     <input type="text" name="subject" placeholder="enter name..." required>
                     <label class="labelnote">The note</label>
                     <textarea  rows="4"  name ="note" placeholder="note..."></textarea>
                     <br>
                     <button name="add">ADD</button>
                     <button name="del">Del</button>
                  </div>
               </form>
               <table class="content-table">
                  <tr>
                     <th class="th1">Subject</th>
                     <th>The note</th>
                  </tr>
                  <?php
                     while ($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row['subject']."</td>";
                        echo "<td>".$row['note']."</td>";
                        echo "</tr>";
                     }
                  ?>
               </table>
            </div>
      </div>
</body>
</html>