<?php

//FORM INTO DATABASE
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
	
	$sql = "INSERT INTO Blogposts (Username, Title, Post, date) VALUES ('$username', '$title', '$post', '$date')";
	mysqli_query($conn, $sql);
	
	//CATEGORIES INTO DATABASE
	$blogID = mysqli_insert_id($conn);
	
	$cname = "";
	
	for ($i=0; $i<count($catname); $i++) {
		$sql = "INSERT INTO Blogposts_Categories (BlogpostID, CategoryID) VALUES ($blogID, $catname[$i])";
		mysqli_query($conn, $sql);
	}
	
	echo "<script>document.location.href='loginsignup.php?blogindb=yes';</script>"; die();
	
}

?>