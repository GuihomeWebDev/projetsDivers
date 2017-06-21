<?php
/**
 * Déclaration de la class users qui est l'enfant de db
 */
class users extends db {
    /**
     * déclaration des attributs
     * @var type 
     */
    public $id;
    public $lastName = '';
    public $firstName = '';
    public $birthDate = '';
    public $address = '';
    public $zipCode = '';
    public $phoneNumber = '';
    public $id_statutMarital = '';
    

    /**
     * cette methode permet de retourner un tableau d objet contenant tous les champs de la table unser
     * @return type
     */
    public function addusers() {
        $request = $this->pdo->prepare('INSERT INTO `client` (lastName, firstName, birthDate, address, zipCode, phone, id_statutMarital)'
                . ' VALUES(:lastName, :firstName, STR_TO_DATE(:birthDate, \'%d/%m/%Y\'), :address, :zipCode, :phone,  :id_statutMarital)');
        $request->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $request->bindvalue(':firstName', $this->firstName, PDO::PARAM_STR);
        $request->bindvalue(':birthDate', $this->birthDate, PDO::PARAM_STR);
        $request->bindvalue(':address', $this->address, PDO::PARAM_STR);
        $request->bindvalue(':zipCode', $this->zipCode, PDO::PARAM_STR);
        $request->bindvalue(':phone', $this->phone, PDO::PARAM_STR);
        $request->bindvalue(':id_statutMarital', $this->id_statutMarital, PDO::PARAM_INT);
                 return $request->execute();

        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function __construct() {
        parent::__construct();
        $this->connect();
    }

    public function getUsersList() {
        $request = $this->pdo->query('SELECT client.id, lastName, firstName, TIMESTAMPDIFF(YEAR, birthDate, NOW() ) AS age, address, zipCode, phone, statutMarital.statut AS statut FROM client INNER JOIN statutMarital ON client.id_statutMarital = statutMarital.id');
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
   public function getUsersListById() {
        $request = $this->pdo->query('SELECT client.id, lastName, firstName, TIMESTAMPDIFF(YEAR, birthDate, NOW() ) AS age, address, zipCode, phone, statutMarital.statut AS statut, id_client, amount FROM client '
                . 'INNER JOIN statutMarital ON client.id_statutMarital = statutMarital.id '
                . 'INNER JOIN credit ON client.id = credit.id_client '
                . 'WHERE client.id =' . $_GET['id']);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

}
