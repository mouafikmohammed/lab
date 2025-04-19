<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

# ------------------------------------------
$res = mysqli_query($con,"SELECT * FROM ptrash");
$sells = mysqli_query($con,"SELECT * FROM strash");

#-------- delete db from trash and put it in purchase table---------------
if(isset($_GET['id'])){
   $id = $_GET['id'];
   $sql1 = "INSERT INTO purchase SELECT * FROM ptrash WHERE id='$id'";
   mysqli_query($con,$sql1);
   if(true){
      $sqls= "DELETE from ptrash where id='$id'";
      mysqli_query($con,$sqls);
   }
   header("location: trash.php");
}

#-------- delete db from sold-trash and purchase-trash or restore them to sells  and purchase table---------------
if(isset($_GET['id'])){
   $id = $_GET['id'];
   $sql1 = "INSERT INTO sells SELECT * FROM strash WHERE id='$id'";
   mysqli_query($con,$sql1);
   if(true){
      $sqls= "DELETE from strash where id='$id'";
      mysqli_query($con,$sqls);
   }
   header("location: trash.php");

}
     # sell-trash
if(isset($_GET['idsell'])){
   $idsell = $_GET['idsell'];
   $sqls= "DELETE from strash where id='$idsell'";
   mysqli_query($con,$sqls);
   header("location: trash.php");
}
    # purchase-trash
if(isset($_GET['refe'])){
   $ref = $_GET['refe'];
   $sqls= "DELETE from ptrash where reference='$ref'";
   mysqli_query($con,$sqls);
   header("location: trash.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Business Management</title>
   <link rel="stylesheet" href="css/trash.css">
   <link rel="icon" type="image/x-icon" href="img/logo.png" />
</head>
<body>
   <h1> <a href="index.php">back to DashBoard</a> </h1><br>
   <h2>Trash <a href="purchase.php">Purchase</a></h2>
   <table id="tbl">
      <thead>
         <tr>
            <th>Reference</th>
            <th>Name</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Restore</th>
            <th>Remove</th>
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
               echo "<td><a id='btn' href='trash.php?id=".$row['id']."'>Restore</a></td>";
               echo "<td><a id='btn' href='trash.php?refe=".$row['reference']."'>delete forever</a></td>";
               echo "</tr>";
            }
         ?>
      </tbody>
   </table>
   <h2>Trash <a href="sold.php">sold</a></h2>
   <table id="tbl">
      <thead>
         <tr>
            <th>Reference</th>
            <th>Name</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Restore</th>
            <th>Remove</th>
         </tr>
      </thead>
      <tbody>
         <?php
            while ($srow = mysqli_fetch_array($sells)){
               echo "<tr>";
               echo "<td>".$srow['reference']."</td>";
               echo "<td>".$srow['name']."</td>";
               echo "<td>".$srow['companyname']."</td>";
               echo "<td>".$srow['email']."</td>";
               echo "<td>".$srow['quantity']."</td>";
               echo "<td>".$srow['price']."</td>";
               echo "<td><a id='btn' href='trash.php?id=".$srow['id']."'>Restore</a></td>";
               echo "<td><a id='btn' href='trash.php?idsell=".$srow['id']."'>delete forever</a></td>";
               echo "</tr>";
            }
         ?>
      </tbody>
   </table>
</body>
</html>