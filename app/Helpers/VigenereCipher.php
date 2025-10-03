<?php

namespace App\Helpers;

class VigenereCipher
{
    public static function encrypt($text, $key)
    {
        $text = strtolower($text);
        $key = strtolower($key);
        $encrypted = '';
        $keyIndex = 0;
        $keyLength = strlen($key);

        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $shift = ord($key[$keyIndex % $keyLength]) - 97;
                $encrypted .= chr(((ord($char) - 97 + $shift) % 26) + 97);
                $keyIndex++;
            } else {
                $encrypted .= $char;
            }
        }

        return $encrypted;
    }

    public static function decrypt($text, $key)
    {
        $text = strtolower($text);
        $key = strtolower($key);
        $decrypted = '';
        $keyIndex = 0;
        $keyLength = strlen($key);

        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $shift = ord($key[$keyIndex % $keyLength]) - 97;
                $decrypted .= chr(((ord($char) - 97 - $shift + 26) % 26) + 97);
                $keyIndex++;
            } else {
                $decrypted .= $char;
            }
        }

        return $decrypted;
    }
}
