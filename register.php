<?php
	include('config.php');
	//connect to the database
	$connection=mysql_connect("localhost","root","")
		or print "connect failed because ".mysql_error();  
		
    mysql_select_db("test",$connection)
		or print "select failed because ".mysql_error();
		
		
		
function registerUser(){
	$userName = mysql_real_escape_string($_POST['userName']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$addUser = mysql_query("INSERT INTO `userlist` (`userName`,`userPassword`) VALUES ('$userName','$password')");

	mysql_close($connection);

	setcookie("isLoged", 'yes', time()+2419200);
	setcookie("userName", $userName, time()+2419200);

	echo("Thank you for joining Creeper Stash- please login on the main page.");
	exit();
}
?>

<HTML>
<BODY>
 <!--INSTEAD OF FORM ACTION SEND TO REGISTER PHP... CALL ABOVE FUNCTION registerUser() ON SUBMITAL -->
		<form action="register.php" method="post" name="register" id="register" style="display:inline;">
			  <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#99CC33">
					<tr bgcolor="#99CC99"> 
						<td colspan="2"><div align="center"><strong>Please enter registration information: </strong></div></td>
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
						<td><strong>Re-enter password: </strong></td>
						<td><input name="password2" type="password" id="password2" /></td>
					</tr>
					<tr> 
						<td colspan="2" class="regsubmit">
							<input name="Submit" type="submit" id="Submit" value="Register">
						</td>
					</tr>
			  </table>
		</form>
 </BODY>
 </HTML>