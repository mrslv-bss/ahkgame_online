<?php
    session_start();
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (empty($login) or empty($password)) { exit ("You have not entered the required data, please fill in all fields!"); }
    
	// prepare entered data
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);

    include ("connect.php");
    $result = mysqli_query($db, "SELECT * FROM s_users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password'])) { exit ("Sorry, but entered login/password is incorrect."); }
    // account exists
	else { if ($myrow['password']==$password) {
        // the passwords is match
        $_SESSION['login']=$myrow['login']; 
        $_SESSION['ID']=$myrow['ID']; 
        echo "Successful authorization! <a href='index.php'>Main page</a>";
		exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>");
    } else { exit ("Sorry, but entered login/password is incorrect."); }
    }
?>