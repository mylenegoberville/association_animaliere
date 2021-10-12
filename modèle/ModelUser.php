<?php
require_once 'ModelPDO.php';
class ModelUser  {
	
  //attributs
  public  $id;
  public  $nom;
  public  $email;
  public  $mdp; 

  //methods
   public static function getListeUser() {
        try {
			$sql="SELECT  * FROM user ";
			$result=ModelPDO::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   }

   public static function getAllUser() 
	{
			$sql =  "SELECT * FROM user";
			$result=ModelPDO::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}

  public static function getUser($id) {
        try {
			$sql="SELECT  * FROM user where idU=$id ";
			$result=ModelPDO::$pdo->query($sql);
			$unUser=$result->fetch();
			return $unUser;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   }
    public static function getEmail($email) {
        try {
			$sql="SELECT  * FROM user where email='$email'";
			$result=ModelPDO::$pdo->query($sql);
			$unUser=$result->fetch();
			return $unUser;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   }
	public static function recupinfo($id) {
        try {
      $sql="SELECT  * FROM user where idU='$id'";
      $result=ModelPdo::$pdo->query($sql);
      $unUser=$result->fetch();
      return $unUser;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
          }   
   }

   public static function ajouterUser($nom,$email,$mdp) {
        try {
          $mdpHASH=password_hash($mdp,PASSWORD_DEFAULT);
          $sql="insert into user(nom,email,mdp) VALUES ('".$nom."','".$email."','".$mdpHASH."')";
  			  $result=ModelPDO::$pdo->exec($sql);	
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}	
   }

   public static function supprUser($id) {
   		try {
	   		$sql = "DELETE FROM user WHERE idU=$id";
	   		$result=ModelPDO::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }

 public static function editUser($id, $nom,$email) {
   		try {
	   		$sql = "UPDATE utilisateurs SET nom='$nom',email='$email' WHERE idU=$id";
	   		$result=ModelPDO::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }

  public static function getLoginUser($email) {
      try {
          $sql="SELECT * FROM user where email='$email'";
          $result=ModelPDO::$pdo->query($sql);
          $unUser=$result->fetch();
          return $unUser;
      } catch (PDOException $e) {
         echo $e->getMessage();
         die("Erreur dans la BDD ");
      }   
   }

  public static function aleamdp(){
    $baseliste = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $aleamdp = '';
    $spe= '!#$%&"()*+,-./:;<=>?@[]^_`{|}~';
    $taille=8;

    for($i=0; $i<$taille; $i++){
      $aleamdp.= $baseliste[rand(0, strlen($baseliste)-1)];
    }
    $aleamdp[rand(0, strlen($aleamdp)-1)] = $spe[rand(0, strlen($spe)-1)];  
    
    return $aleamdp;
  }

  public static function newmdp($email,$newmdp)
  {
    try{
      $mdpHASH=password_hash($newmdp,PASSWORD_DEFAULT);
      $mod="UPDATE user SET mdp='$mdpHASH' WHERE email = '$email' ";
      $result=ModelPdo::$pdo->exec($mod);
    }catch (PDOException $e) {
        echo $e->getMessage();
        die("Erreur dans la BDD");
    }

  }



}//fin modelUser


?>