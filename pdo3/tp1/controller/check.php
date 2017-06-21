<?php
// © J Magnoux
  function isPhone($testPhone) {
    $formattedPhone = preg_replace('/\D/', '', $testPhone);
    //le ternaire renvoie faux si regex n est pas validée
    return preg_match('`^0[1-9]([-. ]?[0-9]{2}){4}$`', $formattedPhone) ? $formattedPhone : false;
}

function isValidateDate($testDate) {
    $d = DateTime::createFromFormat('d/m/Y', $testDate);
    return ($d && $d->format('d/m/Y') == $testDate) ? date_format(date_create_from_format('d/m/Y', $testDate), 'Y-m-d') : false;
}

function isValidateAddress($testAddress) {
    return preg_match('/^[1-9][0-9]{0,4}[\D]+$/', $testAddress) ? $testAddress : false;
}

function isValidateZipCode($testZipCode) {
    return preg_match('/^([0][1-9]|[1-9][0-9])[0-9]{3}$/', $testZipCode) ? $testZipCode : false;
}
/**
 * 
 * @param int $input INPUT_POST or INPUT_GET
 * @param array $filters array of filters where the key is the key of the input
 * @return array array of values with an error key which is false when it's ok and a key when a problem occured
 */
function submitForm($input, $filters) {
    //en cas de champ vide ou mal remplis $result[cle] = false
    $result = filter_input_array($input, $filters);
    //Si le formulaire a bien été posté
    if ($result != null) {
        $error = 0;
        $errorKey = array();
        //Parcourir tous les champs voulus
        foreach ($result as $key => $valeur) {
            //Si l'input est de type post
            if ($input == INPUT_POST) {
                //si l'entrée est vide
                if (empty($_POST[$key])) {
                    //le champ prend une chaine vide (pour le réaffichage du champ)
                    $result[$key] = '';
                    //errorKey garde en mémoire la clé où l'erreur à eu lieu
                    $errorKey[$key] = true;
                    //incrémentation du nombre d'erreur
                    $error++;
                } elseif ($result[$key] === false) {
                    //le champ prend l'ancienne chaine nettoyé en cas de nécessité pour le réaffichage du champ
                    $result[$key] = strip_tags($_POST[$key]);
                    //errorKey garde en mémoire la clé où l'erreur à eu lieu
                    $errorKey[$key] = true;
                    //incrémentation du nombre d'erreur
                    $error++;
                }
                //Sinon l'input est de type GET
            } else {
                if (empty($_GET[$key])) {
                    //le champ prend une chaine vide (pour le réaffichage du champ)
                    $result[$key] = '';
                    //errorKey garde en mémoire la clé où l'erreur à eu lieu
                    $errorKey[$key] = true;
                    //incrémentation du nombre d'erreur
                    $error++;
                } elseif ($result[$key] === false) {
                    //le champ prend l'ancienne chaine nettoyé en cas de nécessité pour le réaffichage du champ
                    $result[$key] = strip_tags($_GET[$key]);
                    //errorKey garde en mémoire la clé où l'erreur à eu lieu
                    $errorKey[$key] = true;
                    //incrémentation du nombre d'erreur
                    $error++;
                }
            }
        }
        //Il n'y a pas eu d'erreur on place result erreur à faux
        if ($error == 0) {
            $result['error'] = false;
        //Il y a eu des erreurs result erreur prend un tableau des cles où il y a eu une erreur
        } else {
            $result['error'] = $errorKey;
        }
        return $result;
    }
    //result est null, le formulaire n'a pas été remplis donc erreur est global est présente (on ne récupère donc aucune clé)
    $result['error'] = true;
    return $result;
}
