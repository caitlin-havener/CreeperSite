<?php
	include('config.php');
	//connect to the database
	$connection=mysql_connect("localhost","root","")
		or print "connect failed because ".mysql_error();  
		
    mysql_select_db("test",$connection)
		or print "select failed because ".mysql_error();
		
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

	mysql_close($connection);
?>

<html>
	<head>
	</head>
	
	<body>
    
    <!--MOVE THE BELOW FORM TO HOME PAGE, PREFERABLY NOT IN TABLE FORMAT -->
		<form action="login.php" method="post" name="register" id="register" style="display:inline;">
			<table width="100%" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#99CC33">
				<tr bgcolor="#99CC99"> 
					<td colspan="2"><div align="center"><strong>Please log in:</strong></div></td>
				</tr>
				<tr> 
					<td width="47%"><strong>Username:</strong></td>
					<td width="53%"><input name="userName" type="text" id="userName"></td>
				</tr>
				<tr> 
					<td><strong>Password:</strong></td>
					<td><input name="password" type="password" id="password"></td>
				</tr>
				<tr> 
					<td colspan="2">
						<input name="Submit" type="submit" id="Submit" value="Sign-In">
					</td>
				</tr>
			</table>
		</form>

	</body>
</html>