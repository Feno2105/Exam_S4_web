<h2>List des pret</h2>

<table border="1">
    <tr>
        <th>Client</th>
        <th>Type</th>
        <th>Montant</th>
        <th>Reste</th>
        <th>Date debut</th>
        <th>Status</th>
    </tr>

    <?php foreach ($prets as $pret): ?>
    <tr>
        <td> <a href="/client/<?= $pret["id_client"]  ?>/profil"><?= $pret["email"] ?></a> </td>
        <td> <?= $pret["nom_type_pret"] ?> </td>
        <td> <?= $pret["montant"] ?> </td>
        <td> <?= $pret["reste_a_payer"] ?> </td>
        <td> <?= $pret["date_debut"] ?> </td>
        <td> <?= $pret["libelle"] ?> </td>
    </tr>
    <?php endforeach; ?>

</table>