<?php 
session_start();

if(isset($_SESSION["username"])) {
	header('Location: admin');
	exit;
}

#load connection
require_once('db_con.php');

$msg = ''; 

#check login details
if($_POST) {
	$user = $_POST["uname"];
	$password = md5($_POST["password"]);
	if ($user !== '' && $password !== '') {
		# redirect location...
		$sql = "SELECT * FROM users WHERE user_username='$user' AND user_password='$password' LIMIT 1 ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
		     	$_SESSION['username'] =  $row['user_username'];
		     	$_SESSION['provider_id'] = $row['user_id'];
		     	$_SESSION['user_type'] = $row['user_type'];
		    }
			
			header('Location: admin');
		}else{
			$msg = '<span style="color:red;">Wrong Username or Password</span>' ;
		}
		
	}else{
		$msg = '<span style="color:red;">Wrong Username or Password</span>' ;
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>A2ZServices</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header-wrapper">
		<nav>
			<ul>
				  <li><a href="./">Home</a></li>
				  <li><a href="contact.php">Contact</a></li>
				  <li><a href="about.php">About</a></li>
			</ul>
		</nav>	
		<div class="header"><img src="images/header.png" width="100%"></div>
	</div>

	<div class="container">
		<div class="content" id="login-form">
			<h2>Login</h2>
			<?php echo $msg; ?>
			<!-- start of user loging part -->
			<form name="register" method="post" action="">
				<table>
					<tr>
						<td>Username</td>
						<td><input autocomplete="off" type="text" name="uname" value="" placeholder="username"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" value="" placeholder="password"></td>
					</tr>
					<tr>
						<td></td>
						<td><input class="button" type="submit" value="submit"></td>
					</tr>														
				</table>
			</form><br><br>
		</div>	
	<div class="footer">Copyright © 2015 A2Z Services.com ·  All Right Reserved. </div>	
	</div>	
</body>
</html>