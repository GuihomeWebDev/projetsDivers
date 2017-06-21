<?php
class Vehicule{
    public $color='';
    protected $fioul='';
    protected $wheelsNumber =0;
    protected $placeNumber =0;
    public function __construct()
    {
         
    }

    public function start() {
     return 'le vehicule a demaré';
    }
    public function stop(){
    return 'le vehicule s arrete';
    }
    public function checkFioul(){
        return $this->fioul. ' est vide';
    }
}