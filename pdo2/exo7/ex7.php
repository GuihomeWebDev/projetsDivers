<?php
include '../index.php';
?>
            <?php
            //essai de me connecter a la base
            try {
                //Connexion au PDO pour joindre la Base de donnée
                $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'guillaume78');
                //si la connection ne s'effectue pas affiche ce message.
            } catch (Exception $e) {
                die('Erreur' . $e->getMessage());
            }
            /**
             * Si tout les champs sont correct on les place dans une variable.
             */
            if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['birthDate'])) {
                $lastName = strip_tags(trim($_POST['lastName']));
                $firstName = strip_tags(trim($_POST['firstName']));
                $birthDate = strip_tags(trim($_POST['birthDate']));
                $cardNumber = NULL;
                $card = 0;
                if (isset($_POST['card']) && isset($_POST['cardNumber'])) {
                    $cardNumber = strip_tags(trim($_POST['cardNumber']));
                    $card = 1;
                }
                /**
                 * Préparation de la requete pour SUPPRIMER.
                 */
                $req = $bdd->prepare('DELETE FROM clients WHERE id IN (\'24\',\'25\')');
                $req->bindValue(':lastName', $lastName, PDO::PARAM_STR);
                $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
                $req->bindValue(':birthDate', $birthDate, PDO::PARAM_STR);
                $req->bindValue(':card', $card, PDO::PARAM_INT);
                $req->bindValue(':cardNumber', $cardNumber, PDO::PARAM_INT);
                $req->execute();
            }
            ?>

            <form action="ex7.php" method="POST" >
                <?php
                /**
                 * Boucle pour mettre dans les champs de saisi la valeur de la ligne avec l'id 24
                 */
                $response = $bdd->query('SELECT `id`, `lastName`,`firstName`,`birthDate`,`card`,`cardNumber` FROM clients WHERE id = 24');
                $results = $response->fetchAll(PDO::FETCH_OBJ);
                foreach ($results as $donnees) {
                    ?>
                    <label for="id">id<input type="text" name="id" title="id" value="<?= $donnees->id ?>"></label><br/>
                    <label for="lastName">Nom<input type="text" name="lastName" title="lastName" value="<?= $donnees->lastName ?>"></label><br/>
                    <label for="firstName">Prénom<input type="text" name="firstName" title="firstName" value="<?= $donnees->firstName ?>"></label><br/>
                    <label for="birthDate">Date de naissance<input type="text" name="birthDate" title="birthDate" value="<?= $donnees->birthDate ?>"></label><br/> 
                    <!--                    si la donnée de la card est a 1 le checkbox et activer-->
                    <?php if ($donnees->card == 1) { ?>
                        <label for="card">Carte de  fidélité<input type="checkbox" name="card" title="gidelityCard" checked></label><br/><?php } else {
                        ?>
                        <label for="card">Carte de  fidélité<input type="checkbox" name="card" title="gidelityCard" value=""></label><br/><?php }
                    ?>
                    <label for="cardNumber">Numéro de fidélité<input type="text" name="cardNumber" title="cardNumber" value="<?= $donnees->cardNumber ?>"></label>
                    <?php
                }
                ?>
                <hr/>
                <?php
                /**
                 * Boucle pour mettre dans les champs de saisi la valeur de la ligne avec l'id 25
                 */
                $respons = $bdd->query('SELECT `id`, `lastName`,`firstName`,`birthDate`,`card`,`cardNumber` FROM clients WHERE id = 25');
                $result = $respons->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $donnee) {
                    ?>
                    <label for="id">id<input type="text" name="id" title="id" value="<?= $donnees->id ?>"></label><br/>
                    <label for="lastName">Nom<input type="text" name="lastName" title="lastName" value="<?= $donnee->lastName ?>"></label><br/>
                    <label for="firstName">Prénom<input type="text" name="firstName" title="firstName" value="<?= $donnee->firstName ?>"></label><br/>
                    <label for="birthDate">Date de naissance<input type="text" name="birthDate" title="birthDate" value="<?= $donnee->birthDate ?>"></label><br/> 
                    <!--                    si la donnée de la card est a 1 le checkbox et activer-->
                    <?php if ($donnee->card == 1) { ?>
                        <label for="card">Carte de  fidélité<input type="checkbox" name="card" title="gidelityCard" checked></label><br/><?php } else {
                        ?>
                        <label for="card">Carte de  fidélité<input type="checkbox" name="card" title="gidelityCard" value=""></label><br/><?php }
                    ?>
                    <label for="cardNumber">Numéro de fidélité<input type="text" name="cardNumber" title="cardNumber" value="<?= $donnee->cardNumber ?>"></label>
                    <?php
                }
                ?>
                    <br/><input type="submit" name="submit" title="submit" value="Supprimer">
            </form>
        </div>
    </body>
</html>