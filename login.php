<?php

$host = "localhost";
$user_name = "root";
$pass_word = "";
$db = "Blog";

// CREATE CONNECTION
$conn = mysqli_connect($host, $user_name, $pass_word, $db);

    // CHECK CONNECTION
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
if (isset($_POST['loginsubmit'])) {
    
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    
    if (empty($email) || empty($pwd)){
        header("Location: loginsignup.php?error=emptyfields");
        exit();        
    }
    else {
        $sql = "SELECT * FROM Users LEFT JOIN Users_Usergroup ON Users.ID = Users_Usergroup.UserID WHERE Username=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: loginsignup.php?error=sqlerror");
        exit();            
        }
        else {
            
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdcheck = password_verify($pwd, $row['Password']);
                if ($pwdcheck == false) {
                    header("Location: loginsignup.php?error=wrongpwd");
                    exit();                        
                }
                elseif ($pwdcheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row['ID'];
                    $_SESSION['userUsername'] = $row['Username'];
                    $_SESSION['userGroup'] = $row['GroupID'];
                    header("Location: loginsignup.php?login=succes");
                    exit();
                }
                else {
                    header("Location: loginsignup.php?error=wrongpwd");
                    exit();                     
                }
            }
            else {
                header("Location: loginsignup.php?error=nouser");
                exit();                
            }
            
        }
    }
    
}   
    else {
        header("Location: loginsignup.php");
        exit();
    }


?>