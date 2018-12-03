<?php
$unameErr = $pswErr = "";
$uname = $psw = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["uname"])) {
			$unameErr = "Username is required";
	}
    	
	if (empty($_POST["psw"])) {
			$pswErr = "Password is required";
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}
	}
?>