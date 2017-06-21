<?php
include 'model/includes.php';
include 'controller/detailController.php';
?>

        <H1 class="numExo">Details</H1>
        <a href="client.php">retour à l'accueil</a>
        <div class="php">
            <?php
            foreach ($userList as $info) {
                ?>
                <p>Nom : <?= $info->lastName ?></p>
                <p>Prénom : <?= $info->firstName ?></p>
                <p>Age : <?= $info->age ?> Ans</p>
                <p>Adresse : <?= $info->address ?></p>
                <p>Code Postal : <?= $info->zipCode ?></p>
                <p>Téléphone : <?= $info->phone ?></p>
                <p>Statut marital : <?= $info->statut ?></p>
                <p>credit en cour : <?= $info->id_client ?></p>
                <p>montant : <?= $info->amount ?></p>
                <?php
            }
            ?>
                              
        </div>
    </body>
</html>