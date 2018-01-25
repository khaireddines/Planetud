<?php
require_once("verifier_access.php");
require_once("./class/Workorder.php");
require_once("./class/Task.php");
$id=$_GET['id'];
$statue="in progress";
$idworker=$_SESSION['id'];

	$wor = new Workorder();
	$tas=new Task();
	$tas->_idwork=$id;
	$tas->_idworker=$idworker;

	$tas->ajouter();









  $wor->_statue=$statue;


	 	// Ajout
		$wor->modify($id);



	header("Location: take_it.php");


?>
