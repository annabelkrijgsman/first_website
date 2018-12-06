<?php   
    include 'headermysqli.php';
?>

<?php

if (!isset($_SESSION['userID'])) {
    header ("Location: loginsignup.php?error=unvalid");
}

?>

<br/>
<div class="row">
    <article>
        <div class="left">
            
            <h2 align="center">Edit articles</h2>
                
                <?php		
                
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
                            echo "<td><a class='button' href='editpost.php?id=" . $row["ID"] . "'>Edit</a>  <a class='button' href='loginsignup.php?id=" . $row["ID"] . "&delete=" . $row["ID"] . "'>Delete</a></td>";
                            echo "</tr>";
                            echo "</tbody>";
                        
                        }
                    
                    echo "</table>";
                    echo "</table>";
                    
                ?>

            <br/>
            <hr/>
            <h2 align="center">Edit your artcile</h2>
            
                <form method="post" id="contactblock" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="text" id="textfield" name="newcat" placeholder="Add A new category.." value="">
                                            
                        <?php
                        
                        $category = "";
                            
                        if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST["newcat"])) {	
                                $category = $_POST["newcat"];
                        
                            $sql = "INSERT INTO Categories (Catname) " .
                           "VALUES ('$category')";
                                
                            $connection->exec($sql);
                            echo "<script>document.location.href='editblog.php?catsave=yes';</script>"; die();
                        }
                            
                        ?>
            
                    <input type="submit" class= "button" value="Save"><br/>
                </form>
                <br/>
                <div class="contactcolumn">
                    
                    <form method="post" id="contactblock" action="">
                    
                        <?php
                            require 'requiredfields.php';
                            
                            $editid = 0;
                        
                            if (isset($_GET["id"])) {
                                $editid = $_GET["id"];
                            }
                            
                            if ($editid > 0) {
                                $sql = "SELECT * FROM Blogposts WHERE ID = " . $editid;
                                $result = mysqli_query($conn, $sql);
                                $editblog = mysqli_fetch_assoc($result);
                                
                                $name = $editblog["Username"];
                                $title = $editblog["Title"];
                                $comment = $editblog["Post"];
                                
                                $sql = "SELECT CategoryID FROM Blogposts_Categories WHERE BlogpostID = " . $editid;
                                $result = mysqli_query($conn, $sql);
                                
                                $categoryIDs = [];
                                foreach ($result as $row) {
                                    $categoryIDs[] = $row["CategoryID"]; 
                                }
                            }
                        ?>
                    
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
                    
                            <p>
                                <span class="error">
                                    <b>* required fields</b>
                                </span>
                            </p>
                
                            <p>Choose article category</p>
                
                            <?php 
                            
                                $sql = "SELECT * FROM Categories";
                                
                                $result = mysqli_query($conn, $sql);
                                foreach ($result as $row) {
                                    $checked = "";
                                    
                                    if (in_array($row["ID"], $categoryIDs)) {
                                        $checked = "checked";
                                    }
                                    
                                    echo "<input type='checkbox' name='catname[]' value=" . $row["ID"] . " " . $checked . "> " . $row["Catname"] . " <br/> ";
                                }		
                             
                            ?>
                            <br/>
                            <br/>
                        
                            <!-------------CAPTCHA DOESN'T WORK PROPERLY YET------------>
                        
                            <?php
                                require 'captcha.php';
                                require 'blogindatabaseedit.php';
                            ?>
                    
                            <br/>
                            <br/>
                        <input type="submit" class= "button" value="Submit"><br/>
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