<?php
session_start();
unset($_SESSION['p_id']);
unset($_SESSION['cart']);


header("location:../index.php");
?>