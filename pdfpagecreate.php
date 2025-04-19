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
   <link rel="stylesheet" href="css/pdfpagecreate.css">
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
            <li><a  href="pdfpage.php"><b>></b> Purchase PDF</a></li>
            <li><a href="pdfpagesell.php"><b>></b> Sells PDF</a></li>
            <li  class="active"><a  href="pdfpagecreate.php"><b>></b> Create PDF</a></li>
            <li><a  href="#"><b>></b> Contract PDF</a></li>
         </ul> 
      </div>
      <div class="main_content">
         <div class="header"> PDF printer </div>
         <!------------------------------->
         <br>
         <form method='post' action="create_pdf.php">
            <div class="enter">            
               <input type="text" name="0" placeholder="enter 0" required>
               <input type="text" name="1" placeholder="enter 1" required>
               <input type="text" name="2" placeholder="enter 2" required>
               <input type="text" name="3" placeholder="enter 3" required>
               <input type="text" name="4" placeholder="enter 4" required>
               <input type="text" name="5" placeholder="enter 5" required>
               <input type="text" name="6" placeholder="enter 6" required>
               <input type="text" id="inputs" name="7" placeholder="Reference 7" required>
               <input type="text" id="inputs" name="8" placeholder="Name 8" required>
               <input type="number" id="inputs" name="9" placeholder="Quantity 9" min="0" required>
               <input type="number" id="inputs" name="10" placeholder="Price 10" min="0" required>
               <button type="submit" name="send">Print New PDF</button>
            </div>
            <div class="example para">
               <h2>How To Use it:</h2>
               <p>Each input has same number in the picture below, for example at input {0} the text will be in {0} on <b>PDF</b></p>
            </div>
            <img src="img/example.jpg" class="example" alt="picture">
         </form>
      </div>
   </div>
</body>
</html>