<div id="contenu">
<table cellpadding="15" class="position_table">
<tr>
<th>Nom</th>
<th>Race</th>
<th>Age</th>
<?php 
    if (isset($_SESSION['numSess']))
    {
?>

<th>Modifier</th>
<th>Supprimer</th>
<?php }?>
</tr>

<?php
//liste des personnes
 foreach  ($lignes as $row) {
        echo "<tr><td><p><span class='nom'><a href='index.php?controller=animaux&idMod=".$row['id']."&action=Animal'>".$row['nom']."</span></p></td>";
        echo "<td><p>".$row['race']."</span></p></td>";
        echo "<td><p>".$row['age']."</span></p></td>"; 
    if (isset($_SESSION['numSess']))
    {
        echo "<td><a href='index.php?controller=animaux&idMod=".$row['id']."&action=modifAnimal'><img src='vues/image/modification.png' width=50 height=50/></a></td>";
        echo "<td><a href='index.php?controller=animaux&idDel=".$row['id']."&action=supprimerAnimal'><img src='vues/image/delete.png' width=50 height=50/></a></td></tr>";
    }
  }
?>
</table>
</div>