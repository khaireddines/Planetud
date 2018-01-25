<?php
require_once("Mysql.php");
class Task extends Mysql
{
	// Les attributs priv�s
	private $_idworker;
	private $_idwork;


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

	public function details($idworker)
	{
		$q = "SELECT * FROM taskes WHERE id_worker ='$idworker'";
		$res = $this->requete($q);
		$row = mysqli_fetch_array( $res);
		$use = new Task();

		$use->_idworker 			= $row['id_worker'];
		$use->_idwork 		= $row['id_work'];


		return $use;
	}




	public function ajouter()
	{
	    $q = "INSERT INTO taskes(id_worker,id_work) VALUES
	  		(  '$this->_idworker', '$this->_idwork'
			)";
		$res = $this->requete($q);
		
		return mysqli_insert_id($this->get_cnx());
	}



	public function supprimer($idworker){
		$q = "DELETE FROM taskes WHERE id_worker= '$idworker'";
		$res = $this->requete($q);
		return $res;
	}
	public function som()
	{$q = "SELECT * FROM taskes";
$res = $this->requete($q);

return $res->num_rows;

	}
}
?>
