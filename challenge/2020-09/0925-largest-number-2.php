<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return String
     */
    function largestNumber($nums)
    {
        usort($nums, function ($a, $b) {
            $x = $a . $b;
            $y = $b . $a;
            if ($x == $y) return 0;
            return ($x > $y) ? -1 : 1;
        });

        $count = count($nums);
        $i = 0;
        while ($i < $count) {
            if ($nums[$i] != 0) {
                break;
            }
            $i++;
        }
        if ($i == $count) {
            return '0';
        }

        return implode($nums);
    }
}
