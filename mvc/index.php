
<?php
/**
 * on inclu le model et le controller dans cet ordre!!!!
 */
include_once 'model/shows.php';
include_once 'controller/indexController.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>mvc</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    </head>
    <body>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Artiste</th>
                    <th>date</th>
                    <th>Type de spectacle</th>
                    <th>Premier genre</th>
                    <th>Second genre</th>
                    <th>Durée</th>
                    <th>Heure de début</th>
                </tr>
            </thead>
            <tbody>
                <?php
                /**
                 * on parcour le tableau d objet contenant tous les spectacles
                 */
                foreach ($showsList as $show) {
                    ?>
                <tr>
                    <td><?= $show->id?></td>
                    <td><?= $show->title?></td>
                    <td><?= $show->performer?></td>
                    <td><?= $show->date?></td>
                    <td><?= $show->showTypesId?></td>
                    <td><?= $show->firstGenresId?></td>
                    <td><?= $show->secondGenreId?></td>
                    <td><?= $show->duration?></td>
                    <td><?= $show->startTime?></td>
                </tr>
                
                <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>