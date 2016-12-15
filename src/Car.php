<?php

require_once __DIR__ . '/../exceptions/InvalidCarNameException.php';
require_once __DIR__ . '/../exceptions/InvalidCarWeightException.php';
require_once __DIR__ . '/../exceptions/InvalidCarRegistrationNumberException.php';
require_once __DIR__ . '/../exceptions/InvalidCarWheelsNumberException.php';
require_once __DIR__ . '/../exceptions/InvalidCarYearOfProductionException.php';

class Car extends Vehicle {
    
    protected $registrationNumber;
    
    public function __construct($name = '', $weight = 0, $yearOfProduction = 1000, $wheelsNumber = 4) {
        $this->setName($name);
        $this->setWeight($weight);
        $this->setYearOfProduction($yearOfProduction);
        $this->setWheelsNumber($wheelsNumber);
    }
    
    /*
     * make the Car go
     */
    public function go() {
        /*
         * go go Car!
         * code specific for the Car to go
         */
        return "Car $this->name is going";
    }
    
    /*
     * stop the Car
     */
    public function brake() {
        /*
         * stop the Car!
         * code specific for Car to brake
         */
        return "Car $this->name is slowing down";
    }
    
    /*
     * setter for the $name
     */
    public function setName($name) {
        /*
         * param validation using built-in function
         */
        if(is_string($name)) {
            $this->name = $name;
            //return $this for method chaining
            return $this;
        } else {
            throw new InvalidCarNameException();
        }
    }
    
    /*
     * setter for the $weight
     */
    public function setWeight($weight) {
        /*
         * param validation using built-in function
         */
        if(is_numeric($weight) && $weight >= 0) {
            $this->weight = $weight;
            return $this;
        } else {
            throw new InvalidCarWeightException();
        }
    }   
    
    /*
     * setter for the $yearOfProduction
     */
    public function setYearOfProduction($yearOfProduction) {
        /*
         * param validation using regular expression
         */
        if(preg_match('/^[12][0-9]{3}$/', $yearOfProduction) === 1) {
            $this->yearOfProduction = $yearOfProduction;
            return $this;
        } else {
            throw new InvalidCarYearOfProductionException();
        }
    }
    
    /*
     * setter for the $wheelsNumber
     */
    public function setWheelsNumber($wheelsNumber) {
        /*
         * param validation using filter
         */
        if(filter_var($wheelsNumber, FILTER_VALIDATE_INT) && $wheelsNumber >= 0) {
            $this->wheelsNumber = $wheelsNumber;
            return $this;
        } else {
            throw new InvalidCarWheelsNumberException();
        }
        
    }
    
    /*
     * setter for the $registrationNumber
     */
    public function setRegistrationNumber($registrationNumber) {
        /*
         * param validation using regular expression
         */
        if(preg_match('/^[A-Za-z]{2,3} ([0-9A-Za-z]){4}$/', $registrationNumber) === 1) {
            $this->registrationNumber = $registrationNumber;
            return $this;
        } else {
            throw new InvalidCarRegistrationNumberException();
        }
    }
    
    public function outputName() {
        echo $this->name;
    }
}

