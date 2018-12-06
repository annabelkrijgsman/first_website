<?php

$host = "localhost";
$user_name = "root";
$pass_word = "";
$db = "Blog";

// Create connection
$conn = mysqli_connect($host, $user_name, $pass_word, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }        

?>