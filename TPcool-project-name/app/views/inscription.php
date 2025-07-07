<h1>Inscription</h1>
<form action="insertion_inscription" method="post">
    <p>Entrer votre nom : <input type="text" name="name" id=""></p>
    <p>Entrer votre mot de passe : <input type="password" name="password" id=""></p>
    <p>Confirmer le mot de passe : <input type="password" name="confirm_password" id=""> </p>
    <p>Categorie :
        <select name="id_cat" id="">
            <?php for ($i = 0; $i < count($categorie); $i++) { ?>
                <option value=<?php echo $categorie[$i]["id"]; ?>>
                    <?php echo $categorie[$i]["nom"]; ?>
                </option>
            <?php } ?>
        </select>
    </p>
    <p><input type="submit" value="Inscrire"></p>
</form>