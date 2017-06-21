<?php

class marital extends db {

    public $id;
    public $statut = '';


    public function __construct()
    {
        parent::__construct();
        $this->connect();
    }
    public function getMarital()
    {
        $request = $this->pdo->query('SELECT id, statut FROM statutMarital');
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

}
