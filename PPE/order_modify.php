<?php
require_once("class/Workorder.php");
require_once("class/Task.php");
require_once("verifier_access.php");
$id=$_GET['id'];
$statue="done";


	$wor = new Workorder();
	$tas=new Task();
	$tas->supprimer($_SESSION['id']);

  $wor->_statue=$statue;


	 	// Ajout
		$wor->modify($id);


	header("Location: take_it.php");


?>
