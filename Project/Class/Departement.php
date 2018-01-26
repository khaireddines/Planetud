<?php
require_once("Mysql.php");
class Departement extends Mysql
{

  // Les attributs priv�s

  private $_idDept;
  private $_nomDept;


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

  public function details($idDept)
  {
    $q = "SELECT * FROM Depatement WHERE idDept ='$idDept'";
    $res = $this->requete($q);
    $row = mysqli_fetch_array( $res);
    $dept = new Departement();

    $dept->_idDept			= $row['idDept'];
    $dept->_nomDept		= $row['nomDept'];


    return $dept;
  }


  public function liste()
  {
    $q = "SELECT * FROM Depatement ORDER BY idDeptEns";
    $list_use = array(); // Tableau VidDeptE
    $res = $this->requete($q);
    while($row = mysqli_fetch_array( $res)){
      $dept = new Departement();

      $dept->_idDept			= $row['idDept'];
      $dept->_nomDept		= $row['nomDept'];


      $list_dept[]=$dept;
    }

    return $list_dept;
  }

  public function ajouter()
  {
      $q = "INSERT INTO Depatement(idDept, nomDept) VALUES
        ('$this->_idDept', '$this->_nomDept')";
    $res = $this->requete($q);
    return mysqli_insert_idDept($this->get_cnx());
  }
  public function modifier(){
    $q = "UPDATE Depatement SET
        nomDept 	= '$this->_nomDept'


        WHERE idDept = '$this->_idDept' ";

    $res = $this->requete($q);
    return $res;
  }


  public function supprimer($idDept){
    $q = "DELETE FROM Depatement WHERE idDept= '$idDept'";
    $res = $this->requete($q);
    return $res;
  }
  public function som()
  {$q = "SELECT * FROM Depatement ";
  $res = $this->requete($q);

  return $res->num_rows;



  }
}





 ?>
