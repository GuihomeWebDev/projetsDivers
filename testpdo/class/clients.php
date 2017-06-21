<?php

class clients extends db{
    public function __construct()
    {
        parent::__construct();
        $this->connect();
    }
    public function getClientsList(){
    $result=$this->pdo->query('select * from clients');
    return $result->fetchAll();
    }
}

