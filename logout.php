<?php
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['reg']);
    header("Location:index.php");
?>