<?php
global $conn;

function connectDB() {
    global $conn;
    $conn = mysqli_connect("localhost", "root", "", "shopping");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
}

function disconnect_db() {
    global $conn;
    if ($conn) {
        mysqli_close($conn);
    }
}
?>
