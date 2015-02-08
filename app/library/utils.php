<?php

class Utils {

    static function isVowel($string)
    {
        if (preg_match("/^[aAeEiIoOuUyY]/", $string))
            return true;
        else
            return false;
    }

}
