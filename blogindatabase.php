<?php
//FROM FIELD INTO DATABASE

		$username = "";
		$title = "";
		$post = "";
		$date = "";
		$catname = "";
	
if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST["name"]) && !empty($_POST["title"]) && !empty($_POST["subject"]) && !empty($_POST["catname"])) {

		$username = $_POST["name"];
		$title = $_POST["title"];
		$post = $_POST["subject"];
		$date = date("d-m-Y, H:i");
		$catname = $_POST["catname"];
		
		//$sql = "INSERT INTO Blogposts (Username, Title, Post, date) " .
		//"VALUES ('$username', '$title', '$post', '$date');";
		
		$sql = "INSERT INTO Blogposts (Username, Title, Post, date) VALUES ('$username', '$title', '$post', '$date')";
		mysqli_query($conn, $sql);
   
		//$connection->exec($sql);
		
		$blogID = mysqli_insert_id($conn);
		//$blogID = $connection->lastInsertId();
		
		$cname = "";
		
		for ($i=0; $i<count($catname); $i++) {
			$sql = "INSERT INTO Blogposts_Categories (BlogpostID, CategoryID) VALUES ($blogID, $catname[$i])";
			mysqli_query($conn, $sql);
			
			
			//$sql = "INSERT INTO Blogposts_Categories (BlogpostID, CategoryID) " .
			//"VALUES ($blogID, $catname[$i])";
			//$connection->exec($sql);
		}
		
		echo "<script>document.location.href='editblog.php?blogindb=yes';</script>"; die();
		
	}
?>