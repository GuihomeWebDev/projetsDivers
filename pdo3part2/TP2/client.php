<?php
include 'model/includes.php';
include 'controller/clientController.php';
?>

<H1 class="numExo">Liste Clients</H1>
<a href="../index.php">retour à l'accueil</a>
<?php
foreach ($userList as $infoClient)
{
    ?>    
    <div class="col-md-offset-3 col-md-2 border">        
        <p>Nom : <?= $infoClient->lastName ?></p>
        <p>Prénom : <?= $infoClient->firstName ?></p>
        <p>Age : <?= $infoClient->age ?> Ans</p>
        <a href="detail.php?id=<?= $infoClient->id ?>" class="btn btn-primary">En savoir plus</a>
    </div>

    <?php
}
?>

</body>
</html>