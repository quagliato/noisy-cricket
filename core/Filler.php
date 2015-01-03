<?php

class Filler {

    public static function fill($rs, $classname) {

        $array = array(); //decalara o array que ira conter os objetos

        while ($field_data = mysql_fetch_array($rs)) { //itera o result set
            $obj = new $classname; //instancia a classe

            for ($i = 0; $i < mysql_num_fields($rs); $i++) { //itera as colunas do resultado
                $field = mysql_fetch_field($rs, $i); //recebe o nome da coluna em questap

                //atribui o valor resultado para o respectivo atributo no novo objeto
                $obj->set($field->name,$field_data[$field->name]);
            }

            $array[] = $obj; //adiciona o objeto no array de resultado
        }
        return $array;
    }
}
?>
