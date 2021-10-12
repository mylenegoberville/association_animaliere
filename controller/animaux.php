<?php
require_once './modèle/ModelAnimaux.php';
$action= $_REQUEST['action'];
switch ($action) {
	case "NewAnimal" :{

		if (isset($_POST['nom'])&&isset($_POST['race'])&&isset($_POST['age'])) {
			$nom=$_POST['nom'];
			$race=$_POST['race'];
			$email=$_POST['age'];
			header("location:index.php?controller=animaux&action=listeAnimaux");			

		}else
		{
			include 'vue/NewAnimal.php';
		}
		break;
	}
	case "modifAnimal" :{ //only admin

			if (isset($_POST['nom']))
			{
				$nom=$_POST['nom'];
				$prenom=$_POST['race'];
				$email=$_POST['age'];
				$lignes = ModelAnimaux::editAnimal($id,$nom,$race,$age);
				header("location:index.php?controller=animaux&action=listeAnimaux");
			}else
			{
				$id=$_GET['idMod'];
				$ligne = ModelAnimaux::getAnimaux($id);
				include'vue/UpdateAnimal.php';
			}
			
			break;
		}
	case "listeAnimal" :{
			
			$lignes = ModelAnimaux::getAllAnimaux(); 
			include 'vue/ListeAnimaux.php';
			
			break;
		}

	case "Animal" :{
		
		$id=$_GET['idMod'];
		$lignes = ModelAnimaux::getAnimaux($id);
		include 'vue/FicheAnimal.php';
		
		break;
	}

	case "liste10Animaux" :{
			
			$lignes = ModelAnimaux::get10Animaux(); 
			include 'vue/Accueil.php';
			
			break;
		}
	case "supprimerAnimal" :{
			
			$id=$_GET['idDel'];
			$lignes=ModelAnimaux::supprAnimal($id);
		header("location:index.php?controller=animaux&action=listeAnimaux");			
			break;
		}

	case "contacter":{
			
			
			$headers="FROM: ".$_POST['code']."";
			$destinataire=$_POST['email'];
			$sujet=$_POST['objet'];
			$message=$_POST['message'];
			if (isset($_POST['mailform']))
				{
					if (!empty($_POST['objet']) && !empty($_POST['email']) && !empty($_POST['message']))

					{ 
						mail($destinataire, $sujet, $message, $headers);
						$msg="Votre message a bien été envoyé";
					}else
					{
						$msg="Veuillez remplir tous les champs";
					}
				}
							
				break;
	}
		
		
}// fin ctlAnimaux
?>