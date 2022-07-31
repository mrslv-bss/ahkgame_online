<?php session_start(); ?>
<html>
<head>
<title>AHk Game</title>
</head>
<body>
<h2>AHk Game Authorization</h2>
<form action="s_testreg.php" method="post">

<p>
<label>Your login:<br></label>
<input name="login" type="text" id="login" size="15" maxlength="15">
</p>

<p>
<label>Password:<br></label>
<input name="password" type="password" id="password" size="15" maxlength="15">
</p>

<p>
<input type="submit" name="submit" value="Sign In" id="send">
<br>
<br>
<a href="s_reg.php">Sign Up</a> 
</p></form>
<br>
<?php
    if (empty($_SESSION['login']) or empty($_SESSION['ID'])) { echo "Logged as guest."; }
    else { echo "Logged as ".$_SESSION['login']."<br><a  href='index.html'>Admin panel</a>";
    echo "<br><a href='exit.php'>Sign Out.</a>"; }
?>
</body>
</html>