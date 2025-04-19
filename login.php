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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo '<script>alert("wrong username or password!")</script>';
		}else
		{
			echo '<script>alert("wrong username or password!")</script>';
		}
	}

?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="css/login.css">
   <link rel="icon" type="image/x-icon" href="img/logo.png" />
   <title>Login</title>
</head>
<body>
   <div id="background">
      <img src="img/backgroud.jpg" class="stretch" alt="" />
   </div>
   <!-- <div class="logoborder">
      <img class="logo" src="img/logo.png" alt="logo">
   </div> -->

   <div class="border">
      <form method="post">
         <p class="login">Log In Page</p>
         <p class="username">Username</p>
         <input class="inputusername" type="text" placeholder="Username" name="user_name">
         <p class="pass">Password</p>
         <input class="inputpass" type="password" placeholder="Password" name="password">

         <input type="submit" class="loginbutton" value="Login">
         <!-- <p class="not">Don't have an account?</p> -->
			<p class="admin">Username/Password in Docs</p>
          <!-- <a href="signup.php" class="signupbutton">Signup</a> -->
      </form>
   </div>
</body>
</html>