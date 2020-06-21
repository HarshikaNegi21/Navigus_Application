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
			<h1>Register account</h1><br/><br/>
			<form method="post" action="">
				Full Name: <input type="text" name="fname" placeholder="Full Name" required/><br/></br>
				Email: <input type="text" name="email" placeholder="Email" required/></br></br>
				Password: <input type="password" name="password" placeholder="Password" required/></br></br></br>
				<input type="submit" name="register" value="Register" />
			</form>
			<a href="login.php"><button>Login</button></a>
		</div>
	</body>
</html>


<?php
	if(isset($_POST["register"]))
	{
		$fname = $_POST["fname"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$register_query = "insert into users (fname,email,password) values ('$fname' , '$email' , '$password')";
	
		if($db->query($register_query) === TRUE) {
			echo "<script>alert('Registration successful!');</script>";
		} else {
			echo "Error: " . $register_query . "<br/>" . $db->error;
		}
	}
?>
