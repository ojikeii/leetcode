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
        $tLen = strlen($t);
        for ($i = 0; $i < $tLen; $i++) {
            $tc = substr($t, $i, 1);
            $found = false;
            $sLen = strlen($s);
            for ($j = 0; $j < $sLen; $j++) {
                $sc = substr($s, $j, 1);
                if ($tc == $sc) {
                    $s = substr_replace($s, '', $j, 1);
                    $found = true;
                    break;
                }
            }
            if ($found == false) {
                return $tc;
            }
        }
    }
}
