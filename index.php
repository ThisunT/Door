<?php
session_start();
$setcat = false;
$setloc = false;

#url parameters
if(isset($_GET['cat']) && $_GET['cat'] !=="") {
	$cat = 'cat=' . $_GET['cat'] . '&';
	$setcat = true;
	$category = $_GET['cat'];
}else{
	$cat = '';
	$category = '';
}



#load connection
require_once('db_con.php');

if($setcat)	$sql = "SELECT * FROM stock WHERE item_cat LIKE '$category' ORDER BY item_id DESC";
if(!$setcat) $sql = "SELECT * FROM stock ORDER BY item_id DESC";

$result = $conn->query($sql);
$services = array();

if ($result->num_rows > 0) {
     #output data of each row
     while($row = $result->fetch_assoc()) {
     	$services[] = $row;
     }
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
		<div class="header"><img src="images/header.png" width="100%" alt="osms"></div>
	</div>

	<div class="container">
		<div class="content">
			<div class="services">

				<?php  
				if (empty($services )) {
					echo "<h3>No Resutls</h3>";
				}else{
					foreach ($services as $service ) { ?>
						<div class="item">
							<h3><?php  echo $service['item_title']; ?></h3>
							<p id="details"><?php  echo $service['item_des']; ?></p>
							<span id="contact">Quantity</span> : 
								<span style="color : #0B779B;">
								<?php  
								$str = "0".$service['quantity'];
								$parts = str_split($str, 3);
                                echo $service['quantity'];
								?> |
								<?php  echo "Re Order Level : (".$service['re_order_level'].")"; ?>
								</span>
							</span>
							<span id="cat">Category</span> : 
							<span style="color : #0B779B;"><?php  echo $service['item_cat']; ?></span>
						</div>
					<?php } }?>
			</div>
			
			<div class="siderbar">
				<h3></h3>
					<!-- start of user loging part
					<form name="signin" method="post" action=".">
						<input autocomplete="off" type="text" name="uname" value="" placeholder="username">
						<input type="password" name="password" value="" placeholder="password">
						<?php echo $msg; ?>
						<a class="button btn-full" href="javascript:document.signin.submit()">Sign in</a>
					</form>
					-->
					<?php
					if(isset($_SESSION["username"])) {
						echo '<a class="button btn-full" href="logout.php">Log Out</a>';

                        $name_user = $_SESSION["username"];
                        $sql = "SELECT user_type FROM users WHERE user_username='$name_user'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                if($row['user_type']==1){
                                    echo '<a class="button btn-full" href="register.php">Resgister a vendor</a>';
                                }
                            }
                        }

					}else{
						echo '<a class="button btn-full" href="login.php">Login</a>';
					}
					?>
					<span>It is free, Premium</span>

				<h3>Category</h3>
					<ul>
						<li><a href="?">All</a></li>
						<li><a href="?cat=Biscuts">ASUS</a></li>
						<li><a href="?cat=Cool Drinks">HP</a></li>
						<li><a href="?cat=Pens">Dell</a></li>
						<li><a href="?cat=Milk Powder">Lenavo</a></li>
						<li><a href="?cat=Tea Packets">Toshiba</a></li>
					</ul>

									
			</div>
			<div class="clear"></div>
		</div>	
	<div class="footer">Copyright © 2017 OSMS.com ·  All Right Reserved. </div>	
	</div>	
</body>
</html>