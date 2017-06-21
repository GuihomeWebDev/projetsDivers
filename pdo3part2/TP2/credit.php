<?php
include 'model/includes.php';
include 'controller/creditController.php';
?>

        <H1 class="numExo">Ajout crédit</H1>
        <div class="php">
            <form action="credit.php" method="POST" >
                <label for="organization">Organisme :<input type="text" name="organization" title="organisme" value=""></label><br/>
                <label for="amount">Montant :<input type="number" name="amount" title="Montant" value=""></label><br/>
                <label for="id_client">Ref client :<input type="number" name="id_client" title="Ref client" value=""></label><br/>
                <input type="submit" name="submit" title="submit" value="Validez">
            </form>
        </div>
        <a href="../index.php">retour à l'accueil</a>
    </body>
</html>