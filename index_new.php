<?php 
session_start();

	include("connection_new.php");
	include("functions_new.php");
	

	$user_data = check_login($con);

?>



<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	<link rel="stylesheet" href="style1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="navbar" >
            
            <nav>
                <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
                <ul id='MenuItems'>
                	<li><a>
					Hello, <?php echo $user_data['user_name']; ?></a></li>
                	<li><a href="logout_new.php">Logout</a></li>


                    
                    <li><a href='upload.php' >Add Recipe</a></li>
                    
                </ul>
            </nav>
    </div>
	<section class="page">
		<!--<div class="myVideo">
		<video autoplay muted loop id="myVideo">
  <source src="FoodPack1_02_Videvo.mov" >
</video>
</div>-->
		<div class="hero_wrapper">
	        <h1>Welcome to Amisha's recipes</h1>
	        <p></p>
	            <!--<span>post</span>-->
	            <form class="form_code"> 
					
	                <input class="post_code" type="text" name="recipe_name" placeholder="Enter recipe name">

					<br>
	                <input type="submit" name="find" value="Find" class="btn btn-success" style="font-size: 20px;">
	            
	            </form>
        </div>
</section>
<section class="product">


<?php
$displayquery = 'select * from recipe';
		$querydisplay = mysqli_query($con,$displayquery);

		

		while ($result = mysqli_fetch_array($querydisplay)) {
			?>
			<div class="product__list__item"  >
        	<a href= "<?php echo $result['link']; ?>" >
            <img class="img-responsive" src= "<?php echo $result['image']; ?>" >
            <h3 class="product_heading">
                <?php echo $result['recipe_name']; ?>

            </h3>
        </a>
        <a href="update.php?id=<?php echo $result['id']; ?>"> <i class = "fa fa-edit" style="font-size:40px"></i></a>
        <a href="delete.php?id=<?php echo $result['id']; ?>"style="padding-left:10px "><i class= "fa fa-trash-o" style="font-size:40px;color:red"></i></a>
        
    </div>
<?php
			
		}

?>


</section>	
</body>
</html>