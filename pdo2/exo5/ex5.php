<?php
include '../index.php';
?>
<!-- Exercice 5 Créer un formulaire permettant de modifier un spectacle.
Afficher les informations de Vestibulum accumsan. Modifier la date du spectacle : il est repoussé au 1er janvier 2017 à 21h. -->
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
                $req = $bdd->prepare('UPDATE shows SET title = :title, performer = :performer, date = :date, showTypesId = :showTypeId, firstGenresId = :firstGenresId, secondGenreId = :secondGenreId, duration = :duration, startTime = :startTime WHERE id = 1 ');
                $req->bindValue(':title', $title, PDO::PARAM_STR);
                $req->bindValue(':performer', $performer, PDO::PARAM_STR);
                $req->bindValue(':date', $date, PDO::PARAM_STR);
                $req->bindValue(':duration', $duration, PDO::PARAM_INT);
                $req->bindValue(':startTime', $startTime, PDO::PARAM_INT);
                $req->bindValue(':showTypeId', $showType, PDO::PARAM_INT);
                $req->bindValue(':firstGenresId', $firstGenre, PDO::PARAM_INT);
                $req->bindValue(':secondGenreId', $secondGenre, PDO::PARAM_INT);
                $req->execute();
            }
            ?>

            <form action="ex5.php" method="POST" >
                <?php
                $table = $bdd->query('SELECT title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime FROM shows WHERE id = 1');
                $res = $table->fetchAll(PDO::FETCH_OBJ);
                foreach ($res as $donne) {
                    ?>
                    <p><label for="title">Titre<input type="text" name="title" title="title" value="<?= $donne->title ?>"></label></p>
                    <p><label for="performer">Artiste<input type="text" name="performer" title="performer" value="<?= $donne->performer ?>"></label></p>
                    <p><label for="date">Date<input type="text" name="date" title="date" value="<?= $donne->date ?>"></label></p>
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
                    <p>Genre<select name="firstGenresId">
                            <?php
                            $responses = $bdd->query('SELECT id, genre FROM genres WHERE showTypesId');
                            $results = $responses->fetchAll(PDO::FETCH_OBJ);
                            foreach ($results as $donnees) {
                                ?>
                                <option value="<?= $donnees->id; ?>"><?= $donnees->genre; ?></option><br><?php
                            }
                            ?>
                        </select></p>
                    <p>Genre 2<select name="secondGenreId">
                            <?php
                            foreach ($results as $donnees) {
                                ?>
                                <option value="<?= $donnees->id; ?>"><?= $donnees->genre; ?></option><br><?php
                            }
                            ?>
                        </select></p>
                        <p><label for="duration">Durée<input type="text" name="duration" title="duration" value="<?= $donne->duration ?>"></label></p>
                    <p><label for="startTime">Heures de commencement<input type="text" name="startTime" title="startTime" value="<?= $donne->startTime ?>"></label></p>
                    <input type="submit" name="submit" title="submit" value="Validez">
                <?php }
                ?>
            </form>
        </div>
    </body>
</html>