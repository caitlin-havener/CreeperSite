<?php
	include('config.php');
	
	if( isset( $_COOKIE['isLoged'] ) ){
		header("Location: $loginPage");
		exit();
	}
?>
