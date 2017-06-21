<?php

class db{
     private $host;
     protected $pdo;
     private $login;
     private $pwd;
     private $db;
     protected function __construct()
     {
         $this->host=HOST;
         $this->login=LOGIN;
         $this->pwd=PWD;
         $this->db=DB;
     }
     protected function connect(){
         try {
//instancie le nouvel objet pdo avec requete de connection a la base colyseum
    $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8', $this->login, $this->pwd);
}
//stock les erreur dans la variable $e
catch (Exception $e) {
    //envoie un message d'erreur 
    die('Erreur : ' . $e->getMessage());
}
     }
 }