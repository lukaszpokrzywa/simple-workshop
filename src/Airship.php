<?php

//require_once 'Item.php';

abstract class Airship extends Item {
    
    protected $maxCeiling;
    protected $climbRate;
    
    abstract public function fly();
    abstract public function land();
}
