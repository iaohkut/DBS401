<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
	<?php

	$Valid = $_POST['txtDate'];

	$txtName = $_POST['txtName'];

	$txtDetail = $_POST['txtDetail'];


	require "../Connections/shop.php";
	connectDB();

	$sql = "insert into Offer_Master(Offer,Detail,Valid) values(?,?,?)";

	$preparedStatement = $conn->prepare($sql);
	$preparedStatement->bind_param('sss', $txtName, $txtDetail, $Valid);
	$preparedStatement->execute();

	disconnect_db();

	echo '<script type="text/javascript">alert("Offer Created Succesfully");window.location=\'Offers.php\';</script>';

	?>
</body>

</html>