<?php
include 'model/includes.php';
include 'controller/indexController.php';
?>
<h1>ajouter un utilisateur</h1>
<form action="tp1.php" method="POST" >
    <label for="lastName" id="lastName">Nom :<input type="text" name="lastName" title="lastName" value=""></label><br/>
    <label for="firstName" id="firstName">Prénom :<input type="text" name="firstName" title="firstName" value=""></label><br/>
    <label for="birthDate" id="birthDate">Date de naissance :<input type="text" name="birthDate" title="birthDate" value=""></label><br/>
    <label for="address" id="address">Adresse :<input type="text" name="address" title="address"></label><br/>
    <label for="zipCode" id="zipCode">Code postal :<input type="text" name="zipCode" title="zipCode" value=""></label><br/>
    <label for="phone" id="phone">Téléphone :<input type="text" name="phone" title="phone"></label><br/>
    <label for="department" id="department"></label><br/>
    <select name="department">
        <?php
        foreach ($departmentList as $dep)
        {
            ?>
            <option value="<?= $dep->id ?>">
            <?= $dep->departmentName ?>
            </option>
<?php } ?>
    </select>
    <input type="submit" name="submit" title="submit" value="enregistrer">


</form>
</body>
</html>

