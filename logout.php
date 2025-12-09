<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['profile_pic']);
unset($_SESSION['name']);
unset($_SESSION['email']);
header("Location: suman.php");
exit;
?>
