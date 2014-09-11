<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 6/26/14
 * Time: 6:28 PM
 */

namespace norm\core;


class Utils {
    public static function field2property($fieldName) {
        $propertyName = '';
        $words = explode('_', $fieldName);
        foreach($words as $word) {
            if($propertyName === '') {
                $propertyName .= lcfirst($word);
            }
            else {
                $propertyName .= ucfirst($word);
            }
        }

        return $propertyName;
    }

    public static function table2class($tableName) {
        return ucfirst(self::field2property($tableName));
    }

    public static function array2quotedString($arr) {
        if(empty($arr)) {
            return null;
        }
        if(!is_array($arr)) {
            return $arr;
        }
        return "'" . implode("', '", $arr) . "'";
    }
} 