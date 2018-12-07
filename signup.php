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

if (isset($_POST['signupsubmit'])) {

    $username = $_POST['uname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    
        if (empty($username) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
            header("Location: loginsignup.php?error=emptyfields&uname=".$username."&email=".$email);
            exit();
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: loginsignup.php?error=invalidmailuname");
            exit();   
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: loginsignup.php?error=invalidmail&uname=".$username);
            exit();
        }
        elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: loginsignup.php?error=invaliduname&email=".$email);
            exit();
        }
        elseif ($pwd !== $pwdrepeat) {
            header("Location: loginsignup.php?error=passwordcheck&uname=".$username."&email=".$email);
            exit();
        }
        else {
            
            $sql = "SELECT Username FROM Users WHERE Username=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: loginsignup.php?error=sqlerrorexist");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultcheck = mysqli_stmt_num_rows($stmt);
                if ($resultcheck > 0) {
                    header("Location: loginsignup.php?error=usertaken&email=".$email);
                    exit();
                }
                else {
                    //$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //
                    //$sql = "INSERT INTO Users (Username, Email, Password) VALUES ('" . $username . "', '" . $email . "', '" . $hashedPwd . "')";
                    //mysqli_query($conn, $sql);
                    //
                    //$userid = mysqli_insert_id($conn);
                    //$sql2 = "INSERT INTO Users_Usergroup (UserID, GroupID) VALUES (" . $userid . ", " . $_POST['groupname'] . ")";
                    ////echo $sql2;
                    //mysqli_query($conn, $sql2);
                    //
                    //header("Location: loginsignup.php?signup=success");
                    
                    $sql = "INSERT INTO Users (Username, Email, Password) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: loginsignup.php?error=sqlerror");
                        exit(); 
                    }
                    else {
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                        
                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        
                        $userid = mysqli_insert_id($conn);
                        
                        $sql2 = "INSERT INTO Users_Usergroup (UserID, GroupID) VALUES (" . $userid . ", " . $_POST['groupname'] . ")";
                        
                        mysqli_query($conn, $sql2);
                        
                        //IF BLOGGER SENT TO LOGINSIGNUP, IF VISITOR SENT TO (YET TO BUILT) WELCOME PAGE OR SOMETHING
                                                
                        header("Location: loginsignup.php?signup=success");
                        exit();
                    }
                }
            }
            
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
    }
            else {
                header("Location: loginsignup.php");
                exit();
            }
            
?>