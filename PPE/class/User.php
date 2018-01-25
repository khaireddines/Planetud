<?php
require_once("Mysql.php");
class User extends Mysql
{
	// Les attributs priv�s
	private $_login;
	private $_pw;
	private $_name;
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

	public function details($login)
	{
		$q = "SELECT * FROM users WHERE login ='$login'";
		$res = $this->requete($q);
		$row = mysqli_fetch_array( $res);
		$use = new User();

		$use->_login 			= $row['login'];
		$use->_pw 		= $row['pw'];
		$use->_name 		= $row['name'];
		$use->_type	= $row['type'];

		return $use;
	}


	public function liste()
	{
		$q = "SELECT * FROM users ORDER BY login";
		$list_use = array(); // Tableau VIDE
		$res = $this->requete($q);
		while($row = mysqli_fetch_array( $res)){
			$use = new User();

			$use->_login 			= $row['login'];
			$use->_pw 		= $row['pw'];
			$use->_name 		= $row['name'];
			$use->_type	= $row['type'];

			$list_use[]=$use;
		}

		return $list_use;
	}

	public function ajouter()
	{
	    $q = "INSERT INTO users(login, pw, name, type) VALUES
	  		(  '$this->_login', '$this->_pw'		,
			  '$this->_name'	, '$this->_type'
			)";
		$res = $this->requete($q);
		return mysqli_insert_id($this->get_cnx());
	}



	public function supprimer($login){
		$q = "DELETE FROM users WHERE login= '$login'";
		$res = $this->requete($q);
		return $res;
	}
	public function som()
	{$q = "SELECT * FROM users";
$res = $this->requete($q);

return $res->num_rows;

	}
}
?>
