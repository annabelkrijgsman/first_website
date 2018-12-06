<?php
    include 'headermysqli.php';
?>

<br/>
<div class="row">
    <article>
        <div class="left">
            
            <?php
                //SIGN UP ERRORS WORKS
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p style="color:red">Please fill in all fields</p>';
                    }
                    elseif ($_GET["error"] == "invalidmailuname") {
                        echo '<p style="color:red">Invalid username and email</p>';
                    }
                    elseif ($_GET["error"] == "invalidmail") {
                        echo '<p style="color:red">Invalid email</p>';
                    }
                    elseif ($_GET["error"] == "invaliduname") {
                        echo '<p style="color:red">Invalid username</p>';
                    }
                    elseif ($_GET["error"] == "passwordcheck") {
                        echo '<p style="color:red">Your passwords don\'t match</p>';
                    }
                    elseif ($_GET["error"] == "usertaken") {
                        echo '<p style="color:red">Username is already taken</p>';
                    }
                }
                //NOTICE
                    elseif ($_GET["signup"] == "success") {
                        echo '<p style="color:green">Thanks for signing up, please login</p>';
                    }
                
            ?>
            
            <?php
                //ARTICLE TABLE WORKS
                if (isset($_SESSION['userID'])) {
                    echo '<h2 align="center">Articles</h2>';	
            
                        echo "<table>";
                            
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Username</th>";
                        echo "<th>Title</th>";
                        echo "<th>Post</th>";
                        echo "<th>Date</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                            
                            $sql = "SELECT * FROM Blogposts ORDER BY date DESC";
                            
                            $result = mysqli_query($conn, $sql);
                            foreach ($result as $row) {
                        
                                echo "<tbody>";        
                                echo "<tr>";
                                echo "<td>" . $row['Username'] . "</td>";
                                echo "<td>" . $row['Title'] . "</td>";
                                echo "<td class='post'>" . $row['Post'] . "</td>";
                                echo "<td>" . $row['Date'] . "</td>";
                                echo "<td><a class='button' href='editpost.php?id=" . $row["ID"] . "'>Edit</a>  <a class='button' href='editpost.php?id=" . $row["ID"] . "&delete=" . $row["ID"] . "'>Delete</a></td>";
                                echo "</tr>";
                                echo "</tbody>";
                            
                            }
                        
                        echo "</table>";
                        echo "</table>";
                }
                //LOGIN WORKS
                else {
                    echo '<h2 align="center">Login</h2>
                    
                        <form method="post" id="contactblock" action="login.php">
                        
                            <label for="uname">Username</label><br/>
                            <input type="text" class="textfield" name="email" placeholder="Username..">
                            <br/>
                            <label for="psw">Password</label><br/>
                            <input type="password" class="textfield" name="pwd" placeholder="Password..">
                            <br/>
                            <button type="submit" name="loginsubmit" class="button">Login</button>
                            
                        </form>';
                }
            ?>
            
            <?php
            
                //ADD NEW CATEGORY WORKS
                $category = "";
                    
                if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST["newcat"])) {	
                        $category = $_POST["newcat"];
                
                    $sql = "INSERT INTO Categories (Catname) " .
                   "VALUES ('$category')";
                        
                    $result = mysqli_query($conn, $sql);
                    echo "<script>document.location.href='loginsignup.php?catsave=yes';</script>"; die();
                }
            
            ?>
            
            <?php
            
                include_once 'requiredfields.php';
                //include_once 'blogindatabaseedit.php'; = KAPOT
            
                //WRITE ARTICLE = KAPOT
                if (isset($_SESSION['userID'])) {
                        echo '<h2 align="center">Write artcile</h2>
                        
                                <form method="post" id="contactblock" action="">
                                
                                    <input type="text" class="textfield" name="newcat" placeholder="Add a new category.." value="">
                                    <input type="submit" class= "button" value="Save"><br/>
                                    
                                </form>
                                
                                <p>Choose article category</p>
                                <br/>
                                <br/>';
                                
            
            
                                //CATEGORIES FROM DATABASE TO CHECKBOXES = KAPOT
                                $sql = "SELECT * FROM Categories";
                                            
                                $result = mysqli_query($conn, $sql);
                                foreach ($result as $row) {
                                    
                                    $checked = "";
                                   //NOTICE                        
                                    if (in_array($row["id"], $categoryIDs)) {
                                        $checked = "checked";
                                    }
                                    
                                    echo "<input type='checkbox' name='catname[]' value=" . $row["ID"] . " " . $checked . "> " . $row["Catname"] . " <br/> ";
                                }
            ?>
            
            
                                <br/>
                            <div class="contactcolumn">
            
                    
                                <form method="post" id="contactblock" action="">
                        
                                    <label for="fname">Username</label><br/>
            
                                    <input type="text" class="textfield" name="name" placeholder="Your username.." value="<?php echo $name;?>">
                                    <span class="error"><b>* </b><?php echo $nameErr;?></span>
                                    <br/>
                                    <br/>
                                    <label for="title">Article title</label><br/>
                                    <input type="text" class="textfield" name="title" placeholder="Your article title.." value="<?php echo $title;?>">
                                    <span class="error"><b>* </b> <?php echo $titleErr;?></span>	
                                    <br/>
                                    <br/>
                                    <label for="article">Article</label><br/>
                                    <textarea class="textfield" name="subject" rows="10" cols="40" placeholder="Write your article.."><?php echo $comment;?></textarea>
                                    <span class="error"><b>* </b> <?php echo $commentErr;?></span>
            <?php                            
                        echo           '<p>
                                            <span class="error">
                                                <b>* required fields</b>
                                            </span>
                                        </p>
                                        
                                        <input type="submit" class= "button" value="Save"><br/>
                                </form>                
                            </div>';
            
                }

                //SIGN UP WORKS
                else {
                    echo '<h2 align="center">Sign Up</h2>
            
                                <form method="post" id="contactblock" action="signup.php">
                                
                                    <label for="uname">Username</label><br/>
                                    <input type="text" id="uname" class="textfield" name="uname" placeholder="Username..">
                                    <br/>
                                    <label for="email">Email</label><br/>
                                    <input type="text" id="email" class="textfield" name="email" placeholder="Email..">
                                    <br/>
                                    <label for="psw">Password</label><br/>
                                    <input type="password" id="pwd" class="textfield" name="pwd" placeholder="Password..">	
                                    <br/>
                                    <label for="psw">Password</label><br/>
                                    <input type="password" id="pwdrepeat" class="textfield" name="pwdrepeat" placeholder="Repeat password..">	
                                    <br/>
                                    
                                    <button type="submit" name="signupsubmit" class="button">Sign Up</button>
                                    
                                </form>';
                    }
                
                ?>
            
                <?php
                    //include 'blogindatabase.php'; = KAPOT
                ?>
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