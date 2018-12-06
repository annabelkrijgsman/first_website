<?php
    include 'headermysqli.php';
?>

<br/>
<div class="row">
    <article>
        <div class="left">

            <?php
                                          
                    //READ THE ARTICLE YOU CLICKED ON - WORKS      
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
                            echo "<div class='artcilebox'>
                            
                                    <h3>" . $row['Title'] . "</a></h3>
                                    <p>" . $row['Post'] . "</p>
                                    <p><small>Author: <a href='readblog.php?id=" . $row["ID"] . "'>" . $row['Username'] . "</a></small></p>
                                    <p><small>Date: " . $row['Date'] . "</small></p>
                                    
                                  </div><hr/>";
                        }
                    }

                    //COMMENT ONLY WHEN LOGGED IN WORKS - DOESN'T SEND IT TO DATABASE AND BACK INTO THE PAGE YET
                    if (isset($_SESSION['userID'])) {
                        echo
                           '<form method="post" id="contactblock" action="">
                        
                                <label for="comment">Leave a comment</label><br/>
                                <textarea class="textfield" rows="10" cols="40" name="comment" placeholder="Comment.."></textarea><br/>
                                <button type="submit" name="submitcomment" class="button">Submit</button>
                                
                            </form>';
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