<?php
require_once('verifier_access.php');
require_once("../../class/Car.php");
$cat = new Car();

$cat->supprimer($_REQUEST['id']);
header("Location: Car_list.php");
?>
