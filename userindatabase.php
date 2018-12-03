<?php		

/*FROM FIELD INTO DATABASE*/

		$username = "";
		$firstname = "";
		$lastname = "";
		$email = "";
		$password = "";
	
if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST["uname"]) && !empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) && !empty($_POST["psw"]))
	{
		$username = $_POST["uname"];
		$firstname = $_POST["fname"];
		$lastname = $_POST["lname"];
		$email = $_POST["email"];
		$password = $_POST["psw"];
		
		$result = "<p><b>Thanks for signing up $firstname!</b></p>";"<br/>";
		echo $result;
		
/*else if ()
	{
		captcha gedoe
	}*/
	
	$sql = "INSERT INTO Users (Username, Firstname, Lastname, Email, Password) " .
   "VALUES ('$username', '$firstname', '$lastname', '$email', '$password')";
    /*bij problemen in query:
    echo $sql;
    exit();*/	
		
    /*$result = */$connection->exec($sql);
    /*if(!result) = niet goed gegaan .. if($result) =  wel goed gegaan*/
    /*echo $result . " added to database";  */
		/*}*/	

$connection = null; // Close connection
}
?>