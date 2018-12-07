<?php
    include 'headermysqli.php';
    //echo "<pre>";
    //var_dump($_SESSION);
    //echo "</pre>";
?>

<br/>
<div class="row">
    <article>
        <div class="left">
            
            <?php
            
                //SIGN UP ERRORS
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
                
                    elseif (isset($_GET['signup']) && $_GET["signup"] == "success") {
                        echo '<p style="color:green">Thanks for signing up, please login</p>';
                    }
                
                //ARTICLE TABLE
                if (isset($_SESSION['userID'])) {
                    echo '<h2 align="center">Articles</h2>';
                    echo '<table>';   
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Username</th>';
                    echo '<th>Title</th>';
                    echo '<th>Post</th>';
                    echo '<th>Date</th>';
                    echo '<th>Action</th>';
                    echo '</tr>';
                    echo '</thead>';
                            
                $sql = "SELECT * FROM Blogposts ORDER BY date DESC";
                    
                $result = mysqli_query($conn, $sql);
                    foreach ($result as $row) {
                        echo '<tbody>';        
                        echo '<tr>';
                        echo '<td>' . $row['Username'] . '</td>';
                        echo '<td>' . $row['Title'] . '</td>';
                        echo '<td class="post">' . $row['Post'] . '</td>';
                        echo '<td>' . $row["Date"] . '</td>';
                        echo '<td><a class="button" href="editpost.php?id=' . $row["ID"] . '">Edit</a>  <a class="button" href="editpost.php?id=' . $row["ID"] . '&delete=' . $row["ID"] . '">Delete</a></td>';
                        echo '</tr>';
                        echo '</tbody>';
                    }
                        echo '</table>';
                }
                
                //LOGIN
                else {
                    echo '<h2 align="center">Login</h2>';
                    echo '<form method="post" id="contactblock" action="login.php">';
                    echo '<label for="uname">Username</label><br/>';
                    echo '<input type="text" class="textfield" name="email" placeholder="Username.."><br/>';    
                    echo '<label for="psw">Password</label><br/>';        
                    echo '<input type="password" class="textfield" name="pwd" placeholder="Password.."><br/>';
                    echo '<button type="submit" name="loginsubmit" class="button">Login</button>';
                    echo '</form>';
                }
            
                //ADD NEW CATEGORY 
                $category = "";
                    
                if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST["newcat"])) {	
                        $category = $_POST["newcat"];
                
                    $sql = "INSERT INTO Categories (Catname) " .
                   "VALUES ('$category')";
                        
                    $result = mysqli_query($conn, $sql);
                    echo "<script>document.location.href='loginsignup.php?catsave=yes';</script>"; die();
                }
            
                include_once 'requiredfields.php';
            
                //ADD NEW CATEGORY FORM
                if (isset($_SESSION['userID'])) {
                        echo '<h2 align="center">Write artcile</h2>';
                        echo '<form method="post" id="contactblock" action="">';
                        echo '<input type="text" class="textfield" name="newcat" placeholder="Add a new category.." value="">';
                        echo '<input type="submit" class= "button" value="Save"><br/>';
                        echo '</form>';
                        echo '<p>Choose article category:</p>';
                        echo '<form method="post" id="contactblock" action="">';
                        
                //SELECT CATEGORY                
                    $sql = "SELECT * FROM Categories";
                                
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $row) {
                        
                        echo "<input type='checkbox' name='catname[]' value=" . $row["ID"] . "> " . $row["Catname"] . " <br/> ";
                    }
                
            ?>
                <!--WRITE ARTICLE-->
                    <br/>
                    <div class="contactcolumn">
                    
                    <label for="fname">Username</label><br/>
                    <input type="text" class="textfield" name="name" placeholder="Your username.." value="<?php echo $name;?>">
                    <span class="error"><b>* </b><?php echo $nameErr;?></span><br/><br/>
                    <label for="title">Article title</label><br/>
                    <input type="text" class="textfield" name="title" placeholder="Your article title.." value="<?php echo $title;?>">
                    <span class="error"><b>* </b> <?php echo $titleErr;?></span><br/><br/>
                    <label for="article">Article</label><br/>
                    <textarea class="textfield" name="subject" rows="10" cols="40" placeholder="Write your article.."><?php echo $comment;?></textarea>
                    <span class="error"><b>* </b> <?php echo $commentErr;?></span>
                                    
            <?php                            
                
                    echo '<span class="error">';
                    echo '<p><b>* required fields</b></p>';
                    echo '</span>';
                    echo '<input type="submit" class= "button" value="Save"><br/>';
                    echo '</form>';
                    echo '</div>';
            
                }
                
                //SIGN UP
                else {
                    echo '<h2 align="center">Sign Up</h2>';
                    echo '<form method="post" id="contactblock" action="signup.php">';
                    echo '<label for="uname">Username</label><br/>';
                    echo '<input type="text" id="uname" class="textfield" name="uname" placeholder="Username.."><br/>';
                    echo '<label for="email">Email</label><br/>';
                    echo '<input type="text" id="email" class="textfield" name="email" placeholder="Email.."><br/>';
                    echo '<label for="psw">Password</label><br/>';
                    echo '<input type="password" id="pwd" class="textfield" name="pwd" placeholder="Password.."><br/>';
                    echo '<label for="psw">Repeat password</label><br/>';
                    echo '<input type="password" id="pwdrepeat" class="textfield" name="pwdrepeat" placeholder="Repeat password.."><br/>';
                    echo '<select name="groupname" class="button">';
                    echo '<option value="">Select group</option>';
                 
                    //SELECT USERGROUP   
                    $sql = 'SELECT * FROM Usergroups';
                    $result = mysqli_query($conn, $sql);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value=' . $row["ID"] . '>' . $row["Groupname"] . '</option>';
                    }
                                    
                                    
                    echo '</select><br/>';
                    echo '<button type="submit" name="signupsubmit" class="button">Sign Up</button>';
                    echo '</form>';
                }
                
                
                include 'blogindatabase.php';
                
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