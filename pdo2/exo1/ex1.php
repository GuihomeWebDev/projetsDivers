<?php
include '../index.php';
?>
<!-- Exercice 1 Créer un formulaire permettant d'ajouter un client dans la base de données.
Il devra comporter les champs : nom, prénom, date de naissance, carte de fidélité (case à cocher) et numéro de carte de fidélité.
A l'aide de ce formulaire, ajouter à la liste des clients Alicia Moore née le 8 septembre 1979 et ne possédant pas de carte de fidélité..-->
<?php
// essai de me connecter à la base...
try {
//instancie le nouvel objet pdo avec requete de connection a la base colyseum
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'guillaume78');
}
//stock les erreur dans la variable $e
catch (Exception $e) {
    //envoie un message d'erreur 
    die('Erreur : ' . $e->getMessage());
}
?>
<?php
if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['birthDate']))
{
    $lastName = strip_tags(trim($_POST['lastName']));
    $firstName = strip_tags(trim($_POST['firstName']));
    $birthDate = strip_tags(trim($_POST['birthDate']));
    $card = 0;
    $cardNumber = NULL;
    if (isset($_POST['card']) && isset($_POST['cardNumber']))
    {
        $cardNumber = strip_tags(trim($_POST['cardNumber']));
        $card = strip_tags(trim($_POST['card']));
    }
    $req = $bdd->prepare('INSERT INTO clients(lastName, firstName, birthDate,card, cardNumber )
VALUES(:lastName, :firstName, STR_TO_DATE(:birthDate, \'%d/%m/%Y\'), :card, :cardNumber)');
    $req->bindValue(':lastName', $lastName, PDO::PARAM_STR);
    $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
    $req->bindValue(':birthDate', $birthDate, PDO::PARAM_STR);
    $req->bindValue(':card', $card, PDO::PARAM_BOOL);
     $req->bindValue(':cardNumber', $cardNumber, PDO::PARAM_INT);
    $req->execute();
}
?>
<form action="ex1.php" method="POST" >
    <label for="lastName">Nom<input type="text" name="lastName" title="lastName" value=""></label><br/>
    <label for="firstName">Prénom<input type="text" name="firstName" title="firstName" value=""></label><br/>
    <label for="birthDate">Date de naissance<input type="text" name="birthDate" title="birthDate" value=""></label><br/>
    <label for="card">Carte de  fidélité<input type="checkbox" name="card" title="gidelityCard"></label><br/>
    <label for="cardNumber">Numéro de fidélité<input type="text" name="cardNumber" title="cardNumber" value=""></label>
    <input type="submit" name="submit" title="submit" value="Validez">
</form>
</body>
</html>
