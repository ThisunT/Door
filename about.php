<?php session_start(); ?>
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
	<div>
		<p>This Online Stock Mangment System website is used for make the stock managment smooth and effcient. </p>
		<p>This is develped by OSMS IT team.</p>
		<p><h1>At any inconvenince feel free to contact</h1></p> 
		<p>Hot line- 077 123564 </p>
		<p>email- help@osms.com </p>

	</div>
	<div class="container">
		<div class="footer">Copyright © 2017 OSMS.com ·  All Right Reserved. </div>	
	
	</div>
</body>
</html>