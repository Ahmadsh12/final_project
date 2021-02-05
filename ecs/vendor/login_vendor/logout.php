<?php
session_start();
unset($_SESSION['v_id']);

header("location:../../index.php");
?>