<?php
include 'model/includes.php';
include_once 'controller/indexControllerBis.php';
?>
<h1>afficher la liste utilisateur</h1>
<form action="tp1bis.php" method="POST" >
    <select name="depList">
        <?php
        foreach ($departmentList as $list)
        {
            ?>
        <option value="<?= $list->id ?>" <?= ($deptSelected == $list->id)?'selected':'' ?>>
            <?= $list->departmentName ?>
            </option>
<?php } ?>
    </select>
    <input type="submit" name="submit" title="submit" value="Valider">
    </form>
    <?php  
        foreach ($userByDep as $toto){
                ?>
<div>Nom : <?= $toto->lastname ?></div>
    <div>Prenom : <?= $toto->firstname ?></div>
    <div>Age : <?= $toto->age ?> ans</div>
    <div>Adresse : <?= $toto->address ?></div>
    <div>Code Postal : <?= $toto->zipCode ?></div>
    <div>Téléphone : <?= $toto->phone ?></div>
    <div>service : <?= $toto->department ?></div>
    <form action="tp1bis.php" method="POST"><input type="submit" name="delete[<?=$toto->id ?>]" title="submit" value="supprimer"></form><hr/>
<?php } ?>
</body>
</html>



