<?php

//require_once 'Item.php';

abstract class Vehicle extends Item {
    
    protected $wheelsNumber;
    
    abstract public function brake();
    public function calculateThePressureOnEachWheel() {
        if($this->wheelsNumber > 0) {
            return $this->weight / $this->wheelsNumber;
        } else {
            return $this->weight;
        }
    }
}

