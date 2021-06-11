<?php 
session_start();

	include("connection_new.php");
	$id = $_GET['id'];
	$q = "DELETE from recipe where id= $id";
	
	mysqli_query($con,$q);
	header("location:index_new.php");
	die;
	

?>
