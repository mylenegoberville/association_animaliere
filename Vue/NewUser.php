<div id="contenu">

	<form method="post" action="index.php?controller=user&action=NewUser">
		<table cellpadding="10" class="position_table">

			<tr><th>Nom</th><td><input type="text" name="nom"></td></tr>

			<tr><th>Email</th><td><input type="email" name="email"></td></tr> <!--ajouter vérification de l'adresse si elle existe déjà dans la BDD-->

			<input hidden name="mdp" value="<?php echo ModelUser::aleamdp(); ?>"><!--ajouter création d'un mot de passe automatique et crypté-->

		
		</table>
		
		<td><input type="submit" value="valider"></td>
	
	</form>

</div>