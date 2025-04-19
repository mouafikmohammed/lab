<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num($length);
			$query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="css/signup.css">
   <link rel="icon" type="image/x-icon" href="img/logo.png" />
   <title>Signup</title>
</head>
<body>
   <div id="background">
      <img src="img/backgroud.jpg" class="stretch" alt="" />
   </div>
   <!-- <div class="logoborder">
      <img class="logo" src="img/logo.png" alt="logo">
   </div> -->

   <div class="border1">
      <form method="post">
         <p class="signup1">Signup Page</p>

         <p class="username1">username</p>
         <input class="inputusername1" type="text" placeholder="Username" name="user_name">
         <p class="pass1">Password</p>
         <input class="inputpass1" type="password" placeholder="Password" name="password">

         <input type="submit" class="signupbutton" value="Signup">
         <p class="not1">Already have an account?</p>
         <a href="login.php" class="loginbutton">Log In</a>
      </form>
   </div>
</body>
</html>