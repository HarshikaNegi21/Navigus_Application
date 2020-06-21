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
?>
<div align="center">
<br/>
<br/>
<a href="access_logs.php">Access Logs</a>
<br/>
<br/>
<br/>
<br/>
<a href="logout.php"><button>Logout</button></a>
</div>
