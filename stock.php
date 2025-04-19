<?php 
   session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

   # ------------- code for Table --------------------
   $res= mysqli_query($con,"select * from purchase");
   #-------- delete db from purchase---------------
   if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql1 = "INSERT INTO ptrash SELECT * FROM purchase WHERE id='$id'";
      mysqli_query($con,$sql1);
      if(true){
         $sqls= "DELETE from purchase where id='$id'";
         mysqli_query($con,$sqls);
      }
      header("location: stock.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Business Management</title>
	<link rel="stylesheet" href="css/stock.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" type="image/x-icon" href="img/logo.png" />
   <!-- <link> -->
   <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css" rel="stylesheet">

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
               <li><a  href="index.php"><img class="fas"src="icons/dashboard.svg">DashBoard</a></li>
               <li><a href="contacts.php"><img class="fas"src="icons/contacts.svg">Contacts</a></li>
               <li><a  href="note.php"><img class="fas"src="icons/contacts.svg">Notes</a></li>
               <li><a href="purchase.php"><img class="fas"src="icons/buy.svg">Purchase</a></li>
               <li><a href="sells.php"><img class="fas"src="icons/sells.svg">Sells</a></li>
               <li><a href="sold.php"><img class="fas"src="icons/sells.svg">Sold</a></li>
               <li class="active"><a href="stock.php"><img class="fas"src="icons/stock.svg">Stock</a></li>
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
         <div class="header">Stock</div>
         <br>
         <div class="container">
            <form method='post'>
               <table class="table">
                  <thead>
                     <tr> 
                        <th>Reference</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>total Price</th>
                        <th> </th>
                     </tr>
                  </thead>
                  <tbody>
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
                           echo "<td><a id='btn' href='stock.php?id=".$row['id']."'>Del</a></td>";
                           echo "</tr>";
                           }
                     ?>
                  </tbody>
               </table>
            </form>
         </div>
      </div>  
   </div>
   <!-- ----------------------links and JQuery -->
   <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
   <script>
      $(document).ready( function () {
         $('.table').DataTable();
      } );
   </script>
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
</body>
</html>
