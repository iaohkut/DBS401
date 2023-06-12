<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
	<?php

	$Name = $_POST['txtName'];
	$Address = $_POST['txtAddress'];
	$City = $_POST['cmbCity'];

	$Email = $_POST['txtEmail'];
	$Mobile = $_POST['txtMobile'];
	$Gender = $_POST['rdGender'];
	$BirthDate = $_POST['txtDate'];

	$UserName = $_POST['txtUserName'];
	$Password = $_POST['txtPassword'];

	require "./Connections/shop.php";
	connectDB();

	$sql = "insert into customer_registration(CustomerName,Address,City,Email,Mobile,Gender,BirthDate,UserName,Password) values(?,?,?,?,?,?,?,?,?)";

	$preparedStatement = $conn->prepare($sql);
	$preparedStatement->bind_param('ssssissss', $Name, $Address, $City, $Email, $Mobile, $Gender, $BirthDate, $UserName, $Password);
	$preparedStatement->execute();

	disconnect_db();

	echo '<script type="text/javascript">alert("Registration Completed Succesfully");window.location=\'index.php\';</script>';

	?>
</body>

</html>