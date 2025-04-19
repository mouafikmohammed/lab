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
	<title>Our Team</title>
	<link rel="stylesheet" href="css/ourteam.css">
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
            <li><a  href="index.php"><img class="fas"src="icons/dashboard.svg">DashBoard</a></li>
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
               <li class="ourteam active"><a href="ourteam.php"><img src="icons/team.svg" style="width: 25px; padding-right: 5px;">Our Team</i></a></li>
            </ul>
         </div>
      </div>
      <div class="main_content">
         <div class="header">Our Team</div>
         <div class="container">
            <div class="card">
               <div class="content">
                  <div class="imgBx">
                     <img src="img/med.jpg" alt="Mohammed Mouafk">
                  </div>
                  <div class="contentBx">
                     <h4>Mohammed Mouafik</h4>
                     <h5>Project Manager & <br>Full Stack Developer</h5>
                  </div>
                  <div class="sci">
                     <a href="https://www.linkedin.com/in/mouafik/" target="_blank"><img src="icons/linkedin.svg" class="fa"></a>
                     <a href="mailto:mouafikmohammed03@gmail.com" target="_blank"><img src="icons/mail-64.png" class="fa" ></a>
                     <a href="https://github.com/mouafikmohammed/" target="_blank"><img src="icons/github.svg" class="fa" ></a>
                  </div>
               </div>
            </div>
            <!-- <div class="card">
               <div class="content">
                  <div class="imgBx">
                     <img src="img/ikram.jpg" alt="Ikram">
                  </div>
                  <div class="contentBx">
                     <h4>Ikrame Ajana</h4>
                     <h5>Front-end Developer</h5>
                  </div>
                  <div class="sci">
                     <a href="mailto:ikramajana000@gmail.com" target="_blance"><img src="icons/mail-64.png" class="fa" ></a>
                     <a href="https://github.com/IkrameAjana" target="_blank"><img src="icons/github.svg" class="fa" ></a>
                  </div>
               </div>
            </div> -->
            <!-- <div class="card">
               <div class="content">
                  <div class="imgBx">
                     <img src="img/saad.jpg" alt="saad">
                  </div>
                  <div class="contentBx">
                     <h4>Saad Fathallah</h4>
                     <h5>Front-end Developer</h5>
                  </div>
                  <div class="sci">
                     <a target="_blank" href="https://www.linkedin.com/in/saad-fathallah-a9b16019a/"><img src="icons/linkedin.svg" class="fa"></a>
                     <a target="_blank" href="mailto:saadfathallah506@gmail.com"><img src="icons/mail-64.png" class="fa" ></a>
                     <a target="_blank" href="https://github.com/kkevinho"><img src="icons/github.svg" class="fa" ></a>
                  </div>
               </div>
            </div> -->
         </div>
      </div>
</body>
</html>