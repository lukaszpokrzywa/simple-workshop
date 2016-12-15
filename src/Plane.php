<?php

class Plane extends Airship {
    
    /*
     * make the Plane go
     */
    public function go() {
        $this->fly();
    }
    
    /*
     * make the Plane fly
     */
    public function fly() {
        /*
         * fly Plane, fly!
         * code specific for Plane to fly
         */
        var_dump(__METHOD__);
    }
    
    /*
     * make the Plane land
     */
    public function land() {
        /*
         * code specific for Plane to land
         */
        var_dump(__METHOD__);
    }
}
