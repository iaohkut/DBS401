<?php

$filename = $_GET['filename']; // Get the filename from the URL parameter
$imagePath = '../Products/' . $filename; // Adjust the path to your image directory

// Set the content-type header based on the image file type
// $mime = mime_content_type($imagePath);
// header("Content-type: $mime");

// Send the image content to the browser
include($imagePath);