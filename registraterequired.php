<?php
$unameErr = $fnameErr = $lnameErr = $emailErr = $pswErr = "";
$uname = $fname = $lname = $email = $psw = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["uname"])) {
			$unameErr = "Username is required";
	} 
    
	if (empty($_POST["fname"])) {
			$fnameErr = "Firstname is required";
	}
    
	if (empty($_POST["lname"])) {
			$lnameErr = "Lastname is required";
	}
    
	if (empty($_POST["email"])) {
			$emailErr = "Email is required";
	}
    	
	if (empty($_POST["psw"])) {
			$pswErr = "Password is required";
	}
  }
?>