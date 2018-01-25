<?php
require_once("Mysql.php");
class Workorder extends Mysql
{
	// Les attributs priv�s
	private $_id;
	private $_descri;
	private $_km;
	private $_date;
	private $_cout;
	private $_statue;

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
		$q = "SELECT * FROM workorder WHERE id ='$id'";
		$res = $this->requete($q);
		$row = mysqli_fetch_array( $res);
		$veh = new Workorder();

		$veh->_id 			= $row['id'];
		$veh->_descri 		= $row['descri'];
		$veh->_km 		= $row['km'];
		$veh->_date	= $row['date'];
		$veh->_cout	= $row['cout'];
		$veh->_statue	= $row['statue'];

		return $veh;
	}


	public function liste()
	{
		$q = "SELECT * FROM workorder ORDER BY id";
		$list_use = array(); // Tableau VIDE
		$res = $this->requete($q);
		while($row = mysqli_fetch_array( $res)){
			$veh = new Workorder();

			$veh->_id 			= $row['id'];
			$veh->_descri 		= $row['descri'];
			$veh->_km 		= $row['km'];
			$veh->_date	= $row['date'];
			$veh->_cout	= $row['cout'];
			$veh->_statue	= $row['statue'];

			$list_veh[]=$veh;
		}

		return $list_veh;
	}

	public function ajouter()
	{
	    $q = "INSERT INTO workorder(id, descri, km, date,cout,statue) VALUES
	  		(  NULL			, '$this->_descri'		,
			  '$this->_km'	, '$this->_date','$this->_cout','$this->_statue'
			)";
		$res = $this->requete($q);
		return mysqli_insert_id($this->get_cnx());
	}
	public function modify($id)
	{
		$q="UPDATE `workorder` SET `statue`='$this->_statue' WHERE id='$id' ";
		$res = $this->requete($q);
		return $res;

	}


	public function supprimer($id){
		$q = "DELETE FROM workorder WHERE id= '$id'";
		$res = $this->requete($q);
		return $res;
	}
	public function som()
	{$q = "SELECT * FROM workorder ";
$res = $this->requete($q);

return $res->num_rows;



	}
}
?>
