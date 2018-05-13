<?php

class JsonGetter extends CI_Model {

    public function jsonSerialize() {
        $getter_names = get_class_methods(get_class($this));
        $gettable_attributes = array();
        foreach ($getter_names as $key => $value) {
            if (substr($value, 0, 3) === 'get') {
                $gettable_attributes[substr($value, 3, strlen($value))] = $this->$value();
            }
        }
        return $gettable_attributes;
    }

}
