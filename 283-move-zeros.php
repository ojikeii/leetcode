<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums)
    {
        $count = count($nums);
        if ($count === 0 || $count === 1) return;

        for ($i = 0, $firstZeroIndex = 0; $i < $count; $i++) {
            if ($nums[$i] !== 0) {
                $temp = $nums[$i];
                $nums[$i] = $nums[$firstZeroIndex];
                $nums[$firstZeroIndex] = $temp;
                $firstZeroIndex++;
            }
        }

        /*
        for ($i = 0; $i < $count; $i++) {
            if ($nums[$i] === 0) {
                unset($nums[$i]);
                $nums[] = 0;
            }
        }
        $nums = array_values($nums);
        */

        /*
        $zeroIndex = [];
        for ($i = 0; $i < $count; $i++) {
            if ($nums[$i] === 0) {
                $zeroIndex[] = $i;
            }
        }

        $zeroCount = count($zeroIndex);
        $removed = 0;
        for ($i = 0; $i < $zeroCount; $i++) {
            array_splice($nums, $zeroIndex[$i] - $removed, 1);
            $nums[] = 0;
            $removed++;
        }
        */
    }
}
