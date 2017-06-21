<?php

class moto extends Vehicule {

    public function __construct()
    {
        $this-> fioul = 'essence';
        $this-> wheelsNumber = 2;
        $this-> placeNumber = 1;
    }
    public function openBox(){
    return 'le retroviseur de la moto '.$this->color.' est cassé';
    }
}
