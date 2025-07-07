<h1>Bien venue admin</h1>
<h3>List des depots non valider</h3>
<table border="1">
    <tr>
        <th>Montant</th>
        <th>utilisateur</th>
        <th>Date de depot</th>
        <th>Validation</th>
    </tr>
    <?php for ($i = 0; $i < count($listeDepot); $i++) { ?>
        <tr>
            <td><?php echo $listeDepot[$i]['montant']; ?></td>
            <td><?php echo $listeDepot[$i]['utilisateur_id']; ?></td>
            <td><?php echo $listeDepot[$i]['date_depot']; ?></td>
            <td><a href="admin/validationDepot/<?php echo $listeDepot[$i]['id']; ?>">Valider</a></td>
        </tr>
    <?php } ?>
</table>