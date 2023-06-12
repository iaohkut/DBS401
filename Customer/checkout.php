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

	require "../Connections/shop.php";
	connectDB();


	$sql = "insert into Shopping_Cart_Final(CustomerID,ItemName,Quantity,Price,Total)  select CustomerID,ItemName,Quantity,Price,Total from Shopping_Cart where CustomerID=" . $_SESSION['ID'] . "";

	mysqli_query($conn, $sql);

	$sql = "delete from Shopping_Cart where CustomerID=" . $_SESSION['ID'] . "";

	mysqli_query($conn, $sql);

	disconnect_db();

	echo '<script type="text/javascript">alert("Thank You For Your order");window.location=\'Cart.php\';</script>';

	?>
</body>

</html>