<h1>Resultat cadeau</h1>
<table border="1">
    <tr>
        <th>nom</th>
        <th>prix</th>
        <th>img</th>
        <th>categori id</th>
        <th>modifier</th>
    </tr>
    <?php for ($i = 0; $i < count($listeCadeau); $i++) { ?>
        <tr>
            <td><?php echo $listeCadeau[$i]['nom']; ?> </td>
            <td><?php echo $listeCadeau[$i]['prix']; ?></td>
            <td><?php echo $listeCadeau[$i]['img']; ?></td>
            <td><?php echo $listeCadeau[$i]['categorie_id']; ?></td>
            <td><a href="/modifieCadeau/<?php echo $i; ?>">modofier</a></td>
        </tr>
    <?php } ?>
    <p>Somme : <?php echo $somme; ?> </p>
    <form action="/validatationCadeau" method="get">
        <p><input type="submit" value="Valider les cadeaux"></p>
    </form>
</table>