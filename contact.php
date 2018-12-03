<?php
    include 'header.php';
?>
<br/>
    <div class="row">
        <article>
            <div class="left">
                    
        <div class="form">
            
            <h2 align="center">Contact me</h2><br/>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="contactblock" onsubmit="return validate()">
                <label for="fname">First Name</label><br/>
                    <input type="text" id="textfield" name="firstname" placeholder="Your name.." value="<?php echo $firstname;?>">
                        <br/>
                <label for="lname">Last Name</label><br/>
                    <input type="text" id="textfield" name="lastname" placeholder="Your last name.." value="<?php echo $lastname;?>">
                        <br/>
                <label for="email">E-mail</label><br/>
                    <input type="text" id="textfield" name="email" placeholder="Your e-mail address.." value="<?php echo $emailfrom;?>">
                        <br/>
                <label for="msg">Message</label><br/>
                    <textarea id="textfield" name="message" placeholder="Message.." style="height:170px" value="<?php echo $message;?>"></textarea>
                        <br/>
                         <?php
                            require 'contactfile.php';
                            require 'captcha.php';
                        ?>
                    <br/>
                    <br/>
                    <input type="submit" class= "button" value="Send"><br/>
                    
            </form>
        </div>

            </div>
        </article>
        
        <aside>

            <?php
                include 'aside.php';
            ?>

        </aside>
       <br/>
      <br/>
    </div>

<?php
    include 'footer.php';
?>