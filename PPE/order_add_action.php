<?php
require_once("class/Workorder.php");


$cost=$_POST['cout'];
$date=date("Y/m/d");
$km=$_POST['km'];
$statue=$_POST['statue'];
$descri=$_POST['descri'];



$Car = new Workorder();

	$Car->_cout = $cost;
	$Car->_date = $date;
  $Car->_km=$km;
  $Car->_statue=$statue;
  $Car->_descri=$descri;


	$Car->ajouter();
	header("location: workorder_list.php")
?>
