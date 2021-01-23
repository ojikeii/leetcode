<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        // Runtime: 12ms

        $len = strlen($s);
        if ($len === 0) return 0;

        $map = [];
        $max = 0;
        for ($left = 0, $right = 0; $right < $len; $right++) {
            $c = substr($s, $right, 1);
            if (array_key_exists($c, $map)) {
                $left = max($left, $map[$c] + 1);
            }
            $map[$c] = $right;
            $max = max($max, $right - $left + 1);
        }

        return $max;

        // Poor solution. Runtime: 256ms
        // $longest = 0;
        // for ($i = 0; $i < $len; $i++) {
        //     $substr = [];
        //     for ($j = $i; $j < $len; $j++) {
        //         $c = substr($s, $j, 1);
        //         if (array_key_exists($c, $substr)) {
        //             break;
        //         }
        //         $substr[$c] = 1;
        //     }
        //     $sublen = count($substr);
        //     if ($sublen > $longest) {
        //         $longest = $sublen;
        //     }
        // }
        // return $longest;
    }
}