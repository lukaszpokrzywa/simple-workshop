<?php

class Helicopter extends Airship {
    
    /*
     * make the Helicopter go
     */
    public function go() {
        $this->fly();
    }
    
    /*
     * make the Helicopter fly
     */
    public function fly() {
        /*
         * fly Plane, fly!
         * code specific for Helicopter to fly
         */
        var_dump(__METHOD__);
    }
    
    /*
     * make the Helicopter land
     */
    public function land() {
        /*
         * code specific for Helicopter to land
         */
        var_dump(__METHOD__);
    }
}

