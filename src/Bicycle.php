<?php

class Bicycle extends Vehicle implements Recyclable {
    
    /*
     * make the Bicycle go
     */
    public function go() {
        /*
         * go go Bicycle!
         */
        var_dump(__METHOD__);   
    }
    
    /*
     * stop the Bicycle
     */
    public function brake() {
        /*
         * stop the Bicycle!
         */
        var_dump(__METHOD__);
    }
    
    /*
     * recycle the Bike
     */
    public function recycle() {
        /*
         * code specific to recycle the Bike
         */
        var_dump(__METHOD__);
    }
}

