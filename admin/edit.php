<?php
$msg = ''; 

$item_id = $_GET['id'];

$sql = "SELECT * FROM stock WHERE item_id = '$item_id' ";

$result = $conn->query($sql);
$services = array();

if ($result->num_rows > 0) {
     #output data of each row
     while($row = $result->fetch_assoc()) {
     	$item_title = $row['item_title'];
     	$item_des = $row['item_des'];
     	$item_cat = $row['item_cat'];
     	$quantity = $row['quantity'];
     	$re_order_level = $row['re_order_level'];
     	
     }
}

$title=$description=$contact_no=$adress='';
$cat='Select Category';
$loc ='Select Location';

if($_POST){
	$title = trim($_POST["title"]);	
	$description = trim($_POST["description"]);
	$cat = trim($_POST["cat"]);
	$re_order_level = trim($_POST["re_order_level"]);
	$quantity = trim($_POST["quantity"]);	
		

	if($title == "" || $description == "" || $cat == "" || $cat == "Select Category" 
		||  $re_order_level == "" || $quantity == ""){

		$msg = "<div id='msg-error'>Fields can't be empty</div>";
	}else{
		$msg = "Item is Updated";

		$sql = "UPDATE stock SET item_title='$title', item_des='$description', item_cat='$cat',
				 re_order_level='$re_order_level', quantity='$quantity' WHERE item_id = '$item_id' ";

		$result = $conn->query($sql);
		header("Location: .?msg=$msg");
	}
echo $msg;
}

?>

<h3>Edit Services</h3>
<form name="add_service" method="post" action="">
	<table>
		<tr>
			<td>Title</td>
			<td><input type="text" name="title" value="<?php echo $item_title; ?>" ></td>
		</tr>
		<tr valign="top">
			<td >Description</td>
			<td><textarea name="description"><?php echo $item_des; ?></textarea></td>
		</tr>
		<tr>
			<td>Quantity</td>
			<td><input type="number" min="0" name="quantity" value="<?php echo $quantity; ?>" ></td>
		<tr>
			<td>Re Order Level</td>
			<td><input type="number" min="0" name="re_order_level" value="<?php echo $re_order_level; ?>" ></td>
		</tr>
		<tr>
			<td>Category</td>
			<td> 
			<select name="cat" >
			<option selected="true" style="display:none;"><?php echo $item_cat; ?></option>
			  <option value="Biscuts">Biscuts</option>
			  <option value="Cool Drinks">Cool Drinks</option>
			  <option value="Pens">Pens</option>
			  <option value="Milk Powder">Milk Powder</option>
			  <option value="Tea Packets">Tea Packets</option>
			</select></td>
		</tr>
		<tr><td></td><td><input type="submit" value="Save" style="width:115px; margin-top:10px;" ></td></tr>
	</table>
</form>	