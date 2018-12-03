<!DOCTYPE html>
<html>
	
        <head>
            <title>Blog</title>
            <link rel="stylesheet" type="text/css" href="blog.css" />
            <script src="blog.js"></script>
            
            <?php
                require 'connection.php';
            ?>
            
            <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        </head>
	
    <body>
        
        <header>        
                
            <div class="container">
                <div class="top">
                    <img id="logo" style="display: block;" src="https://i.imgur.com/EAk3f8z.jpg" alt=""/>
                </div>
            </div>
            <br/>                  
            <div class="navigation">
                <ul class="nav">
                    <li><a href="main.php">Blog</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="loginregistrate.php">Login/Registrate</a></li> <!--dropdown login & registreren??-->
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            
        </header>
    
