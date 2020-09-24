<?php

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function findTheDifference($s, $t)
    {
        $sLen = strlen($s);
        $map = [];
        for ($i = 0; $i < $sLen; $i++) {
            $map[substr($s, $i, 1)]++;
        }

        $tLen = strlen($t);
        for ($i = 0; $i < $tLen; $i++) {
            $tc = substr($t, $i, 1);
            if (array_key_exists($tc, $map) === false || $map[$tc] === 0) {
                return $tc;
            }
            $map[$tc]--;
        }
    }
}
