<?php

session_start();

?>

<!DOCTYPE html>
<html>
	
    <head>
        <title>Blog</title>
        <link rel="stylesheet" type="text/css" href="blog.css" />
        <script src="blog.js"></script>
        
        <?php
            require 'mysqliconnection.php';
        ?>
        
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    </head>
	
    <body>
        
        <header>        
                
            <div class="container">
                <div class="top">
                    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
                    <p id=logotext>the past doesn't equal the future</p>
                    <img id="logo" style="display: block;" src="https://i.imgur.com/JQESiuD.jpg" alt=""/>
                    <br/>
                </div>
            </div>
            <br/>                  
            <div class="navigation">
                <ul class="nav">
                    <li><a href="main.php">Blog</a></li>
                    
                <?php
                    if (isset($_SESSION['userID'])) {
                        echo '<li><a href="loginsignup.php" style="color:green">Write an article</a></li>';
                    }
                    else {
                        echo '<li><a href="loginsignup.php">Login/Sign Up</a></li>';
                    }
                ?>
                    
                    <li><a href="contact.php">Contact</a></li>
                
                    <?php
                    
                       if (isset($_SESSION['userID'])) {
                           echo '<form method="post" id="contactblock" action="logout.php">
                           <li><button type="submit" name="logoutsubmit" class="button">Log Out</button></li>
                           </form>';
                       }
                        
                    ?>
                    
                </ul>
            </div>
            
        </header>