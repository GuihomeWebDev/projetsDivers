<?php

$user = new credit();
if (isset($_POST['organization']) && isset($_POST['amount']) && isset($_POST['id_client']))
{
    $user->organization = strip_tags($_POST['organization']);
    $user->amount = strip_tags($_POST['amount']);
    $user->id_client = strip_tags($_POST['id_client']);
    $user->addcredit();
}
