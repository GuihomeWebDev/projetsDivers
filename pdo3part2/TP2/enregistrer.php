<?php
include 'model/includes.php';
include 'controller/usersController.php';
?>

        <H1 class="numExo">Enregistrer un client</H1>
        <div class="php">
            <form action="enregistrer.php" method="POST" >
                <label for="lastName">Nom :<input type="text" name="lastName" title="Nom" value=""></label><br/>
                <label for="firstName">Prénom :<input type="text" name="firstName" title="Prénom" value=""></label><br/>
                <label for="birthDate">Date de naissance :<input type="text" name="birthDate" title="Date de Naissance" value=""></label><br/>
                <label for="address">Adresse<input type="text" name="address" title="Adresse"></label><br/>
                <label for="zipCode">Code postal :<input type="text" name="zipCode" title="Code postale" value=""></label><br/>
                <label for="phone">Téléphone :<input type="text" name="phone" title="Téléphone"></label><br/>
                <p>Statut marital :<select name="id_statutMarital">
                        <?php
                        foreach ($maritalList as $list) {
                            ?>
                            <option value="<?= $list->id ?>">
                                <?= $list->statut ?>
                            </option>
                        <?php } ?>
                    </select></p>
                <input type="submit" name="submit" title="submit" value="Validez">
                <a href="../index.php">retour à l'accueil</a>
            </form>
        </div>
    </body>
</html>