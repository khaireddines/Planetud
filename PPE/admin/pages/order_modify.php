<?php
require_once("../../class/Workorder.php");

$id=$_GET['id'];
$statue=$_POST['statue'];


	$wor = new Workorder();


  $wor->_statue=$statue;


	 	// Ajout
		$wor->modify($id);


	header("Location: workorder_list.php");


?>
