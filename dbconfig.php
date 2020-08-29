<?php

$server = 'localhost';
$userName = 'root';
$Password = '';
$dbName = 'ideamagix';

$conn = mysqli_connect($server, $userName, $Password, $dbName);

if (!$conn) {
	echo "<script type='text/javascript'> alert('Server has not been conneted') </script>";
}

?>