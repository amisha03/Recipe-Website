<?php 
session_start();

	include("connection_new.php");
	$id = $_GET['id'];
	$displayquery = "SELECT * FROM recipe WHERE id=$id";
	$querydisplay = mysqli_query($con,$displayquery);
	$result = mysqli_fetch_array($querydisplay);
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="text-white bg-dark text-center">
			Update your recipee 
		</h1>
	
	<div class="col-lg-8 m-auto d-block">
	<form  method="post" enctype="multipart/form-data">
		<div class="form-group">

			<label for="recipe">Recipe name</label>
			<input type="text" name="recipe_name" id="recipe" value= "<?php echo $result['recipe_name']; ?>" class="form-control">
		</div>

		

		<div class="form-group">

			<label for="recipe_link">Recipe link</label>
			<input type="text" name="link" id="recipe_link" value="<?php echo $result['link']; ?>" class="form-control">
		</div>
		

		<div class="form-group">


			<label for="file">Recipe photo</label>
			<input type="file" name="file" id="file" value="<?php echo $result['image']; ?>" class="form-control">
		</div>

		<input type="submit" name="update" value="Update" class="btn btn-success">


	</form>
</div>

    </div>
</body>
</html>

<?php

if(isset($_POST['update'])){
	
	$recipename = $_POST['recipe_name'];
	$linkname = $_POST['link'];
	$files = $_FILES['file'];

	$filename = $files['name'];
	$filetmp = $files['tmp_name'];
	$fileext = explode(".",$filename);
	
	$filecheck = strtolower(end($fileext));
	$fileextstored = array('png','jpg','jpeg');
	if(in_array($filecheck, $fileextstored)){
		$destinationfile = 'uploadd/'.$filename;
		move_uploaded_file($filetmp, $destinationfile);

		$q = "UPDATE `recipe` SET `id`='$id',`recipe_name`='$recipename',`link`='$linkname',`image`='$destinationfile' WHERE `id`='$id'";
		$qu = mysqli_query($con,$q);
		if($qu)
		{
			echo "yess";

		}
		
           header('location:index_new.php');
           die; 

		
           

			
		}
	}


?>