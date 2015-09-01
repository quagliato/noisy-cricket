<?php

class Filler {

    // name......: fill
    // params....: mixed $rs, string $classname
    // desc      : This function gets the resultset ($rs) of a mysql query
    //             VO-property pattern and bind its value to a new object
    //             created using $classname.
    public static function fill($rs, $classname) {
        $array = array();

        while ($field_data = $rs->fetch_array()) {
            $obj = new $classname;
            // Iterate resultset columns.
            while ($field = $rs->fetch_field()) {
                
                // Sets the value from the resultset to the property with the
                // same name.
                if (UTF8ENCODED === true) {
                    $obj->set($field->name, utf8_encode($field_data[$field->name]));
                } else {
                    $obj->set($field->name, $field_data[$field->name]);
                }

            }
            $array[] = $obj;
        }
        return $array;
    }
}
?>
