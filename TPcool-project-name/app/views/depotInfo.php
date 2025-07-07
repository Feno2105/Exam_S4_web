<h1>Depot info</h1>
<table border="1">
    <tr>
        <th>montant</th>
        <th>date de depot</th>
        <th>validation</th>
    </tr>
    <?php for ($i = 0; $i < count($listDepot); $i++) { ?>
        <tr>
            <td><?php echo $listDepot[$i]['montant']; ?> </td>
            <td><?php echo $listDepot[$i]['date_depot']; ?></td>
            <td><?php echo $listDepot[$i]['validation']; ?></td>
        </tr>
    <?php } ?>
</table>