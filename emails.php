<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

   #---------------------------------------
   $res= mysqli_query($con,"select * from gmail");
   $row = mysqli_fetch_array($res);
   $rowcounter = mysqli_num_rows($res);
   $success =    '<div class="ale"> Status : Connected with your Gmail</div>';
   $notcuccess = '<div class="ale-not"> Status : Not connecte, Go to <b><a href="settings.php">Setting</a></b></div>';
  

if(isset($_POST['send'])){
   require_once 'mail.php';
   $mail->setFrom($row['email'],$row['name']);
   $mail->addAddress($_POST['email']);
   //$mail->addCC('');
   $mail->Subject = $_POST['subject'];
   $mail->Body    = $_POST['message'];
   $mail->send();
   header("Location: emails.php", true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/email.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <link rel="icon" type="image/x-icon" href="img/logo.png" />
   <title>Business Management</title>
</head>
<body>
   <div id="background">
      <img src="img/backgroud.jpg" class="stretch" alt="" />
   </div>
   <div class="wrapper">
      <div class="main_content">
         <div class="header"> <a href="index.php"><img src="icons/back.svg" class="svg-email"><b> E-mail</b></a></div>

         <!-- Email form ------------------->
         <div class="contact">
            <h2> Send Email </h2>
            <form method='post' class="row g-3">
               <?php
                  if($rowcounter > 0){
                     echo $success;
                  }else { echo $notcuccess; }
               ?>
               <div class="col-md-8">
                  <label for="email" class="form-label">E-mail</label>
                  <input type="email" class="form-control" id="email" name="email" required>
               </div>
               <div class="col-md-8">
                  <label for="subject" class="form-label">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" required>
               </div>
               <div class="col-md-12">
                  <label for="message" class="form-label">Message</label>
                  <textarea class="form-control" id="comments" name="message" rows="3" required></textarea>
               </div>
               <div class="col-md-12">
                  <button type="submit" name="send" class="btn btn-primary">Send Email</button>
               </div>
            </form>
         </div>
         <!-- info Email  ------------------->
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
                        <li>2- Now go to <a href="settings.php">setting</a> and put your Gmail and Password <br>
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

      </div>
   </div>
</body>
</html>











         <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
         <div class="container mt-5">
            <h1>Contact Me!</h1>
            <form class="row g-3">
               <div class="col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstName" required>
               </div>
               <div class="col-md-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastName" required>
               </div>
               <div class="col-md-8">
                  <label for="emailInfo" class="form-label">E-mail</label>
                  <input type="email" class="form-control" id="emailInfo" required>
               </div>
               <div class="col-md-4">
                  <label for="phoneNumber" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" id="phoneNumber" placeholder="+1 (415) 867-5309">
               </div>
               <div class="col-md-12">
                  <label for="comments" class="form-label">Comments, questions?</label>
                  <textarea class="form-control" id="comments" rows="3" required></textarea>
               </div>
               <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
         </div> -->