<?php
require_once './modèle/ModelUser.php';
$action= $_REQUEST['action'];
switch ($action) {
	case "NewUser" :{

		if (isset($_POST['nom'])&&isset($_POST['email'])) {
			$nom=$_POST['nom'];
			$email=$_POST['email'];
			//ajouter création d'un mot de passe automatique et crypté

			$mdp=$_POST['mdp'];
			$lignes = ModelUser::ajouterUser($nom,$email,$mdp);
			$destinataire = $email;
			$headers='From: association_animaux@refuge.net';
			$sujet= 'votre mot de passe';
			$message="Bonjour, voici votre mdp: $mdp";
			mail($destinataire, $sujet, $message, $headers);
			header("location:index.php?controller=user&action=listeUser");			

		}else
		{
			include 'vue/NewUser.php';
		}
		break;
	}
	case "modifUser" :{ //admin

			if (isset($_POST['nom']))
			{
				$nom=$_POST['nom'];
				$email=$_POST['email'];
				$lignes = ModelUser::editUser($id,$nom,$email);
				header("location:index.php?controller=user&action=listeUser");
			}else
			{
				$id=$_GET['idMod'];
				$ligne = ModelUSer::getUser($id);
				include'vue/UpdateUSer.php';
			}
			
			break;
		}
	case "listeUser" :{
			
			$lignes = ModelUser::getAllUser(); 
			include 'vue/ListeUser.php';
			
			break;
		}
	case "supprimerUser" :{
			
			$id=$_GET['idDel'];
			$lignes=ModelUser::supprUser($id);
			header("location:index.php?controller=user&action=listeUser");			
			break;
		}

	case "validerLogin": {
			$email=$_POST['email'];
			$mdp=$_POST['mdp'];
			$ligne=ModelUser::getLoginUser($email);
			if (is_array($ligne))
			{
				if (password_verify($mdp,$ligne['mdp'])) 
				{
					$_SESSION['numSess']=$ligne['idU'];
					header("location:index.php?controller=user&action=connexion");
				}else
				{
					$_SESSION['msgerreur']='Mot de passe incorrect';
				}
			}else
			{
				$_SESSION['msgerreur']='Email inconnu dans la bdd ou incorrect';
			}
			break;
		}

	case "deconnexion":{
		session_start();
		session_destroy();
		header("location:index.php");

		break;
	}

	case "connexion":{
		$sess=$_SESSION['numSess'];
		$np=ModelUser::recupinfo($sess);
		include 'vue/Accueil.php';
		break;
	}

	case "connexion2":{
		include 'vue/connexion.php';
		break;
	}

	case "verifMail_newmdp":{
		$email=$_POST['email'];
		$ligne=ModelUser::getEmail($email);
		if (is_array($ligne))
		{
			$newmdp=ModelUser::aleamdp();
			$modifmdp=ModelUser::newmdp($email,$newmdp); //change mdp dans bdd

			$destinataire = $email;
			$headers='From: association_animaux@refuge.net';
			$sujet= 'votre mot de passe';
			$message="Bonjour, voici votre code: $newmdp";
			mail($destinataire, $sujet, $message, $headers);
			header('Location:index.php');
			
		}else{
				$_SESSION['msgerreur']='Pas de compte associé à cette adresse';
		}
		break;
	}
		
}// fin ctlUser
?>