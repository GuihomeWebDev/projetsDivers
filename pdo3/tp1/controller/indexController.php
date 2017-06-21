<?php
$user = new signIn();
if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['birthDate']) && isset($_POST['address']) && isset($_POST['zipCode']) && isset($_POST['phone']) && isset($_POST['department']))
{
    $user->lastname = strip_tags($_POST['lastName']);
    $user->firstname = strip_tags($_POST['firstName']);
    $user->birthdate = strip_tags($_POST['birthDate']);
    $user->address = strip_tags($_POST['address']);
    $user->zipCode = strip_tags($_POST['zipCode']);
    $user->phone = strip_tags($_POST['phone']);
    $user->department = strip_tags($_POST['department']);
    $user->addusers();
}
$department = new department();
$departmentList = $department->getDepartement();
