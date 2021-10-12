<html>
	<body>
		<form method='post' action='index.php?controller=animaux&action=modifAnimaux'>
			<table cellpadding='10' class="position_table">
				<tr>
					<td><label>Nom :</label></td>
					<td><input type=text name="nom" value="<?php echo $ligne['nom'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Race :</label></td>
					<td><input type=text name="prenom" value="<?php echo $ligne['race'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Age :</label></td>
					<td><input type=number name="age" value="<?php echo $ligne['age'] ;?>"></td>
				</tr>
				<input type="hidden" name="code" value="<?php echo $id ?>">
				<tr><td><input type=submit name="valider" value="Modifier"></td></tr>

			</table>
		</form>
	</body>
</html>


