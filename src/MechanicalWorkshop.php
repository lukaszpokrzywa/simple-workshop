<?php

class MechanicalWorkshop implements Countable, ArrayAccess, JsonSerializable {
    
    /*
     * items in the workshop (e.g. Vehicles, Airships)
     */
    private $items;
    
    public function __construct() {
        $this->items = [];
    }
    
    public function add(Item $i) {
        $this->items[] = $i;
    }
    
    //for Countable interface
    public function count() {
        return count($this->items);
    }
    
    //for ArrayAccess interface
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->items[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->items[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }
    
    //for JsonSerializable
    public function jsonSerialize() {
        return serialize($this-items);
    }
}
