<?php
$user = new users();
if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['birthDate']) && isset($_POST['address']) && isset($_POST['zipCode']) && isset($_POST['phone']) && isset($_POST['id_statutMarital']))
{
    $user->lastName = strip_tags($_POST['lastName']);
    $user->firstName = strip_tags($_POST['firstName']);
    $user->birthDate = strip_tags($_POST['birthDate']);
    $user->address = strip_tags($_POST['address']);
    $user->zipCode = strip_tags($_POST['zipCode']);
    $user->phone = strip_tags($_POST['phone']);
    $user->id_statutMarital = strip_tags($_POST['id_statutMarital']);
    $user->addusers();
}
$marital = new marital();
$maritalList = $marital->getMarital();
