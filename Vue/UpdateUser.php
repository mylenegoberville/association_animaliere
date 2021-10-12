<html>
	<body>
		<form method='post' action='index.php?controller=user&action=modifUser'>
			<table  cellpadding='10' class="position_table">
				<tr>
					<td><label>Nom :</label></td>
					<td><input type=text name="nom" value="<?php echo $ligne['nom'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Email :</label></td>
					<td><input type=email name="email" value="<?php echo $ligne['email'] ;?>"></td>
				</tr>

				<input type="hidden" name="code" value="<?php echo $id ?>">
				<tr><td><input type=submit name="valider" value="Modifier"></td></tr>

			</table>
		</form>
	</body>
</html>


