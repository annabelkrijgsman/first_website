<?php
    include 'headermysqli.php';
?>

<br/>
<div class="row">
    <article>
        <div class="left">

            <?php
                                          
                    //READ THE ARTICLE YOU CLICKED ON 
                    $readid = 0;
                
                    if (isset($_GET["id"])) {
                        $readid = $_GET["id"];
                    }
                    
                    if ($readid > 0) {
                        $sql = "SELECT * FROM Blogposts WHERE ID = " . $readid;
                        $result = mysqli_query($conn, $sql);
                        $id = mysqli_fetch_assoc($result);
                        
                        $name = $id["Username"];
                        $title = $id["Title"];
                        $comment = $id["Post"];
                        
                        foreach ($result as $row) {
                            echo '<div class="articlebox">';
                            echo '<h3>' . $row["Title"] . '</a></h3>';
                            echo '<p>' . $row["Post"] . '</p>';
                            echo "<p><small>Author: <u><a href='readblog.php?id=" . $row["ID"] . "&showUser=" . $row["Username"] . "'>" . $row['Username'] . "</a></u></small></p>";
                            echo '<p><small>Date: ' .$row["Date"] . '</small></p>';
                            echo '</div><hr/><br/>';
                        }
                    }

                    //COMMENT ONLY WHEN LOGGED IN WORKS - DOESN'T SEND IT TO DATABASE AND BACK INTO THE PAGE YET
                    if (isset($_SESSION['userID']) && $_SESSION["userGroup"] > 0) {
                        echo '<form method="post" id="contactblock" action="">';
                        echo '<label for="uname">Username</label><br/>';
                        echo '<input type="text" class="textfield" name="uname" placeholder="Username"><br/>';
                        echo '<label for="comment">Leave a comment</label><br/>';
                        echo '<textarea class="textfield" rows="10" cols="40" name="comment" placeholder="Comment.."></textarea><br/>';
                                
                    //ONLY SHOW ANONYMOUS OPTION WHEN LOGGED IN AS BLOGGER WORKS - DOESN'T DO ANYTHING YET        
                    //    if ($_SESSION["userGroup"] == 1) {
                    //        echo '<input type="checkbox" name="anonymous[]" value=' . $row["anonymous"] . '>Anonymous<br/>
                        echo '<button type="submit" name="submitcomment" class="button">Submit</button>';
                        echo '</form>';
                        
                        //}
                    }
                    else {
                        echo '<h4 style="color:red">Please login to leave a comment</h4>';
                    }
                    
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