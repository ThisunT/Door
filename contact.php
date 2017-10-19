<?php 
session_start(); 

if($_POST) {
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$name 	= test_input($_POST['name']);
	$email 	= $_POST['email'];
	$msg 	= test_input($_POST['msg']);

	$subject = "contact by $name ( $email ) ";

	mail('info@osms.com', $subject, $msg);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OSMS</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header-wrapper">
		<nav>
			<ul>
				  <li><a href="./">Home</a></li>
				  <li><a href="contact.php">Contact</a></li>
				  <li><a href="about.php">Help</a></li>
				  <?php
				  if(isset($_SESSION["username"])) {
                      $name_user = $_SESSION["username"];
                      echo '<li><a href="./login.php">'.$name_user.'</a></li>';
				  }
				  ?>
			</ul>
		</nav>	
		<div class="header"><img src="images/header.png" width="100%" alt="a2zservices"></div>
	</div>

	<div class="container">
		<div id="contact-form">
			<h2>Contact us</h2>
			<form name="register" method="post" action="">
				<table>
					<tr>
						<td>Name</td>
						<td><input type="text" name="name"  placeholder="Your name here." required></td>
					</tr>
					<tr>
						<td>email</td>
						<td><input type="email" name="email" placeholder="email here" required></td>
					</tr>										
					<tr>
						<td>Message</td>
						<td><textarea name="msg" rows="10" required></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input class="button" type="submit" value="Send"> 
							<a class="button" href="index.php">Cancel</a></td>
					</tr>				
				</table>
				<!--
				<a class="button" href="javascript:document.register.submit()">Submit</a>
				<a class="button" href="index.php">Cancel</a>
				-->
			</form><br><br>
		</div>
		<div class="footer">Copyright © 2017 OSMS.com ·  All Right Reserved. </div>	
	
	</div>