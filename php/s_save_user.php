<?php
    // fill the $login variable by user's login
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    
	// fill the $password variable by user's password
    if (empty($login) or empty($password)) { exit ("You have not entered the required data, please fill in all fields!"); }
    
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    
    $login = trim($login);
    $password = trim($password);
    
    include('connect.php'); 
    // is user exists check
    $result = mysqli_query($db, "SELECT id FROM s_users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);

    if (!empty($myrow['id'])) { exit ("Sorry, but this login is busy. Enter another one."); }
    // if not exists, save one
    $result2 = mysqli_query ($db, "INSERT INTO s_users (login,password) VALUES('$login','$password')");
    
    if ($result2=='TRUE') { echo "Successful registration! Now you can authorize to the admin panel. <a href='index.php'>Main page</a>"; }
    else { echo "Error! You are not registered."; }
?>