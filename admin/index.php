<?php
session_start();

if(!isset($_SESSION["username"])) {
	header('Location: ../login.php');
}

#load connection
require_once('../db_con.php');

$provider_id = $_SESSION['provider_id'];
$user_type = $_SESSION['user_type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OSMS | Admin</title>
	<link rel="stylesheet" href="css/main.css?v=1">
</head>
<body>
<div class="container">
		<div class="content">
			<div class="sidebar-left">
				<nav>
					<ul>
						<li><a href="../">Home</a></li>
					<?php if($user_type == '1') {?> <li><a href="?page=dash.php">Dashboard</a></li>
													<li><a href="?page=add_item.php">Add Item</a></li>

					 <?php }else{ ?>
						<li><a href="?page=add_item.php">Add Item</a></li>
                        <li><a href="?page=remove_item.php">Remove Item</a></li>
					<?php } ?>	
						<li><a href="../logout.php">Log Out</a></li>
					</ul>
				</nav>
			</div>
			
			<div class="sidebar-right">
				<div id="admin-header"><a href="../"><img src="../images/logo.png"></a></div>
				<div id="content">
				<?php
					if(isset($_GET["page"])){
						if($_GET["page"] !==""){
							$page = $_GET["page"];
							include($page);
						} 	
					}else{
						if($user_type == '1'){
							include("dash.php");

						}
					}
				?>		
				</div>
			</div>
			<div class="clear"></div>
		</div>	
	
	</div>
</body>
</html>

