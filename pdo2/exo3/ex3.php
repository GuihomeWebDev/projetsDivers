<?php
include '../index.php';
?>
<!--Exercice 3 Créer un formulaire permettant d'ajouter un spectacle. Il contiendra les champs : 
titre, artiste, date, type de spectacle, genre 1, genre 2, durée, heure de début.
Ajouter le spectacle "I love techno" de David Guetta qui a lieu le 20 septembre 2019. C'est un concert (showTypesId : 1) 
de musique électronique (firstGenresId : 4) et clubbing (secondGenreId : 10) qui dure 3 heures et qui commence à 21h..-->
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
//Requete a la base de donnée pour lire la table   
            if (isset($_POST['title']) && isset($_POST['performer']) && isset($_POST['date']) && isset($_POST['duration']) && isset($_POST['startTime']) && isset($_POST['firstGenresId']) && isset($_POST['secondGenreId']) && isset($_POST['showTypesId'])) {
                $title = strip_tags(trim($_POST['title']));
                $performer = strip_tags(trim($_POST['performer']));
                $date = strip_tags(trim($_POST['date']));
                $duration = strip_tags(trim($_POST['duration']));
                $startTime = strip_tags(trim($_POST['startTime']));
                $showType = strip_tags(trim($_POST['showTypesId']));
                $firstGenre = strip_tags(trim($_POST['firstGenresId']));
                $secondGenre = strip_tags(trim($_POST['secondGenreId']));
                $req = $bdd->prepare('INSERT INTO shows(`title`,`performer`,`date`,`showTypesId`,`firstGenresId`,`secondGenreId`,`duration`,`startTime`)
VALUES(:title, :performer, STR_TO_DATE(:date, \'%d/%m/%Y\'), :showType, :firstGenre, :secondGenre, :duration, :startTime)');
                $req->bindValue(':title', $title, PDO::PARAM_STR);
                $req->bindValue(':performer', $performer, PDO::PARAM_STR);
                $req->bindValue(':date', $date, PDO::PARAM_STR);
                $req->bindValue(':duration', $duration, PDO::PARAM_INT);
                $req->bindValue(':startTime', $startTime, PDO::PARAM_INT);
                $req->bindValue(':showType', $showType, PDO::PARAM_INT);
                $req->bindValue(':firstGenre', $firstGenre, PDO::PARAM_INT);
                $req->bindValue(':secondGenre', $secondGenre, PDO::PARAM_INT);
                $req->execute();
            }
            ?>

            <form action="ex3.php" method="POST" >
                <p><label for="title">Titre<input type="text" name="title" title="title" value=""></label></p>
                <p><label for="performer">Artiste<input type="text" name="performer" title="performer" value=""></label></p>
                <p><label for="date">Date<input type="text" name="date" title="date" value=""></label></p>
                <?php
                $response = $bdd->query('SELECT id, type FROM showTypes');
                ?>
                <p>Type<select name="showTypesId">
                        <?php
                        $result = $response->fetchAll(PDO::FETCH_OBJ);
                        foreach ($result as $donnee) {
                            ?>
                            <option value="<?= $donnee->id; ?>"><?= $donnee->type; ?></option><br><?php
                        }
                        ?>
                    </select></p>

                </select></p>
                <p>Genre 1 <select name="firstGenresId">
                        <?php
                        $responses = $bdd->query('SELECT id, genre FROM genres WHERE showTypesId');
                        $results = $responses->fetchAll(PDO::FETCH_OBJ);
                        foreach ($results as $donnees) {
                            ?>
                            <option value="<?= $donnees->id; ?>"><?= $donnees->genre; ?></option><br><?php
                        }
                        ?>
                    </select></p>
                <p>Genre 2 <select name="secondGenreId">
                        <?php
                        foreach ($results as $donnees) {
                            ?>
                            <option value="<?= $donnees->id; ?>"><?= $donnees->genre; ?></option><br><?php
                        }
                        ?>
                    </select></p>
                <p><label for="duration">Durée<input type="text" name="duration" title="duration"></label></p>
                <p><label for="startTime">Heures de commencement<input type="text" name="startTime" title="startTime" value=""></label></p>
                <input type="submit" name="submit" title="submit" value="Validez">
            </form>
        </div>
    </body>
</html>