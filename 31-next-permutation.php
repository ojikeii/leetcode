<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums)
    {
        $count = count($nums);
        if ($count === 1) return;

        $last = $count - 1;
        for ($i = $last; $i > 0; $i--) {
            if ($nums[$i - 1] < $nums[$i]) break;
        }

        if ($i === 0) {
            sort($nums);
            return;
        }

        for ($j = $last; $j > $i - 1; $j--) {
            if ($nums[$j] > $nums[$i - 1]) break;
        }

        $temp = $nums[$i - 1];
        $nums[$i - 1] = $nums[$j];
        $nums[$j] = $temp;

        for ($k = $i, $l = $last; $k < $l; $k++, $l--) {
            $temp = $nums[$k];
            $nums[$k] = $nums[$l];
            $nums[$l] = $temp;
        }
    }
}
