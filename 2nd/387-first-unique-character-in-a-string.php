<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s)
    {
        if (strlen($s) === 0) return -1;

        $strarr = str_split($s);

        $map = [];
        foreach ($strarr as $i => $c) {
            $map[$c] = array_key_exists($c, $map) ? PHP_INT_MAX : $i;
        }

        sort($map);
        $min = $map[0];
        //$min = min($map);
        return ($min === PHP_INT_MAX) ? -1 : $min;

        /*
        foreach($strarr as $i => $c) {
            $map[$c] = array_key_exists($c, $map) ? $map[$c] + 1 : 1; 
        }
        
        foreach($strarr as $i => $c) {
            if ($map[$c] === 1) return $i;
        }
        return -1; 
        */
    }
}
