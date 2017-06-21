<?php
include '../index.php';
?>
<!--Exercice2 Créer un formulaire permettant d'ajouter un client dans la base de données. 
Ajouter à ce formulaire les champs permettant de créer une carte de fidélité : numéro de carte et type de carte.
Ajouter, grâce à ce formulaire, Louise Ciccone née le 16 août 1958 et possédant une carte de fidélité. 
Ajouter sa carte de fidélité n°7125. C'est une carte de type 2.-->
            <?php
            //Connexion au PDO pour joindre la Base de donnée
            $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'guillaume78');
            //Requete a la base de donnée pour lire la table   
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
                $req = $bdd->prepare('INSERT INTO clients(lastName, firstName, birthDate, card, cardNumber )
                    VALUES(:lastName, :firstName, STR_TO_DATE(:birthDate, \'%d/%m/%Y\'), :card, :cardNumber )');
                $req->bindValue(':lastName', $lastName, PDO::PARAM_STR);
                $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
                $req->bindValue(':birthDate', $birthDate, PDO::PARAM_STR);
                $req->bindValue(':card', $card, PDO::PARAM_INT);
                $req->bindValue(':cardNumber', $cardNumber, PDO::PARAM_INT);
                $req->execute();
                if (isset($_POST['cardType'])) {
                    $cardType = strip_tags(trim($_POST['cardType']));
                    $request = $bdd->prepare('INSERT INTO cards(cardNumber,cardTypesId)
                        VALUES(:cardNumber, :cardType)');
                    $request->bindValue(':cardType', $cardType, PDO::PARAM_INT);
                    $request->bindValue(':cardNumber', $cardNumber, PDO::PARAM_INT);
                    $request->execute();
                }
            }
            ?>
            <form action="ex2.php" method="POST" >
                <label for="lastName">Nom<input type="text" name="lastName" title="lastName" value=""></label><br/>
                <label for="firstName">Prénom<input type="text" name="firstName" title="firstName" value=""></label><br/>
                <label for="birthDate">Date de naissance<input type="text" name="birthDate" title="birthDate" value=""></label><br/>
                <label for="card">Carte de  fidélité<input type="checkbox" name="card" title="gidelityCard"></label><br/>
                <label for="cardNumber">Numéro de fidélité<input type="text" name="cardNumber" title="cardNumber" value=""></label>
                <select name="cardType">
                    <option for="cardType" value="1">Fidélité</option>
                    <option for="cardType" value="2">Famille nombreuse</option>
                    <option for="cardType" value="3">Étudiant</option>
                    <option for="cardType" value="4">Employé</option>
                </select>
                <input type="submit" name="submit" title="submit" value="Validez">
            </form>
        </div>
    </body>
</html>