<?php

namespace App\Helpers;

class CaesarCipher
{
    public static function encrypt($text, $shift = 3)
    {
        $result = '';
        $shift = $shift % 26;

        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $ascii = ord($char);
                $base = ctype_upper($char) ? 65 : 97;
                $result .= chr(($ascii - $base + $shift) % 26 + $base);
            } else {
                $result .= $char;
            }
        }

        return $result;
    }

    public static function decrypt($text, $shift = 3)
    {
        return self::encrypt($text, 26 - $shift);
    }
}
