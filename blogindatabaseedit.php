<?php

//FROM FIELD INTO DATABASE
if(isset($_GET["delete"])) {
	$del = $_GET["delete"] * 1;
	if ($del > 0) {
		$sql = "DELETE FROM Blogposts WHERE ID = " . $del;
		mysqli_query($conn, $sql);
		echo "<script>document.location.href='loginsignup.php?blogindb=yes';</script>"; die();
	}
}

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

	$sql = "UPDATE Blogposts SET Username = '$username', Title = '$title', Post = '$post', date = '$date' WHERE ID = " . $editid;
	mysqli_query($conn, $sql);

	
	$blogID = mysqli_insert_id($conn);
	
	$cname = "";
	
	$sql = "DELETE FROM Blogposts_Categories WHERE BlogpostID = " . $editid;
	mysqli_query($conn, $sql);
	
	for ($i=0; $i<count($catname); $i++) {
		
		$sql = "INSERT INTO Blogposts_Categories (BlogpostID, CategoryID) VALUES ($editid, $catname[$i])";
		mysqli_query($conn, $sql);

	}
	
	echo "<script>document.location.href='editpost.php?blogindb=yes&id=$editid';</script>"; die();
	
}

?>