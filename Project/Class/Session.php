<?php
require_once("Mysql.php");
class Session extends Mysql
{

  // Les attributs priv�s

  private $_idSession;
  private $_nomSession;


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

  public function details($idSession)
  {
    $q = "SELECT * FROM Session WHERE idSession ='$idSession'";
    $res = $this->requete($q);
    $row = mysqli_fetch_array( $res);
    $sess = new Session();

    $sess->_idSession			= $row['idSession'];
    $sess->_nomSession		= $row['nomSession'];


    return $sess;
  }


  public function liste()
  {
    $q = "SELECT * FROM Session ORDER BY idSessionEns";
    $list_use = array(); // Tableau VidSessionE
    $res = $this->requete($q);
    while($row = mysqli_fetch_array( $res)){
      $sess = new Session();

      $sess->_idSession			= $row['idSession'];
      $sess->_nomSession		= $row['nomSession'];


      $list_sess[]=$sess;
    }

    return $list_sess;
  }

  public function ajouter()
  {
      $q = "INSERT INTO Session(idSession, nomSession) VALUES
        ('$this->_idSession', '$this->_nomSession')";
    $res = $this->requete($q);
    return mysqli_insert_idSession($this->get_cnx());
  }
  public function modifier(){
    $q = "UPDATE Session SET
        nomSession 	= '$this->_nomSession'


        WHERE idSession = '$this->_idSession' ";

    $res = $this->requete($q);
    return $res;
  }


  public function supprimer($idSession){
    $q = "DELETE FROM Session WHERE idSession= '$idSession'";
    $res = $this->requete($q);
    return $res;
  }
  public function som()
  {$q = "SELECT * FROM Session ";
  $res = $this->requete($q);

  return $res->num_rows;



  }
}





 ?>
