<?php
    session_start();
    unset($_SESSION['password']);
    unset($_SESSION['login']);
    unset($_SESSION['ID']);
    exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>");
?>
