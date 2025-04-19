
<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

   # ------------- code for Table -------------------- 
   $expcon = mysqli_query($con,"select * from expired");
   if(mysqli_num_rows($expcon) > 0){
      $rowexp = mysqli_fetch_array($expcon);
      $time = $rowexp['expired'];
   }else{
      $time = 10000;
   }
   $exp_date= date("Y-m-d",strtotime('-'.$time.' day'));
   
   $res= mysqli_query($con,"select * from purchase where date between '2000-07-02' and '$exp_date' ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Business Management</title>
	<link rel="stylesheet" href="css/expiredpage.css">
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
            <li><a href="search.php"><img class="fas"src="icons/search.svg">Search</a></li>
            <li><a href="index.php"><img class="fas"src="icons/dashboard.svg">DashBoard</a></li>
            <li><a href="contacts.php"><img class="fas"src="icons/contacts.svg">Contacts</a></li>
            <li><a  href="note.php"><img class="fas"src="icons/contacts.svg">Notes</a></li>
            <li><a href="purchase.php"><img class="fas"src="icons/buy.svg">Purchase</a></li>
            <li><a href="sells.php"><img class="fas"src="icons/sells.svg">Sells</a></li>
            <li><a href="sold.php"><img class="fas"src="icons/sells.svg">Sold</a></li>
            <li><a href="stock.php"><img class="fas"src="icons/stock.svg">Stock</a></li>
            <li class="active"><a href="expired.php"><img class="fas"src="icons/expired.svg">Expired Products</a></li>
            <li><a href="logout.php"><img class="fas"src="icons/logout.svg">Logout</a></li>
         </ul> 
         <div class="our_team">
            <ul>
               <li class="ourteam"><a href="ourteam.php"><img src="icons/team.svg" style="width: 25px; padding-right: 5px;">Our Team</i></a></li>
            </ul>
         </div>
      </div>
      <div class="main_content">
         <div class="header">Expired
         </div>
         <form method='post' id="table"> 
            <table>
               <tr> 
                  <th>Reference</th>
                  <th>Name</th>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>total Price</th>
                  <th>Date</th>
               </tr>
               <?php
                     while ($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row['reference']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['companyname']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['quantity']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td>".$row['price']*$row['quantity']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "</tr>";
                     }
                  ?>
            </table>
         </form>
      </div>
   </div>
</body>
</html>
