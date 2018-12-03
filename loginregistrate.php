<?php
    include 'header.php';
?>
<br/>
    <div class="row">
        <article>
            <div class="left">
                    
                <h2 align="center">Login</h2>
            
                    <form method="post" id="contactblock" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    
                        <label for="uname">Username</label><br/>
                            <input type="text" id="textfield" name="uname" placeholder="Username.." value="<?php echo $uname;?>">
                                <span class="error"><b>* </b><?php echo $unameErr;?></span>
                                <br/>
                        <label for="psw">Password</label><br/>
                            <input type="password" id="textfield" name="psw" placeholder="Password.." value="<?php echo $psw;?>">
                                <span class="error"><b>* </b> <?php echo $pswErr;?></span>
                                <br/>
                        <p><span class="error"><b>* required fields</b></span></p>
                        
                        <input type="submit" class= "button" value="Login">
    
                            <?php
                                require 'loginrequired.php';
                            ?>

                    </form>
                    <hr/>
                    <br/>
                <h2 align="center">Registrate</h2>
                    
                    <form method="post" id="contactblock" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        
                        <label for="uname">Username</label><br/>
                            <input type="text" id="textfield" name="uname" placeholder="Username.." value="<?php echo $uname;?>">
                                <span class="error"><b>* </b><?php echo $unameErr;?></span>
                                <br/>
                        <label for="fname">Firstname</label><br/>
                            <input type="text" id="textfield" name="fname" placeholder="Firstname.." value="<?php echo $fname;?>">
                                <span class="error"><b>* </b><?php echo $fnameErr;?></span>
                                <br/>
                        <label for="lname">Lastname</label><br/>
                            <input type="text" id="textfield" name="lname" placeholder="Lastname.." value="<?php echo $lname;?>">
                                <span class="error"><b>* </b><?php echo $lnameErr;?></span>
                                <br/>
                        <label for="email">Email</label><br/>
                            <input type="text" id="textfield" name="email" placeholder="Email.." value="<?php echo $email;?>">
                                <span class="error"><b>* </b><?php echo $emailErr;?></span>
                                <br/>
                        <label for="psw">Password</label><br/>
                            <input type="password" id="textfield" name="psw" placeholder="Password.." value="<?php echo $psw;?>">
                                <span class="error"><b>* </b> <?php echo $pswErr;?></span>	
                                <br/>
                        <p><span class="error"><b>* required fields</b></span></p>
                        
                            <input type="submit" class= "button" value="Registrate">
    
                                <?php
                                    require 'registraterequired.php';
                                    require 'userindatabase.php';
                                ?>
                    </form>
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