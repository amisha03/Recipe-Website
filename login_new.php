<?php 

session_start();

	include("connection_new.php");
	include("functions_new.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email_id = $_POST['email_id'];
		$password = $_POST['password'];

		if(!empty($email_id) && !empty($password) )
		{

			//read from database
			$query = "select * from users where email_id = '$email_id' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['email_id'] = $user_data['email_id'];
						header("Location: index_new.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<section class="page">

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: 1px solid #999;
		width: 98%;
	}
	.page
{

	padding: 16px;
	margin-top: 30px;
	height: 1500px;
	background: url(heroimage.jpg) no-repeat;
	-webkit-background-size: cover;

	background-size: cover;
	height: 100vh;


}

	.form-box
{

    width:300px;
	height:400px;
	position:relative;
	margin:9% auto;
	background:#e9e3f4;
	padding:10px;
    overflow: hidden;
    
}


	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	/*#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}*/
	.submit-btn
{
	width: 85%;
	padding: 10px 30px;
	cursor: pointer;
	display: block;
	margin: auto;
	background: #F3C693;
	background: white;
	border: 0;
	outline: none;
	border-radius: 30px;
}

	</style>

	<div class="form-box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="email_id" placeholder="email id"required><br><br>
			<input id="text" type="password" name="password" placeholder="password"required><br><br>

			<input id="button" type="submit" value="Login" class='submit-btn'><br><br>

			<a href="signup.php" style="padding-left: 100px">Click to Signup</a><br><br>
		</form>
	</div>
	</section>
</body>
</html>