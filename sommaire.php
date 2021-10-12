    <!-- Division pour le sommaire -->
    <?php 
if (isset($_SESSION['numSess']))
{
		?>
	<div id="navigation">
		<div class="container">

		<ul class="navbar">
        <li ><a class="nav-link" href="index.php?controller=Animaux&action=liste10Animaux">Accueil</a></li>
			<li ><a class="nav-link" href="index.php?controller=Animaux&action=listeAnimaux">Liste des Animaux</a></li>
			<li ><a class="nav-link" href="index.php?controller=user&action=listeUser">Liste des Utilisateurs</a></li>
			<li ><a class="nav-link" href="index.php?controller=personne&action=deconnexion">Déconnexion</a></li>
		</ul>	
        </div>
		</div><!-- #navigation -->
	<?php
	} else {
        ?>
		<div class="container">

			<ul class="navbar">
            <li ><a class="nav-link" href="index.php?controller=animaux&action=liste10Animaux">Accueil</a></li>
			<li ><a class="nav-link" href="index.php?controller=animaux&action=listeAnimal">Liste des Animaux</a></li>
			<li ><a class="nav-link" href="index.php?controller=user&action=connexion2">Connexion</a></li>	
			</ul>	
        </div>
<?php	
}
?>