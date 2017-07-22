<?php


class DbConnect {

	$servername = "localhost";
	$username = "festwired";
	$password = "wsws8443";
	$conn = null;

	function open(){
		// Create connection
		$conn = mysqli_connect($servername, $username, $password);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		echo "Connected successfully";
	}

	function close(){
		$conn->close();
	}
} 

?>

