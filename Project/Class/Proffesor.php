<?php
require_once("Mysql.php");
class Proffesor extends Mysql
{

  // Les attributs priv�s
  private $_idEns;
  private $_nomEns;
  private $_prenomEns;
  private $_cinEns;
  private $_emailEns;
  private $_telEns;

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
    $q = "SELECT * FROM Enseignant WHERE idEns ='$id'";
    $res = $this->requete($q);
    $row = mysqli_fetch_array( $res);
    $prof = new Proffesor();

    $prof->_idEns			= $row['idEns'];
    $prof->_nomEns		= $row['nomEns'];
    $prof->_prenomEns		= $row['prenomEns'];
    $prof->_cinEns	= $row['cinEns'];
    $prof->_emailEns	= $row['emailEns'];
    $prof->_telEns	= $row['telEns'];

    return $prof;
  }


  public function liste()
  {
    $q = "SELECT * FROM Enseignant ORDER BY idEns";
    $list_use = array(); // Tableau VIDE
    $res = $this->requete($q);
    while($row = mysqli_fetch_array( $res)){
      $prof = new Proffesor();

      $prof->_idEns			= $row['idEns'];
      $prof->_nomEns		= $row['nomEns'];
      $prof->_prenomEns		= $row['prenomEns'];
      $prof->_cinEns	= $row['cinEns'];
      $prof->_emailEns	= $row['emailEns'];
      $prof->_telEns	= $row['telEns'];

      $list_prof[]=$prof;
    }

    return $list_prof;
  }

  public function ajouter()
  {
      $q = "INSERT INTO Enseignant(idEns, nomEns, prenomEns, cinEns, emailEns, telEns) VALUES
        (  '$this->_idEns', '$this->_nomEns','$this->_prenomEns'	, '$this->_cinEns','$this->_emailEns','$this->_telEns')";
    $res = $this->requete($q);
    return mysqli_insert_id($this->get_cnx());
  }
  public function modifier(){
    $q = "UPDATE Enseignant SET
        nomEns 	= '$this->_nomEns',
        prenomEns = '$this->_prenomEns' ,
        cinEns = '$this->_cinEns',
        emailEns='$this->_emailEns',
        telEns='$this->_telEns'

        WHERE id = '$this->_idEns' ";

    $res = $this->requete($q);
    return $res;
  }


  public function supprimer($id){
    $q = "DELETE FROM Enseignant WHERE idEns= '$id'";
    $res = $this->requete($q);
    return $res;
  }
  public function som()
  {$q = "SELECT * FROM Enseignant ";
  $res = $this->requete($q);

  return $res->num_rows;



  }
}





 ?>
