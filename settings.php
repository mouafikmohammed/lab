<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
   # ------------- code for Table --------------------

   $res= mysqli_query($con,"select * from gmail");
   $name="";
   $email="";
   $password="";
   
   if(isset($_POST['name'])){
      $name=$_POST['name'];
   }
   if(isset($_POST['email'])){
      $email=$_POST['email'];
   }
   if(isset($_POST['password'])){
      $password=$_POST['password'];
   }
   #--------add  gmail---------------
   $sqls='';
   if(isset($_POST['add'])){
      $sqls = "INSERT INTO gmail (name,email,password) value('$name','$email','$password')";
      mysqli_query($con,$sqls);
      header("location: settings.php");
   }
   #--------delete gmail---------------
   if(isset($_POST['del'])){
      $sqls= "DELETE from gmail where name='$name' or email='$email'";
      mysqli_query($con,$sqls);
      header("location: settings.php");
   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Business Management</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/settings.css">
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
            <li class="active"><a  href="settings.php"><b>></b> Connect Gmail</a></li>
            <li><a href="other_settings.php"><b>></b> Others</a></li>
         </ul> 
      </div>
      <div class="main_content">
         <div class="header">settings</div>
         <!--add email and password-->
         <form method='post'>
            <aside>
               <div id="buy">
                  <h3>ADD Gmail</h3>
                  <br>
                  <label>Your Full Name: </label><br>
                  <input type="text" name="name" id="name" placeholder="full name" required>
                  <br>
                  <label>Gmail</label><br>
                  <input type="email" name="email" id="email" placeholder="gmail">
                  <br>     
                  <label>Password from <a target="_blank" href="https://myaccount.google.com/apppasswords" id="aform">[App passwords]</a>: </label><br>
                  <input type="password" name="password" id="password" placeholder="password">
                  <br>
                  <?php
                  $a= mysqli_num_rows($res);
                  if($a == 0){
                     echo '<button name="add">ADD</button>';
                  }
                  ?>
                  <button name="del">Delete</button>
               </div>
            </aside>
            <!-------------------------------------------->
            <div class="info">
               <h2>How To Use</h2>
               <div class="paragraph">
                  <dl class="article">
                     <dt><b>Step 1</b></dt>
                        <dd>Go to your <b>Google</b> account here: <a target="_blank" href="https://myaccount.google.com/security">myaccount.google.com/security</a></dd>
                     </dt>
                     <dt><b>Step 2</b></dt>
                        <dd>Turn on <b>[2-Step Verification: on]</b> here: <a target="_blank" href="https://myaccount.google.com/signinoptions/two-step-verification">.../two-step-verification</a></dd>
                     </dt>
                     <dt><b>Step 3</b></dt>
                        <dd>Back now and go to <b>[App passwords]</b> here: <a target="_blank" href="https://myaccount.google.com/apppasswords">.../apppasswords</a></dd>
                        <ul>
                           <li>1- Go to <b>[select app]</b> and chosse other app and give it a name then generate for new password.</li>
                           <li>2- Now put your Gmail and Password <br>
                              <div class="notice"><b>(this password where you took it from [App passwords] not your normal password)</b></div>
                           </li>
                        </ul>
                     </dt>
                     <dt><b>Step 4</b></dt>
                        <dd>Ready to use it, "It only for Google users". We will add more soon.</dd>
                     </dt>
                  </dl>
               </div>
            </div>
            <!-------------------------------------------->
            <main class="tables_buy">
               <table id="tbl">
                  <tr>
                     <th>Full Name</th>
                     <th>Gmail</th>
                     <th>Password</th>
                  </tr>
                  <?php
                     while ($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>NAN</td>";
                        echo "</tr>";
                     }
                  ?>
               </table>
            </main>
         </form>
      </div>
   </div>
</body>
</html>