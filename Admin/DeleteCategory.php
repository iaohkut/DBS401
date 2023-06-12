<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
	<?php

	$Id = $_GET['CatId'];

	require "../Connections/shop.php";
	connectDB();

	$sql = "delete from Category_Master where CategoryId='" . $Id . "'";
	mysqli_query($conn, $sql);

	$sql1 = "DELETE FROM `Item_Master` WHERE CategoryId='".$Id."'";
	mysqli_query ($conn, $sql1);

	disconnect_db();
	echo '<script type="text/javascript">alert("Category Deleted Succesfully");window.location=\'Category.php\';</script>';

	?>
</body>

</html>