<?php
require_once 'ModelPDO.php';
class ModelAnimaux  {

	//attributs
	public $id; 
	public $nom;
	public $age;
	public $race;
	
	//methods
   public static function getListeAnimaux() {
        try {
			$sql="SELECT  * FROM animaux ";
			$result=ModelPDO::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   }

   public static function getAllAnimaux() 
	{
			$sql =  "SELECT * FROM animaux";
			$result=ModelPDO::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}

  public static function get10Animaux() 
	{
			$sql =  "SELECT * FROM animaux ORDER by id DESC LIMIT 10";
			$result=ModelPDO::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}

  public static function getAnimaux($id) {
        try {
			$sql="SELECT * FROM animaux where id=$id";
			$result=ModelPDO::$pdo->query($sql);
			$unAnimal=$result->fetch();
			return $unAnimal;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   }
	public static function recupinfo($id) {
        try {
      $sql="SELECT * FROM animaux where idA='$id'";
      $result=ModelPDO::$pdo->query($sql);
      $unAnimal=$result->fetch();
      return $unAnimal;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
          }   
   }

   public static function ajouterAnimal($nom,$race,$age) {
        try {
          $sql="insert into animaux(nom,race,age) VALUES ('".$nom."','".$race."','".$age."')";
  			  $result=ModelPDO::$pdo->exec($sql);	
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}	
   }

   public static function supprAnimal($id) {
   		try {
	   		$sql = "DELETE FROM animal WHERE idA=$id";
	   		$result=ModelPDO::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }

 public static function editAnimal($id, $nom, $race,$age) {
   		try {
	   		$sql = "UPDATE animaux SET nom='$nom', race='$race',age='$age' WHERE idA=$id";
	   		$result=ModelPDO::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }



}//fin modelAnimaux


?>