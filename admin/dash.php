<?php 
if($user_type != '1'){
	echo "<h3>Please login as a Administrator</h3>";
	exit();
}

if(isset($_GET["action"])) {
	$item_id = $_GET['id'];
	// sql to delete a record
	$sql = "DELETE FROM stock WHERE item_id = '$item_id' ";

	if ($conn->query($sql) === TRUE) {
	    echo "<div id='msg'>Record deleted successfully</div>";
	} else {
	    echo "<div id='msg-error'>Error deleting record:</div>" ;
	}
}

$sql = "SELECT * FROM stock ORDER BY item_id DESC";

$result = $conn->query($sql);
$services = array();

if ($result->num_rows > 0) {
     #output data of each row
     while($row = $result->fetch_assoc()) {
     	$services[] = $row;
     }
}
	if(isset($_GET['msg'])) {
		echo "<div id='msg'>".$_GET['msg']."</div>";
	}	
	echo "<h3>All Items</h3>";

	foreach ($services as $service ) { ?>
	<div class="item">
		<span style="float:right;"><a onClick = "return confirm('Are you sure?');" id="edit_btn" href="?page=dash.php&action=del&id=<?php echo $service['item_id'] ?>">Delete</a></span>
		<span style="float:right;"><a id="edit_btn" href="?page=edit.php&id=<?php echo $service['item_id'] ?>">Edit</a></span>
		<h3><?php  echo $service['item_title']; ?></h3>
		<p id="details"><?php  echo $service['item_des']; ?></p>
		<span id="quantity">Quantity : 
		<?php
		$str = "0".$service['quantity'];
		?> |
		<?php  echo $service['re_order_level']; ?> |</span>
		<span>Category : <?php  echo $service['item_cat']; ?></span>
		
	</div>
<?php } ?>