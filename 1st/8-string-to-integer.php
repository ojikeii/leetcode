<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s)
    {
        $trimmed = ltrim($s);
        $len = strlen($trimmed);
        if ($len === 0) return 0;

        $left = 0;
        $sign = 1;
        $first = substr($trimmed, 0, 1);

        if ($first === '-' || $first === '+') {
            $left++;
            if ($first === '-') $sign = -1;
        }

        $min = pow(2, 31);
        $max = $min - 1;
        $zero = ord('0');
        $nine = ord('9');
        $seven = ord('7');
        $a = intdiv($max, 10);
        $value = 0;
        for ($i = $left; $i < $len; $i++) {
            $c = ord(substr($trimmed, $i, 1));

            if ($c < $zero || $c > $nine) {
                break;
            }

            if ($value > $a || ($value === $a && $c > $seven)) {
                return ($sign === 1) ? $max : -$min;
            }

            $value = $value * 10 + $c - $zero;
        }
        return $sign * $value;
    }
}
