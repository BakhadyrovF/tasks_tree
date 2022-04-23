<?php

namespace App\Helpers;

class Helper
{
    /**
     * Return random generated string
     */
    public static function randomStr(int $count)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $i = 0;
        $result = '';
        while ($i < $count) {
            $result .= $characters[random_int(0, strlen($characters) - 1)];
            $i++;
        }

        return $result;
    }
}
