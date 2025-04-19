<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);


# ------------- code add to sell --------------------

   $reference='';
   $name='';
   $quantity='';
   $price="";
   $companyname='';
   $email='';
   if(isset($_POST['reference'])){
      $reference=$_POST['reference'];
   }
   if(isset($_POST['name'])){
      $name=$_POST['name'];
   }
   if(isset($_POST['quantity'])){
      $quantity=$_POST['quantity'];
   }
   if(isset($_POST['price'])){
      $price=$_POST['price'];
   }
   if(isset($_POST['companyname'])){
      $companyname=$_POST['companyname'];
   }
   if(isset($_POST['email'])){
      $email=$_POST['email'];
   }

   #--------add db purchase table ---------------
   $sqls='';
   if(isset($_POST['add'])){
      $sqls = "insert into sells (reference,name,quantity,price,companyname,email) value('$reference','$name','$quantity','$price','$companyname','$email')";
      mysqli_query($con,$sqls);
      header("location: sells.php");
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Business Management</title>
	<link rel="stylesheet" href="css/sell.css">
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
            <li class="active"><a href="sells.php"><img class="fas"src="icons/sells.svg">Sell</a></li>
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
         <div class="header">Sells</div>
         <form method='post'>
            <table class="table class" style="color:white;">
               <thead>
                  <tr> 
                     <th>Reference</th>
                     <th>Name</th>
                     <th>Quantity</th>
                     <th>Price</th>
                     <th> </th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $p_res = mysqli_query($con,"select * from purchase");
                     while ($p_row = mysqli_fetch_array($p_res)){
                        echo "<tr>";
                        echo "<td>".$p_row['reference']."</td>";
                        echo "<td>".$p_row['name']."</td>";
                        echo "<td>".$p_row['quantity']."</td>";
                        echo "<td>".$p_row['price']."</td>";
                        echo "<td><a href='sells.php?id2=".$p_row['id']."' style='color:blue;'>Select for Sell</a></td>";
                        echo "</tr>";
                        }
                  ?>
               </tbody>
            </table>
            <?php
               if(isset($_GET['id2'])){
                  $id2 = $_GET['id2'];
                  $pres =  mysqli_query($con,"SELECT * FROM purchase WHERE id=$id2");
                  $prow = mysqli_fetch_array($pres);
            ?>
            <div class="infos">
               <label>Reference:</label>
               <input type="text" name="reference" value="<?=$prow['reference']?>">
               <label>Product Name:</label>
               <input type="text" name="name" value="<?=$prow['name']?>"> <br><br>
               <label>Company name or name of the buyer:</label>
               <input type="text" name="companyname" placeholder="company Name">         
               <label>Email of the buyer:</label>
               <input type="email" name="email" placeholder="enter email..." > <br><br>
               <label>Quantity:</label>
               <input type="number" name="quantity" placeholder="quantity..." min="1" max="<?=$prow['quantity']?>" required>
               <label>Price:</label>
               <input type="number" name="price" min="1" placeholder="price..." >
               <button name="add">ADD</button>
               <!-- <button name="del">Del</button> -->
            </div> 
            <?php }
               if(isset($_POST['add'])){
                  $p_qty = $prow['quantity'];
                  $s_qty = $_POST['quantity'];
                  if($p_qty == $s_qty){
                     $sqls1= "DELETE FROM purchase where id=$id2 ";
                     mysqli_query($con,$sqls1);
                  }else if($p_qty > $s_qty){
                     $new_qty = $p_qty - $s_qty;
                     $sqls2= "UPDATE purchase SET quantity=$new_qty where id=$id2 ";
                     mysqli_query($con,$sqls2);
                  }
               }
            ?>
         </form>
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




<!-- this old input form
<div class="infos">
   <label>Reference:</label>
   <input type="text" name="reference" placeholder="reference" required>
   <label>Product Name:</label>
   <input type="text" name="name" placeholder="product name"> <br><br>
   <label>Company Name:</label>
   <input type="text" name="companyname" placeholder="company Name">         
   <label>Email:</label>
   <input type="email" name="email" placeholder="enter email..." > <br><br>
   <label>Quantity:</label>
   <input type="number" name="quantity" placeholder="quantity..." min="1">
   <label>Price:</label>
   <input type="number" name="price" min="1" placeholder="price..." >

   <button name="add">ADD</button>
   <button name="del">Del</button>
</div> 
-->