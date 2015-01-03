<?php

class DataBinder {

    public static function bind($post, $classname) {
        $obj = new $classname;
        $obj_props = $obj->props();

        foreach ($post as $key => $value) {

            $dashpos = strpos($key, '-');
            $keylen = strlen($key);

            if ($dashpos > -1) {

                $obj_name = substr($key, 0, $dashpos);
                $prop_name = substr($key, $dashpos + 1, $keylen - $dashpos);

                if ($obj_name == $classname && array_key_exists($prop_name, $obj_props)) {
                    $obj->set($prop_name, $value);
                }
            }
        }
        return $obj;
    }
}
?>
