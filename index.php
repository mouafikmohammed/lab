<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

   $spac = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Business Management</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/dashboard.css">
   <link rel="icon" type="image/x-icon" href="img/logo.png" />
   <script src="js/location.js"></script>
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
               <li class="active"><a  href="index.php"><img class="fas"src="icons/dashboard.svg">DashBoard</a></li>
               <li><a href="contacts.php"><img class="fas"src="icons/contacts.svg">Contacts</a></li>
               <li><a  href="note.php"><img class="fas"src="icons/contacts.svg">Notes</a></li>
               <li><a href="purchase.php"><img class="fas"src="icons/buy.svg">Purchase</a></li>
               <li><a href="sells.php"><img class="fas"src="icons/sells.svg">Sells</a></li>
               <li><a href="sold.php"><img class="fas"src="icons/sells.svg">Sold</a></li>
               <li><a href="stock.php"><img class="fas"src="icons/stock.svg">Stock</a></li>
               <li><a href="expired.php"><img class="fas"src="icons/expired.svg">Expired Products</a></li>
               <li><a href="logout.php"><img class="fas"src="icons/logout.svg">Logout</a></li>
         </ul> 
         <div class="our_team">
            <ul>
               <li class="ourteam"><a href="ourteam.php"><img src="icons/team.svg">Our Team</i></a></li>
            </ul>
         </div>
      </div>
      <div class="main_content">
         <div class="header">DashBoard</div>
         <!------------------------------------------------------->
         <!--this div for weather-->
         <!-- <div class="weatherWidget"></div>  -->
         <!--write here the Dashboard code-->
         <main>
				<div class="cards" >

					<a href="sells.php">
                  <div class="card-single">
                     <img src="icons/sells.svg" width="30" height="30">
                     <div>
                        <?php
                           require 'connection.php';
                           $query = "SELECT * FROM sells";  
                           $query_run = mysqli_query($con, $query);
                           $row_num = mysqli_num_rows($query_run);
                           $row1 = mysqli_fetch_array($query_run);
                           # ----
                           if($row_num > 0){
                              $a = $row1['price']*$row1['quantity'];
                              $b = 0;
                              while($row1 = mysqli_fetch_array($query_run)){
                                 $b += $row1['price']*$row1['quantity'];}
                              $c = $a + $b;
                              echo '<h4> total sales: '.$c.'$</h4>';
                           }else{
                              echo '<h4> total sales: NAN</h4>';
                           }
                        ?>
                        <small>sales</small>
                        <br><br>
                     </div>
                     <div>
                        <span class="fa fa-shopping-cart"></span>
                     </div>
                  </div>
               </a>
               
               <a href="stock.php">
                  <div class="card-single">
                     <img src="icons/stock.svg" width="30" height="30">
                     <div>
                        <?php
                           require 'connection.php';
                           $query = "SELECT quantity  FROM purchase ORDER BY quantity";  
                           $query_run = mysqli_query($con, $query);
                           $row = mysqli_num_rows($query_run);
                           echo '<h4> total in stock: '.$row.'</h4>';
                        ?>
                        <small>Stock</small>
                        <br><br>
                     </div>
                     <div>
                        <span class="fa fa-newspaper-o"></span>
                     </div>
                  </div>
               </a>

					<a href="purchase.php">
                  <div class="card-single">
                     <img src="icons/buy.svg" width="30" height="30">
                     <div>
                        <?php
                           require 'connection.php';
                           $query = "SELECT * FROM purchase";
                           $query_run = mysqli_query($con, $query);
                           $rowp_num = mysqli_num_rows($query_run);
                           $rowp = mysqli_fetch_array($query_run);
                           # ----
                           if($rowp_num > 0){
                              $ap = $rowp['price']*$rowp['quantity'];
                              $bp = 0;
                              while($rowp = mysqli_fetch_array($query_run)){
                                 $bp += $rowp['price']*$rowp['quantity'];}
                              $cp = $ap + $bp;
                              echo '<h4> total purchases: '.$cp.'$</h4>';
                           }else{
                              echo '<h4> total purchases: NAN</h4>';
                           }
                        ?>
                        <small>purchase</small>
                        <br><br>
                     </div>
                     <div>
                        <span class="fa fa-newspaper-o"></span>
                     </div>
                  </div>
               </a>

					<a href="expired.php">
                  <div class="card-single">
                     <img src="icons/expired.svg" width="30" height="30">
                     <div>
                        <?php
                           require 'connection.php';

                           $expcon = mysqli_query($con,"select * from expired");
                           if(mysqli_num_rows($expcon) > 0){
                              $rowexp = mysqli_fetch_array($expcon);
                              $time = $rowexp['expired'];
                           }else{
                              $time = 10000;
                           }
                           $exp_date= date("Y-m-d",strtotime('-'.$time.' day'));
                           $query = "SELECT * FROM purchase WHERE DATE BETWEEN '2000-07-02' and '$exp_date'";


                           $query_run = mysqli_query($con, $query);
                           $rowe = mysqli_num_rows($query_run);
                           echo '<h4>Expired Products: '.$rowe.'</h4>';
                        ?>
                        <small>expired</small>
                     </div>
                     <br><br><br>
                     <div>
                        <span class="fa fa-newspaper-o"></span>
                     </div>
                  </div>
               </a>


               <a href="note.php">
                  <div class="card-single">
                     <img src="img/notes.png" width="30">
                     <div>
                        <?php
                           require 'connection.php';
                           $query = "SELECT * FROM notes";  
                           $query_run = mysqli_query($con, $query);
                           $rown = mysqli_num_rows($query_run);
                           echo '<h4>My Notes: '.$rown.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>';
                        ?>
                        <small>notes</small>
                     </div>
                     <div>
                        <span class="fa fa-newspaper-o"></span>
                     </div>
                  </div>
               </a>

               <a href="contacts.php">
                  <div class="card-single">
                     <img src="icons/contacts.svg" width="30" height="30">
                     <div>
                        <?php
                           require 'connection.php';
                           $query = "SELECT * FROM contacts";  
                           $query_run = mysqli_query($con, $query);
                           $rowc = mysqli_num_rows($query_run);
                           echo '<h4>My Contacts: '.$rowc.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>';
                        ?>
                        <small>contacts</small>
                     </div>
                     <div>
                        <span class="fa fa-newspaper-o"></span>
                     </div>
                  </div>
               </a>

               <a href="pdfpage.php">
                  <div class="card-single">
                     <img src="img/pdf.png" width="30" height="30">
                     <div>
                        <h4>PDF printer<?php echo $spac;?></h4>
                        <small>print</small>
                     </div>
                     <div>
                        <span class="fa fa-shopping-cart"></span>
                     </div>
                  </div>
               </a>

               <a href="settings.php">
                  <div class="card-single">
                     <img src="img/setting.png" width="30" height="30">
                     <div>
                        <h4>Settings<?php echo $spac;?></h4>
                        <small>settings</small>
                     </div>
                     <div>
                        <span class="fa fa-shopping-cart"></span>
                     </div>
                  </div>
               </a>

               <a href="emails.php">
                  <div class="card-single">
                     <img src="img/email.png" width="30" height="30">
                     <div>
                        <h4>Send Email<?php echo $spac;?></h4>
                        <small>send email</small>
                     </div>
                     <div>
                        <span class="fa fa-shopping-cart"></span>
                     </div>
                  </div>
               </a>

               <a href="trash.php">
                  <div class="card-single">
                     <img src="icons/delete.svg" width="30" height="30">
                     <div>
                        <h4>Trash Data<?php echo $spac;?></h4>
                        <small>trash</small>
                     </div>
                     <div>
                        <span class="fa fa-shopping-cart"></span>
                     </div>
                  </div>
               </a>
				</div>
			</main>
      </div>
</body>
</html>
