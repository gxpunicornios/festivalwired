<?php


class DbConnect {

	private $servername = "localhost";
	private $username = "festwired";
	private $password = "wsws8443";
	private $conn = null;

	function open(){
		// Create connection
		$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->username);
		// Check connection
		if (!$this->conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		//echo "Connected successfully";
	}

	function close(){
		$this->conn->close();
	}

	function insertUserData($user_name, $user_email, $user_tel, $user_student, $user_skill){

		if($user_name === "" || $user_email === "" || $user_tel === "" || $user_student === "" || $user_skill === "") {
			echo "error";
			return;
		}

		if($this->getUserData($user_email)) {
			echo "email";
			return;
		}



		$sql = "INSERT INTO user VALUES (DEFAULT,'$user_name','$user_tel','$user_email','$user_student','$user_skill')";

		if ($this->conn->query($sql) === TRUE) {
		    echo "added";
		} else {
			echo "error";
		    //echo "Error: " . $sql . "<br>" . $this->conn->error;
		}
	}

	function getUserData($user_email){
		if(!isset($user_email))
			return false;
		$sql = "SELECT user_name, user_email FROM user WHERE user_email = '$user_email'";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			return true;
		}
		else{
			return false;
		}
	}
} 

// $db = new DbConnect();
// $db->open();

?>

