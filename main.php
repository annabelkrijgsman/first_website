<?php
    include 'header.php';
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
                            
                            $result = $connection->query($sql);
                                foreach ($result as $row)	{
                                    $selected = "";
                                    
                                    if ($catname == $row["ID"]) {
                                        $selected = "selected='selected'";
                                    }
                                    echo "<option value =" . $row['ID'] . " " . $selected . "> " . $row["Catname"] . " </option> ";
                                }
                         
                        ?> 				 				
                </select>
                
                <form action="search.php" method="POST">    
                    
                    <input class="searchbox" type="text" name="search" placeholder="Search">    
                    <button type="sumbit" name="submitsearch" class="button">Search</button>
                    
                    
                </form>
                
                <br/>								
                <hr/>
                <br/>

                        <?php
                            
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
                            
                            $result = $connection->query($sql);
                                foreach ($result as $row) {
                                    echo "<div class='artcilebox'>
                                    <p>Author: " . $row['Username'] ."</p>
                                    <h3>" . $row['Title'] . "</h3>
                                    <p>" . $row['Post'] . "</p>
                                    <p>" . $row['Date'] . "</p>
                                    </div><hr/>";
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
    