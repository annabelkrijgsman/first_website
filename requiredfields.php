<?php
$nameErr = $titleErr = $commentErr = "";
$name = $title = $comment = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
			$nameErr = "Name is required";
	}
    	
	if (empty($_POST["title"])) {
			$titleErr = "Title is required";
	}

	if (empty($_POST["subject"])) {
			$commentErr = "Article is required";
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}
	}
?>