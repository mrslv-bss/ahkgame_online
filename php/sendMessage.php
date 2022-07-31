<?php 
    include("connect.php");
    session_start();
    header("Content-type: text/html; charset=UTF-8");
    if (empty($_SESSION['login']) or empty($_SESSION['ID'])) { echo "Guest access"; }
	else { echo "Session is active. "; 
	if($_POST['message'] != '' && $_POST['playername'] != ''){

		$playername = $_POST['playername'];
		$playername = addslashes($playername);
		$playername = htmlspecialchars($playername);
		$playername = stripslashes($playername);
		$playername = mysqli_real_escape_string($db, $playername);
		
		$message = $_POST['message'];
		$message = addslashes($message);
		$message = htmlspecialchars($message);
		$message = stripslashes($message);
		$message = mysqli_real_escape_string($db, $message);

		$date = date("Y:m:d h:i:s");
		$result = mysqli_query($db, "INSERT INTO actionlogs (playername, message, date) VALUES ('$playername', '$message', '$date')");
		
		if($result == true){
			echo "Sent."; 
			exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.html'></head></html>");
		}else{
			echo "Send error. DB issue."; 
			exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.html'></head></html>");
		}
	}else{ echo "Data is missing. Error."; }
    }
?>