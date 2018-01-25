<?php
require_once("../../class/User.php");


$login=$_POST['login'];
$pw=$_POST['pw'];
$name=$_POST['name'];
$type=$_POST['type'];


	$use = new User();

	$use->_login = $login;
	$use->_pw = $pw;
  $use->_name=$name;
  $use->_type=$type;


	 	// Ajout
		$use->ajouter();


	header("Location: User_list.php");


?>
