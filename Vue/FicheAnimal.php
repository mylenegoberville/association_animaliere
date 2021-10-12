<div id="contenu">
<table cellpadding="15" class="position_table">
<tr>
<th>Nom</th>
<th>Race</th>
<th>Age</th>


<?php
        echo "<tr><td><p><span class='nom'>".$lignes['nom']."</span></p></td>";
        echo "<td><p>".$lignes['race']."</span></p></td>";
        echo "<td><p>".$lignes['age']."</span></p></td>"; 

?>

<p> Pour réserver ou obtenir des informations sur notre ami à poil veuillez cliquer sur le bouton ci-dessous </p>
<br>
<a href="contactReservation.php"><button> Demande d'information</button></a>
</table>
</div>