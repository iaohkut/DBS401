<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
	<?php

	$Id = $_GET['FeedbackId'];

	require "../Connections/shop.php";
	connectDB();

	$sql = "delete from Feedback_Master where FeedbackId=?";

	$preparedStatement = $conn->prepare($sql);
	$preparedStatement->bind_param('i', $Id);
	$preparedStatement->execute();

	disconnect_db();
	echo '<script type="text/javascript">alert("Feedback Deleted Succesfully");window.location=\'Feedback.php\';</script>';

	?>
</body>

</html>