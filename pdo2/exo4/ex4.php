<?php
include '../index.php';
?>
<!-- Exercice 4 Créer un formulaire comprenant les champs : 
nom, prénom, date de naissance, carte de fidélité (case à cocher) et numéro de carte de fidélité. 
Ce formulaire devra permettre de modifier un client.
Dans ce formulaire, afficher les information de Gabriel Perry. Modifier sa date de naissance : il est né le 9 avril 1994.. -->
<?php
//Connexion au PDO pour joindre la Base de donnée
try {
//instancie le nouvel objet pdo avec requete de connection a la base colyseum
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'guillaume78');
}
//stock les erreur dans la variable $e
catch (Exception $e) {
    //envoie un message d'erreur 
    die('Erreur : ' . $e->getMessage());
}
//Requete a la base de donnée pour lire la table   
if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['birthDate']))
{
    $lastName = strip_tags(trim($_POST['lastName']));
    $firstName = strip_tags(trim($_POST['firstName']));
    $birthDate = strip_tags(trim($_POST['birthDate']));
    $cardNumber = NULL;
    $card = 0;
    if (isset($_POST['card']) && isset($_POST['cardNumber']))
    {
        $cardNumber = strip_tags(trim($_POST['cardNumber']));
        $card = 1;
    }
    $req = $bdd->prepare('UPDATE clients SET birthDate=STR_TO_DATE(:birthDate, \'%d/%m/%Y\')  WHERE lastName=:lastName');
    $req->bindValue(':lastName', $lastName, PDO::PARAM_STR);
     $req->bindValue(':birthDate', $birthDate, PDO::PARAM_STR);
    $req->execute();
}
?>
<form action="ex4.php" method="POST" >
    <?php
        $response = $bdd->query('SELECT lastName, firstName, birthDate, card, cardNumber FROM clients WHERE  lastName IN (\'Perry\')');
        $result = $response->fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $donnee) {
                            ?>
                                        
    <label for="lastName">Nom<input type="text" name="lastName" title="lastName" value="<?=$donnee->lastName ?>"></label><br/>
    <label for="firstName">Prénom<input type="text" name="firstName" title="firstName" value="<?=$donnee->firstName ?>"></label><br/>
    <label for="birthDate">Date de naissance<input type="text" name="birthDate" title="birthDate" value="<?=$donnee->birthDate ?>"></label><br/>
    <?php if($donnee->card == 1){ ?>
               <label for="card">Carte de  fidélité<input type="checkbox" name="card" title="gidelityCard" checked></label><br/><?php
                   } else {?>
               <label for="card">Carte de  fidélité<input type="checkbox" name="card" title="gidelityCard" value=""></label><br/><?php
           }?>
    <label for="cardNumber">Numéro de fidélité<input type="text" name="cardNumber" title="cardNumber" value="<?=$donnee->cardNumber ?>"></label>
    <input type="submit" name="submit" title="submit" value="Validez">
<?php  }  ?>  
</form>
</div>
</body>
</html>
