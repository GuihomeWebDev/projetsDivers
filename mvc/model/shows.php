<?php
/**
 * declaration de la class show model de la table shows avec tous les spectacles
 */
class shows {
/**
 *declaration des attributs representant les champs de la table show.
 * 
 */
    public $id = 0;
    public $title = '';
    public $performer = '';
    public $date = '';
    public $showTypesId = 0;
    public $firstGenresId = 0;
    public $secondGenreId = 0;
    public $duration = '';
    public $startTime = '';
    /**
     * attribut contenant l objet PDO permettant la connection a la base de donné.
     *  il est en privé car il n a d utilité que dans la class
     * @var type 
     */
    private $dataBase;
/**
 * contructeur de la class qui permet d initialiser la connection a la base de donnees
 */
    public function __construct() {
        try {
            $this->dataBase = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'guillaume78');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
/**
 * cette methode permet de retourner un tableau d objet contenant tous les spectacles
 * @return type
 */
    public function getShowsList() {
        $showsList = $this->dataBase->query('SELECT * FROM `shows`');
        return $showsList->fetchAll(PDO::FETCH_OBJ);
    }

}