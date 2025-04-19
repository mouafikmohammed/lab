<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Business Management</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/stock.css">
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
            <li><a  href="index.php"><img class="fas"src="icons/back.svg">Go Back</a></li>
            <li class="active"><a  href="pdfpage.php"><b>></b> Purchase PDF</a></li>
            <li><a href="pdfpagesell.php"><b>></b> Sells PDF</a></li>
            <li><a  href="pdfpagecreate.php"><b>></b> Create PDF</a></li>
         </ul> 
      </div>
      <div class="main_content">
         <div class="header"> PDF printer </div>
         <!------------------------------->
         <br>
         <form class="form-pdfpage" method='post' action="purchase_pdf.php">
            <label class="label-table">Choose : </label>
            <select name="id">
               <?php
                  $res= mysqli_query($con,"select * from purchase");
                  while ($row = mysqli_fetch_array($res)){
                     echo '<option value="'.$row['id'].'">'.$row['reference'].'--- '.$row['name'].'</option>';
                  }
               ?>
            </select>
            <button type="submit" name="send">print</button>
         </form>
         <br>
         <table>
            <tr> 
                  <th>Reference</th>
                  <th>Name</th>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>total Price</th>
            </tr>
            <?php
               $resf = mysqli_query($con,"select * from purchase");
               while ($rowf = mysqli_fetch_array($resf)){
                     echo "<tr>";
                     echo "<td>".$rowf['reference']."</td>";
                     echo "<td>".$rowf['name']."</td>";
                     echo "<td>".$rowf['companyname']."</td>";
                     echo "<td>".$rowf['email']."</td>";
                     echo "<td>".$rowf['quantity']."</td>";
                     echo "<td>".$rowf['price']."</td>";
                     echo "<td>".$rowf['price']*$rowf['quantity']."</td>";
                     echo "</tr>";
                     }
            ?>
         </table>
      </div>
   </div>
</body>
</html>