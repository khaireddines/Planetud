<?php
require_once("Mysql.php");
class Formation extends Mysql
{

  // Les attributs priv�s
  private $_idForm;
  private $_idSession;
  private $_idDept;
  private $_nomForm;
  private $_abrForm;
  private $_descriptionForm;

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
    $q = "SELECT * FROM Formation WHERE idForm ='$id'";
    $res = $this->requete($q);
    $row = mysqli_fetch_array( $res);
    $Forma = new Formation();

    $Forma->_idForm			= $row['idForm'];
    $Forma->_idSession		= $row['idSession'];
    $Forma->_idDept		= $row['idDept'];
    $Forma->_nomForm	= $row['nomForm'];
    $Forma->_abrForm	= $row['abrForm'];
    $Forma->_descriptionForm	= $row['descriptionForm'];

    return $Forma;
  }


  public function liste()
  {
    $q = "SELECT * FROM Formation ORDER BY idForm";
    $list_use = array(); // Tableau VIDE
    $res = $this->requete($q);
    while($row = mysqli_fetch_array( $res)){
      $Forma = new Formation();

      $Forma->_idForm			= $row['idForm'];
      $Forma->_idSession		= $row['idSession'];
      $Forma->_idDept		= $row['idDept'];
      $Forma->_nomForm	= $row['nomForm'];
      $Forma->_abrForm	= $row['abrForm'];
      $Forma->_descriptionForm	= $row['descriptionForm'];

      $list_Forma[]=$Forma;
    }

    return $list_Forma;
  }

  public function ajouter()
  {
      $q = "INSERT INTO Formation(idForm, idSession, idDept, nomForm, abrForm, descriptionForm) VALUES
        (  '$this->_idForm', '$this->_idSession','$this->_idDept'	, '$this->_nomForm','$this->_abrForm','$this->_descriptionForm')";
    $res = $this->requete($q);
    return mysqli_insert_id($this->get_cnx());
  }
  public function modifier(){
    $q = "UPDATE Formation SET
        idSession 	= '$this->_idSession',
        idDept = '$this->_idDept' ,
        nomForm = '$this->_nomForm',
        abrForm='$this->_abrForm',
        descriptionForm='$this->_descriptionForm'

        WHERE id = '$this->_idForm' ";

    $res = $this->requete($q);
    return $res;
  }


  public function supprimer($id){
    $q = "DELETE FROM Formation WHERE idForm= '$id'";
    $res = $this->requete($q);
    return $res;
  }
  public function som()
  {$q = "SELECT * FROM Formation ";
  $res = $this->requete($q);

  return $res->num_rows;



  }
}





 ?>
