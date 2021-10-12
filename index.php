<?php
session_start();
?>
<div id="global">

<?php
include("entete.php") ;
//premiere ouverture = aucun controleur donc ignore le isset
include("sommaire.php");
?>
</div>
<?php

if(isset($_REQUEST['controller']))
		{
			$ctl = $_REQUEST['controller'];
			switch ($ctl) {                  //test 
				
				case "user" :{
					include 'controller/user.php';
					break;
				}
				case "animaux" :{
					include 'controller/animaux.php';
					break;
				}
				
			}	
		}
if (isset($_SESSION['msgerreur']))
{
	echo "<center>".$_SESSION['msgerreur']."</center>";
	unset($_SESSION['msgerreur']);
}
include("pied.php") ;
?>
