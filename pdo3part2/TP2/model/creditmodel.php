<?php

/**
 * Déclaration de la class users qui est l'enfant de db
 */
class credit extends db {

    /**
     * déclaration des attributs
     * @var type 
     */
    public $id;
    public $organization = '';
    public $amount = 0;
    public $id_client = 0;

    /**
     * cette methode permet de retourner un tableau d objet contenant tous les champs de la table unser
     * @return type
     */
    public function addcredit()
    {
        $request = $this->pdo->prepare('INSERT INTO `credit` (organization, amount, id_client)'
                . ' VALUES(:organization, :amount, :id_client)');
        $request->bindValue(':organization', $this->organization, PDO::PARAM_STR);
        $request->bindvalue(':amount', $this->amount, PDO::PARAM_INT);
        $request->bindvalue(':id_client', $this->id_client, PDO::PARAM_INT);
        return $request->execute();

        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function __construct()
    {
        parent::__construct();
        $this->connect();
    }

   

}
