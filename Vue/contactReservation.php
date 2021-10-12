

<html>
	<body>
		<div class="container">
			<a class="taille">Contact</a>
			<hr>
		    <div id="contact">
					<form class="form" action="index.php?controller=animaux&action=contacter" method="post">
						<table class="table">
							<tr>
								<td><label for="courriel">Mail :</label></td>
								<td><input class=" form-control" type="email"  name="email"></td>
							</tr>
							<tr>
								<td><label for="objet">Objet :</label></td>
						    	<td><input class=" form-control" type="text" name="objet"></td>
							</tr>
							<tr>
								<td><label for="message">Message :</label></td>
								<td><textarea class=" form-control"  name="message"></textarea></td>
							</tr>
						</table>
									<input type="hidden" name="code" value="association_animaux@refuge.net">  	
					  	<button type="submit" name="mailform">Envoyer</button>
						<?php
							if(isset($msg))
							{
								echo $msg;
							}
						?>
					</form>
	
	</body>