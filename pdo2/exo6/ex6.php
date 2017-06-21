<?php
include '../index.php';
?>
<!-- Exercice 6 Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. 
Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.. -->
  <?php
// essai de me connecter à la base...
try
{
//instancie le nouvel objet pdo avec requete de connection a la base colyseum
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'guillaume78');
}
//stock les erreur dans la variable $e
catch (Exception $e)
{
   //envoie un message d'erreur 
        die('Erreur : ' . $e->getMessage());
}
?>
<!--requete sql pour demander l affichage de la liste -->
<div><?php $result = $bdd->query(' SELECT * FROM shows  ORDER BY performer'); 
//parcour du tableau avec une boucle
 foreach ($result as $client){?>
 <p><?=$client['title'].' '.$client['performer'].' '.$client['date'].' '.$client['startTime'];?></p><?php } ?></div>
</body>
</html>