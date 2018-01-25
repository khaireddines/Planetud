<?php
session_start();
if(!isset($_SESSION['session_user']) ) header("Location:index.php");
?>
