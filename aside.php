<img alt="" class="img-circle" widht="200px" height="230px" src="https://i.imgur.com/d0x1Ip5.jpg">

<?php
    //SHOW BLOGGER PROFILE WHEN YOU CLICK ON THE NAME
    $readid = 0;
    
    $showUser = "";           
    if (isset($_GET["showUser"])) {
        $showUser = $_GET["showUser"];
    }
    
    if (strlen($showUser) > 0) {
        $sql = "SELECT * FROM Users WHERE Username = '" . $showUser . "'";
        $result = mysqli_query($conn, $sql);
        $id = mysqli_fetch_assoc($result);
        
        $name = $id["Username"];
        
        foreach ($result as $row) {
            echo "
            <h3>" . $row['Username'] . "</a></h3>";
    //WANT TO ADD AN OPTION FOR BLOGGERS TO MAKE A PROFILE THEMSELFS, WHICH WILL BE SHOWN OVER HERE. FOR NOW IT JUST SHOWS THEIR USERNAME
    
        }
    }
    else {
        echo 
        //ELSE SHOW THIS
        '<h2>Introduction</h2>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
            Aenean commodo ligula eget dolor.
            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
            Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.<br/>
            <br/>
            <hr/>
        <h2>Skills</h2>
            <img class="icon" src="https://i.imgur.com/hBkkjFo.png" alt=""/>
            <img class="icon" src="https://i.imgur.com/7alj1xg.png" alt=""/>
            <img class="icon" src="https://i.imgur.com/7Pxm9cu.png" alt=""/>
            <img class="icon" src="https://i.imgur.com/TAua3Ny.png" alt=""/>
            <br/>
            <hr/>
        <h2>Portfolio Projects</h2>
            <ul>
                <li><a href="#">Project 1</a></li>
                <li><a href="#">Project 2</a></li>
                <li><a href="#">Project 3</a></li>
            </ul>
            <br/>
            <hr/>
            
    <div class="socialicons">
        <h2>Social Media</h2>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
               <a href="https://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
               <a href="https://www.twitter.com" target="_blank" class="fa fa-twitter"></a>
               <a href="https://www.linkedin.com" target="_blank" class="fa fa-linkedin"></a>
               <a href="https://www.youtube.com" target="_blank" class="fa fa-youtube"></a>
               <a href="https://www.pinterest.com" target="_blank" class="fa fa-pinterest"></a>
    </div>';
  }  
?>