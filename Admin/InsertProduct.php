<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
	<?php

	$cmbCategory = $_GET['CategoryId'];
	$txtName = $_POST['txtName'];
	$txtDesc = $_POST['txtDesc'];
	$txtSize = $_POST['txtSize'];
	$txtPrice = $_POST['txtPrice'];
	$txtDiscount = $_POST['txtDiscount'];
	$txtFinal = $_POST['txtFinal'];

	$path1 = $_FILES["txtFile"]["name"];
	move_uploaded_file($_FILES["txtFile"]["tmp_name"], "../Products/" . $_FILES["txtFile"]["name"]);

	require "../Connections/shop.php";
	connectDB();

	$sql = "insert into Item_Master	(CategoryId,ItemName,Description,Size,Image,Price,Discount,Total) values(?,?,?,?,?,?,?,?)";

	$preparedStatement = $conn->prepare($sql);
	$preparedStatement->bind_param('issisiii', $cmbCategory, $txtName, $txtDesc, $txtSize, $path1, $txtPrice, $txtDiscount, $txtFinal);
	$preparedStatement->execute();

	disconnect_db();
	header("location:Products.php?CategoryId=" . $cmbCategory . "")

		?>
</body>

</html>