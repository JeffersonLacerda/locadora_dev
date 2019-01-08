<?php

namespace App\Services;

class Util
{
    public static function array_to_string($array, $key = "", $filter = null){
        $str = "";
        try {
            foreach ($array as $a) { 
                if (is_object($a)){
                    if (is_null($filter)){
                        $value = ($key != "") ? $a->$key : $a;
                        $str .= "$value, ";
                    } else {
                        $k = $filter[0];
                        $v = $filter[1];
                        if ($a->$k == $v){
                            $value = ($key != "") ? $a->$key : $a;
                            $str .= "$value, ";
                        }
                    } 
                } else {
                    if (is_null($filter)){
                        $value = ($key != "") ? $a["$key"] : $a;
                        $str .= "$value, ";
                    } else {
                        $k = $filter[0];
                        $v = $filter[1];
                        if ($a["$k"] == $v){
                            $value = ($key != "") ? $a["$key"] : $a;
                            $str .= "$value, ";
                        }
                    } 
                }
            
            }
        } catch (\Exception $e) {
            return "";
        }
        $str = substr($str, 0, -2);
        return addslashes($str);
    }

    public static function same_surname($n1, $n2){
        $names1 = explode(" ", $n1);
        $names2 = explode(" ", $n2);
        $surname = array();
        foreach ($names1 as $name1) {
            if (in_array($name1, $names2)){
                array_push($surname, $name1);
            }
        }
        return implode(" ", $surname);
    }

    public static function change_surname($name, $surname){
        $n = explode(" ", $name);
        $sn = explode(" ", $surname);
        $new = array();
        array_push($new, $n[0]);
        if (count($n) > 3) array_push($new, $n[1]);
        $new = array_merge($new, $sn);
        return implode(" ", $new);
    }

}
