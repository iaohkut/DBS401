<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
	<?php
	session_start();
	$Id = $_GET['Id'];

	require "../Connections/shop.php";
	connectDB();

	$sql = "select * from Item_Master where ItemId=?";

	$preparedStatement = $conn->prepare($sql);
	$preparedStatement->bind_param('i', $Id);
	$preparedStatement->execute();
	$result = $preparedStatement->get_result();

	while ($row = mysqli_fetch_array($result)) {
		$Id = $row['ItemId'];
		$Name = $row['ItemName'];
		$Description = $row['Description'];
		$Size = $row['Size'];
		$Price = $row['Price'];
		$Discount = $row['Discount'];
		$Total = $row['Total'];
		$Image = $row['Image'];
	}
	$Qty = $_POST['txtQty'];
	$CID = $_SESSION['ID'];
	$Net = $Total * $Qty;

	$sql = "insert into Shopping_Cart(CustomerId,ItemName,Quantity,Price,Total) values(?,?,?,?,?)";

	$preparedStatement = $conn->prepare($sql);
	$preparedStatement->bind_param('isiii', $CID, $Name, $Qty, $Total, $Net);
	$preparedStatement->execute();

	disconnect_db();
	echo '<script type="text/javascript">alert("Item Added To the cart");window.location=\'Products.php\';</script>';

	?>
</body>

</html>