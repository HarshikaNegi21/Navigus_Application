<?php
	session_start();
	include("config.php"); 

	if(isset($_SESSION["user"]))
	{
		echo "<div align='center'>Welcome <b>" . $_SESSION["user"] . "</b></div>";
	}
	else
	{
		Header("location:login.php");
	}

	$db = new mysqli("$dbhost" , "$dbuser" , "$dbpass");
	if ($db->connect_error) 
	{
		die("Connection failed: " . $db->connect_error);
	} 
	$db->select_db("$dbname");
	
	$logs_query = "select * from access_logs";
	$result = $db->query($logs_query);
	$num_rows=$result->num_rows;
	
	echo "<h1 align='center'>Visiting users</h1>";
	
	for($i=0;$i<$num_rows;$i++) 
	{   
		$row=$result->fetch_row();
		echo "<div align='center'>" . $row[0] . "  :  " . $row[1] . "</div>";
	}

?>
