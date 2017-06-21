<?php
include '../index.php';
?>
<!--  Exercice 7    Afficher tous les clients comme ceci : Nom : Nom de famille du client Prénom :
Prénom du client Date de naissance : Date de naissance du client Carte de fidélité : Oui (Si le client en possède une) 
ou Non (s'il n'en possède pas) Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.-->

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
if (isset($_POST['id']) && isset($_POST['clientId']))
{
    $id = strip_tags(trim($_POST['id']));
    $clientId = strip_tags(trim($_POST['clientId']));
    /**
     * Préparation de la requete pour SUPPRIMER.
     */
    $req = $bdd->prepare('DELETE FROM bookings WHERE id IN (\'24\',\'25\')');
    $req->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    if ($req->execute())
    {
        echo 'action reussi';
    }
}
?>
<form action="ex8.php" method="POST" >
    <?php
    /**
     * Boucle pour mettre dans les champs de saisi la valeur de la ligne avec l'id 24
     */
    $response = $bdd->query('SELECT `id`, `clientId` FROM `bookings` WHERE `id` IN (\' 24 \', \' 25 \') ');
    $results = $response->fetchAll(PDO::FETCH_OBJ);
    foreach ($results as $donnees)
    {
        ?>
        <label for="id">id<input type="text" name="id" title="id" value="<?= $donnees->id ?>"></label><br/>
        <label for="clientId">Nom<input type="text" name="clientId" title="clientId" value="<?= $donnees->clientId ?>"></label><br/><hr/>
    <?php
}
?>
    <input type="submit" name="submit" title="submit" value="supprimer">
    </div>
    </body>
    </html>