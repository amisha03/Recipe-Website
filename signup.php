<?php 
session_start();

	include("connection_new.php");
	include("functions_new.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email_id = $_POST['email_id'];
		$phone_no = $_POST['phone_no'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];


		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "INSERT INTO users (user_id,email_id,phone_no,user_name,password) VALUES ('$user_id','$email_id','$phone_no','$user_name','$password')";

			mysqli_query($con, $query);
			?>
            <script>
                alert("Inserted successfully");
            </script>
            <?php

			header("Location: login_new.php");
			die;
		}else
		{
			?>
            <script>
                alert("No query");
            </script>
            <?php
			echo "Please enter some valid information!";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href=
	"https://maxcdn.bootstrapcdn.com/bootstrap/
	4.0.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src=
	"https://ajax.googleapis.com/ajax/libs/
	jquery/3.3.1/jquery.min.js">
	</script>
	<!-- Popper JS -->
	<script src=
	"https://cdnjs.cloudflare.com/ajax/libs/
	popper.js/1.12.9/umd/popper.min.js">
	</script>
	<!-- Latest compiled JavaScript -->
	<script src=
	"https://maxcdn.bootstrapcdn.com/bootstrap/
	4.0.0/js/bootstrap.min.js">
	</script>
</head>

<body><br>
	<h1 class="text-center" style="color: blue">
		Sign Up
	</h1>

	

	<div class="container">
	<div class="col-lg-8
		m-auto d-block">
		<form method="post">
		<div class="form-group">
			<label for ="user">
				Username:
			</label>
			<input type="text"
					name="user_name" id="usernames"
					class="form-control">
			<h5 id="usercheck" style="color: red;" >
					**Username is missing
			</h5>
		</div>


		<div class="form-group">
			<label for="user">
					Email:
			</label>
			<input type="email" name="email_id"
				id="email" required
				class="form-control">
			<small id="emailvalid" class="form-text
				text-muted invalid-feedback">
					Your email must be a valid email
			</small>
		</div>
		<div class="form-group">
			<label for="user">
					Phone
			</label>
			<input type="tel" name="phone_no"
				id="phone" required
				class="form-control">
			<small id="phonevalid" class="form-text
				text-muted invalid-feedback">
					Your phone no must be a valid phone no
			</small>
		</div>


		<div class="form-group">
			<label for="password">
					Password:
			</label>
			<input type="password" name="password"
				id="password" class="form-control">
			<h5 id="passcheck" style="color: red;">
				**Please Fill the password
			</h5>
		</div>

		<div class="form-group">
			<label for="conpassword">
					Confirm Password:
			</label>
			<input type="password" name="conf"
					id="conpassword" class="form-control">
			<h5 id="conpasscheck" style="color: red;">
				**Password didn't match
			</h5>
		</div>

		<input type="submit" id="submitbtn"
			value="Sign Up" class="btn btn-primary">
		</form>
		<br>
		<a href="login_new.php" >Click to Login</a><br><br>
	</div>
	</div>

	
	<script src="valid.js"></script>
</body>
</html>
