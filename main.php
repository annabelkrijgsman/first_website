<?php
    include 'headermysqli.php';
?>

<br/>
<div class="row">
    <article>
        <div class="left">
              
            <select id="selectcategory" class="button" onchange="selectCategory();">
                <option value=''>Select Category</option>
        
                    <?php
                        
                        if (isset($_GET["cat"])) {
                            $catname = $_GET["cat"];
                        }
                        else {
                            $catname = "";
                        }
                    
                        $sql = "SELECT * FROM Categories";
                        $result = mysqli_query($conn, $sql);
                        $resultcheck = mysqli_num_rows($result);
                        
                        if ($resultcheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $selected = "";
                               
                                if ($catname == $row["ID"]) {
                                    $selected = "selected='selected'";
                                }
                                echo "<option value =" . $row['ID'] . " " . $selected . "> " . $row["Catname"] . " </option> ";
                            }
                        }
                     
                    ?>
                
            </select>
            
            <form action="main.php" method="POST">    
                
                <input class="searchbox" type="text" name="search" placeholder="Search">    
                <button type="sumbit" name="submitsearch" class="button">Search</button>
            
            <?php
            
                if (isset($_POST['submitsearch'])) {
                    $search = $_POST["search"];
                    $sql = "SELECT * FROM Blogposts
                            WHERE Title LIKE '%$search%'
                            OR Post LIKE '%$search%'
                            OR Username LIKE '%$search%'
                            OR Date LIKE '%$search%'";

                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    
                        foreach ($result as $row) {
                            echo "<div class='articles'>
                                <h4 style='color:green'>Your search results</h4>
                                <h3>" . $row['Title'] . "</h3>
                                <p><small>" . $row['Date'] . "</small></p>
                                <a href='readblog.php?id=" . $row["ID"] . "'>Read article..</a>
                                </div>";
                        }   
                }
                
            ?>
                
            </form>
            <br/>								
            <hr/>
            <br/>

                <?php
                    //SELECT ARTICLES FROM DATABASE                          
                    if (strlen($catname) > 0) {
                        $sql = "SELECT * FROM Blogposts
                            LEFT JOIN Blogposts_Categories
                            ON Blogposts.ID = Blogposts_Categories.BlogpostID
                            WHERE Blogposts_Categories.CategoryID = '$catname'
                            ORDER BY date DESC" or die;
                    }
                    else {
                        $sql = "SELECT * FROM Blogposts ORDER BY date DESC" or die;
                        
                    }
                    
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($result);
                    
                    if ($resultcheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='artcilebox'>
                                <h3>" . $row['Title'] . "</a></h3>
                                <p><small>" . $row['Date'] . "</small></p>
                                <a href='readblog.php?id=" . $row["ID"] . "'>Read article..</a>
                                </div><hr/>";
                        }
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
    