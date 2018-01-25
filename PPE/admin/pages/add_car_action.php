<?php
require_once("../../class/Car.php");

@$id=$_GET['id'];
@$type=$_POST['type'];
$time=date("Y/m/d");
@$whom=$_POST['whom'];
@$statue=$_POST['statue'];


if( !empty($type) && !empty($whom) )
{	$Car = new Car();

	$Car->_type = $type;
	$Car->_time = $time;
  $Car->_whom=$whom;
  $Car->_statue=$statue;



	 	if( empty($id) )
		{
		$Car->ajouter();
		}
		else
		{
			$car->_id = $id;
			$car->modifier();
		}

}

	header("Location: Car_list.php");


?>
