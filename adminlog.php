<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['adminname']);
unset($_SESSION['role']);
header("Location: admin.php");
exit;
?>