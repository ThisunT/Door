<?php 
session_start();
#load connection
require_once('db_con.php');

$msg = ""; 
$name=$username=$email=$password=$repassword='';

if($_POST) {
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$name = test_input($_POST['name']);
	$username = test_input($_POST['username']);
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$email = $_POST['email'];

	if ($name == '' || $username == '' || $password == '' || $repassword == '' || $email == '') {
		$msg = 'Fields can not be empty';
	}elseif (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL) ) {
		$msg = 'Please enter a valid email address';

	}elseif($password !== $repassword) {
		$msg = 'Passwords doesnt match';

	}else{	

	$password = md5($password);
	$sql = "INSERT INTO users (user_fullname, user_username, user_password, user_email, user_type) 
			VALUES ('$name', '$username', '$password', '$email', '0')";
	$result = $conn->query($sql);
	header("Location: register.php?msg=Registration successfull");
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>A2ZServices</title>
	<link rel="stylesheet" href="../group24/css/style.css">
</head>
<body>
	<div class="header-wrapper">
		<nav>
			<ul>
				  <li><a href="../group24">Home</a></li>
				  <li><a href="../group24/contact.php">Contact</a></li>
				  <li><a href="../group24/about.php">Help</a></li>
				  <?php
				  if(isset($_SESSION["username"])) {
				  	echo '<li><a href="../group24/login.php">Admin Area</a></li>';
				  }
				  ?>
			</ul>
		</nav>	
		<div class="header"><img src="../group24/images/header.png" width="100%"></div>
	</div>
	
	<div class="container">
		<?php
		if(isset($_GET['msg'])) {
			echo "<div id='msg'>".$_GET['msg']."</div>";
		}	
		?>

		<div class="content" id="reg-form">
			<h2>Registration</h2>
			<?php if($msg !="") echo "<div id='msg-error'>".$msg."</div>"; ?>
			<!-- start of user loging part -->
			<form name="register" method="post" action="register.php">
				<table>
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" value="<?php echo $name;?>" ></td>
					</tr>
					<tr>
						<td>email</td>
						<td><input type="email" name="email" value="<?php echo $email;?>" ></td>
					</tr>										
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" value="<?php echo $username;?>" ></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" value="" ></td>
					</tr>
					<tr>
						<td>Retype Password</td>
						<td><input type="password" name="repassword" value="" ></td>
					</tr>	
					<tr>
						<td></td>
						<td><input class="button" type="submit" value="Submit"> 
							<a class="button" href="../group24/index.php">Cancel</a></td>
					</tr>				
				</table>
				<!--
				<a class="button" href="javascript:document.register.submit()">Submit</a>
				<a class="button" href="index.php">Cancel</a>
				-->
			</form><br><br>
		</div>	
	<div class="footer">Copyright © 2015 A2Z Services.com ·  All Right Reserved. </div>	
	</div>	
</body>
</html>