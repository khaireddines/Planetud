<?php
require_once("Mysql.php");
class Car extends Mysql
{
	// Les attributs priv�s
	private $_id;
	private $_statue;
	private $_whom;
	private $_time;
	private $_type;

	// M�thode magique pour les setters & getters
	public function __get($attribut) {
		if (property_exists($this, $attribut))
                return ( $this->$attribut );
        else
			exit("Erreur dans la calsse " . __CLASS__ . " : l'attribut $property n'existe pas!");
    }

    public function __set($attribut, $value) {
        if (property_exists($this, $attribut)) {
            $this->$attribut = (mysqli_real_escape_string($this->get_cnx(), $value)) ;
        }
        else
        	exit("Erreur dans la calsse " . __CLASS__ . " : l'attribut $property n'existe pas!");
    }

	public function details($id)
	{
		$q = "SELECT * FROM vehicle WHERE id ='$id'";
		$res = $this->requete($q);
		$row = mysqli_fetch_array( $res);
		$veh = new Car();

		$veh->_id 			= $row['id'];
		$veh->_statue 		= $row['statue'];
		$veh->_whom 		= $row['whom'];
		$veh->_time	= $row['time'];
		$veh->_type	= $row['type'];

		return $veh;
	}


	public function liste()
	{
		$q = "SELECT * FROM vehicle ORDER BY id";
		$list_use = array(); // Tableau VIDE
		$res = $this->requete($q);
		while($row = mysqli_fetch_array( $res)){
			$veh = new Car();

			$veh->_id 			= $row['id'];
			$veh->_statue 		= $row['statue'];
			$veh->_whom 		= $row['whom'];
			$veh->_time	= $row['time'];
			$veh->_type	= $row['type'];

			$list_veh[]=$veh;
		}

		return $list_veh;
	}

	public function ajouter()
	{
	    $q = "INSERT INTO vehicle(id, statue, whom, time,type) VALUES
	  		(  NULL			, '$this->_statue'		,
			  '$this->_whom'	, '$this->_time','$this->_type'
			)";
		$res = $this->requete($q);
		return mysqli_insert_id($this->get_cnx());
	}
	public function modifier(){
		$q = "UPDATE vehicle SET
				type 	= '$this->_type',
				time = '$this->_time' ,
				whom = '$this->_whom',
				statue='$this->_statue'

				WHERE id = '$this->_id' ";

		$res = $this->requete($q);
		return $res;
	}


	public function supprimer($id){
		$q = "DELETE FROM vehicle WHERE id= '$id'";
		$res = $this->requete($q);
		return $res;
	}
	public function som()
	{$q = "SELECT * FROM vehicle ";
$res = $this->requete($q);

return $res->num_rows;



	}
}
?>
