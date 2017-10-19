<?php 

$msg = ''; 
$title=$description=$re_order_level=$quantity='';
$cat='Select Category';


if($_POST){
	$title = trim($_POST["title"]);	
	$description = trim($_POST["description"]);
	$cat = trim($_POST["cat"]);
	$quantity = $_POST["quantity"];	
	$re_order_level = $_POST["re_order_level"];

    $name_user = $_SESSION["username"];
    $sql = "SELECT user_id FROM users WHERE user_username='$name_user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $provider_id=$row['user_id'];
        }
    }


	if($title == "" || $description == "" || $cat == "" || $cat == "Select Category"
		 || $re_order_level == "" || $quantity=="" ){

		$msg = "<div id='msg-error'>Fields can't be empty</div>";
	}else if($quantity==0){
        $msg = "<div id='msg-error'>Quantity can't be zero</div>";
    }
    else{
		
	    $msg ="<div id='msg'>Item Added successfully</div>";

		$sql = "INSERT INTO stock (item_title, item_des, item_cat, provider_id, quantity, re_order_level) 
					VALUES ('$title', '$description', '$cat', '$provider_id', '$quantity', '$re_order_level')";
		$result = $conn->query($sql);		
		$title = "";
		$description = "";
		$cat = "";
		$quantity ="";
		$re_order_level = "";
		
		//header("Location:.?msg=$msg");
    	
	}
	echo $msg;
}


?>

<h3>Add Item</h3>
<form name="add_item" method="post" action="">
	<table>
		<tr>
			<td>Title</td>
			<td><input type="text" name="title" value="<?php echo $title; ?>" ></td>
		</tr>
		<tr valign="top">
			<td>Description</td>
			<td><textarea name="description"><?php echo $description; ?></textarea></td>
		</tr>
		<tr>
			<td>Quantity</td>
			<td><input type="number" name="quantity" min="0" value="<?php echo $quantity; ?>"></td>
		</tr>
		<tr>
			<td>Re Order Level</td>
			<td><input type="number" name="re_order_level" min="0" value="<?php echo $re_order_level; ?>" ></td>
		</tr>
		<tr>
			<td>Category</td>
			<td> 
			<select name="cat" >
			<option selected="true" style="display:none;"><?php echo $cat; ?></option>
			  <option value="ASUS">ASUS</option>
			  <option value="HP">HP</option>
			  <option value="Dell">Dell</option>
			  <option value="Lenavo">Lenavo</option>
			  <option value="Toshiba">Toshiba</option>
			</select></td>
		</tr>
		
		<tr><td><td><input type="submit" value="Add" style="width:115px; margin-top:10px;"></td></tr>
	</table>
</form>	
