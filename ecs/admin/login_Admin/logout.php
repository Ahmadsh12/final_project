<?php
session_start();
unset($_SESSION['id']);
header("location:Login_ad.php");

?>