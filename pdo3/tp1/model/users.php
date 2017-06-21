<?php
/**
 * declaration de la class signin qui herite de la class db
 */
class signIn extends db {
    /**
     *declaration des attributs de la class
     * 
     */
    public $id;
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '';
    public $adress = '';
    public $zipCode = '';
    public $phone = '';
    public $service = '';

    /**
     * cette methode permet de retourner un tableau d objet contenant tous les champs de la table user
     * 
     */
    public function addusers()
    {
        $request = $this->pdo->prepare('INSERT INTO `users` (lastname, firstname, birthdate, address, zipCode, phone, department)'
                . ' VALUES(:lastname, :firstname, STR_TO_DATE(:birthdate, \'%d/%m/%Y\'), :adress, :zipCode, :phone,  :department)');
        $request->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $request->bindvalue(':firstname', $this->firstname, PDO::PARAM_STR);
        $request->bindvalue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $request->bindvalue(':adress', $this->address, PDO::PARAM_STR);
        $request->bindvalue(':zipCode', $this->zipCode, PDO::PARAM_STR);
        $request->bindvalue(':phone', $this->phone, PDO::PARAM_STR);
        $request->bindvalue(':department', $this->department, PDO::PARAM_STR);
        return $request->execute();

        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function __construct()
    {
        parent::__construct();
        $this->connect();
    }

    public function getUsersList()
    {
        $request = $this->pdo->query('SELECT users.id, lastname, firstname, birthdate, address, zipCode, phone, departments.departmentName AS department FROM users INNER JOIN departments ON users.department = departments.id');
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUsersListByDpt($dptSelected)
    {
        $request = $this->pdo->query('SELECT users.id, lastname, firstname, TIMESTAMPDIFF(YEAR, birthdate, NOW() ) AS age, address, zipCode, phone,  departments.departmentName AS department FROM users INNER JOIN departments ON users.department = departments.id WHERE department=' . $dptSelected);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteUsers($deleteSelected){
        $request = $this->pdo->prepare('DELETE FROM `users` WHERE id=:deleteSelected');
        $request->bindvalue(':deleteSelected', $deleteSelected, PDO::PARAM_INT);
        return $request->execute();
    }

}
