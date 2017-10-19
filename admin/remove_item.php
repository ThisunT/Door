<?php

$msg = '';
$title=$quantity='';
$cat='Select Category';


if($_POST){
    $title = trim($_POST["title"]);
    $quantity = $_POST["quantity"];

    if($title == "" || $quantity=="" ){
        $msg = "<div id='msg-error'>Fields can't be empty</div>";
    }
    else{
        $name_user = $_SESSION["username"];
        $sql = "SELECT user_id FROM users WHERE user_username = '$name_user'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
            }
        }

        $sql = "SELECT quantity FROM stock WHERE item_title='$title' AND provider_id =$user_id ";
        $result = $conn->query($sql);

        if ($result->num_rows <= 0) {
            echo "Invalid stock";
            exit();
        }

        else {
            while ($row = $result->fetch_assoc()) {
                $quantity_at_the_moment = $row['quantity'];
            }
        }
        $new_quantity = $quantity_at_the_moment-$quantity;

        if($new_quantity<=0){
            $sql = "DELETE from stock WHERE item_title = '$title'";
            $result = $conn->query($sql);
            $msg ="<div id='msg'>Item removed successfully</div>";
        }
        else {
            $sql = "UPDATE stock SET quantity='$new_quantity' WHERE item_title='$title'";
            $result = $conn->query($sql);
            $msg ="<div id='msg'>Item removed successfully</div>";
        }





        $title = "";
        $quantity ="";


        //header("Location:.?msg=$msg");

    }
    echo $msg;
}
?>

<h3>Remove Item</h3>
<form name="remove_item" method="post" action="">
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?php echo $title; ?>" ></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><input type="number" name="quantity" min="0" value="<?php echo $quantity; ?>"></td>
        </tr>
        <tr><td><td><input type="submit" value="Remove" style="width:115px; margin-top:10px;"></td></tr>
    </table>
</form>
