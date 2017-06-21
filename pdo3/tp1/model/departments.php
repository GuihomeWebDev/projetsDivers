<?php

class department extends db {

    public $id;
    public $departmentName = '';
    public $details = '';

    public function getDepartement()
    {
        $request = $this->pdo->query('SELECT departmentName, details, id FROM departments');
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function __construct()
    {
        parent::__construct();
        $this->connect();
    }

}
