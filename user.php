<?php
	include('config.php');
	
	
	//IF USER IS LOGGED IN (COOKIE SAYS YES)
	if( isset( $_COOKIE['isLoged'] ) ){
		$user = $_COOKIE["userName"];
		print "welcome back $user";
		//PRINT LINKS FOR LOGGED IN USER
		//make logoff link call logoff function
		exit();
	}
	else //USER IS NOT LOGGED IN
	{
		//PRINT THE LOGIN FORM	
		//post data from login form to login function
	}
	
	
	//connect to the database
	$connection=mysql_connect("localhost","root","")
		or print "connect failed because ".mysql_error();  
		
    mysql_select_db("test",$connection)
		or print "select failed because ".mysql_error();
	
	
	
function login($userName,$password){	
	$userName = mysql_real_escape_string($_POST['userName']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$userQuery = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM " . $tableName .
		" WHERE `" . $userNameField . "`='$userName' AND `" . $userPasswordField . "`='$password'"));
	
	if($userQuery[0] > 0){
			/* Disconnect from database */
			mysql_close($connection);
			
			setcookie("isLoged", 'yes', time()+2419200);
			setcookie("userName", $userName, time()+2419200);

			/* Redirect to login page */
			header("Location: $loginPage");
			exit();
		} else {
			$message = 'Invalid username and/or password!';
			print $message;
		}
}

function logoff(){
	setcookie("isLoged", '' ,time()-3600);
	setcookie("userName",'' , time()-3600);

	header("Location: $logoutPage");
	exit();
}



	mysql_close($connection);
?>

