<?php
	$user = $_COOKIE["userName"];
	print "welcome back $user";
	
	include('config.php');
	//connect to the database
	$connection=mysql_connect("localhost","root","")
		or print "connect failed because ".mysql_error();  
		
    mysql_select_db("test",$connection)
		or print "select failed because ".mysql_error();
		
		
	//DATABASE TO FETCH FIRST TEN STORIES AND FIRST ONE HUNDRED WORDS OF STORIES AND PRINT READ MORE LINKS
	$result = mysql_query("SELECT * FROM usermeds WHERE username='$user'");


while($row = mysql_fetch_array($result))
  {
  //echo $row['name'];
  }
?>
