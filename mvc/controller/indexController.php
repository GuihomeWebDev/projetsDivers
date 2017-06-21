<?php
/**
 * on instancie l objet shows, cela appel la methode construct
 */
$shows = new shows();
/**
 * on appelle la methode getShowsList qui permet de recuperer un tableau d objet de tous les spectales
 */
$showsList = $shows->getShowsList();

