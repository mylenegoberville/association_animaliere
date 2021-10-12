<div id="contenu">
<table cellpadding="15" class="position_table">
<tr>
<th>Nom</th>
<th>Email</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>

<?php
//liste des personnes
 foreach  ($lignes as $row) {
        echo "<tr><td><p><span class='nom'>".$row['nom']."</span></p></td>";
        echo "<td><p>".$row['email']."</span></p></td>";
        echo "<td><a href='index.php?controller=user&idMod=".$row['idU']."&action=modifUser'><img src='vue/image/modification.png' width=50 height=50/></a></td>";
        echo "<td><a href='index.php?controller=user&idDel=".$row['idU']."&action=supprimerUser'><img src='vue/image/delete.png' width=50 height=50/></a></td></tr>";

  }
?>
</table>
</div>