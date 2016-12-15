<?php

abstract class Item {
    
    protected $name;
    protected $weight;
    protected $yearOfProduction;
    protected $recycled;
    
    /*
     * make the Item go
     */
    abstract public function go();
}

