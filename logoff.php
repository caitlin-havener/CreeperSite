<?php
	include('config.php');

	setcookie("isLoged", '' ,time()-3600);
	setcookie("userName",'' , time()-3600);

	header("Location: $logoutPage");
	exit();
?>