<?php
require_once('verifier_access.php');
require_once("../../class/User.php");
$cat = new User();

$cat->supprimer($_REQUEST['id']);
header("Location: user_list.php");
?>
