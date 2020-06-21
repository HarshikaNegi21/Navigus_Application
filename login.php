<?php
	session_start();
	include("config.php"); 
?>
<?php
	$db = new mysqli("$dbhost" , "$dbuser" , "$dbpass");
	if ($db->connect_error) 
	{
		die("Connection failed: " . $db->connect_error);
	} 
	$db->select_db("$dbname");
?>

<html>
	<body>
		<div align="center">
			<h1>Login</h1><br/><br/>
			<form method="post" action="">
				Email: <input type="text" name="email" placeholder="Email" required/></br></br>
				Password: <input type="password" name="password" placeholder="Password" required/></br></br></br>
				<input type="submit" name="login" value="Login" />
			</form>
			<a href="register.php"><button>Register</button></a>
		</div>
	</body>
</html>

<?php
	if(isset($_POST["login"]))
	{
		$email = $_POST["email"];
		$password = $_POST["password"];
		$login_query = "select * from users where email = '$email' and password = '$password'";
	
		$result=$db->query($login_query);
		$row=$result->fetch_row();
		$fname = $row[0];
		if(($email==$row[1]) && ($password==$row[2]))
		{
			$_SESSION["user"] = $email;
			$current_time = date('Y-m-d H:i', time());
			$log_query = "insert into access_logs (fname , access_time) values ('$fname' , '$current_time')";
			$db->query($log_query);
			Header("location:dashboard.php");
		}
		else
		{
			echo "<script>alert('Incorrect Credentials');</script>";
		}
	}
?>

