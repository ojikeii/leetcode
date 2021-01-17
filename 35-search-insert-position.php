<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target)
    {
        // simple solution
        // foreach ($nums as $i => $num) {
        //     if ($num === $target || $num > $target) return $i;
        // }
        // return count($nums);

        // binary search
        $left = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            $middleIndex = $left + intdiv($right - $left, 2);
            $middle = $nums[$middleIndex];
            if ($middle === $target) return $middleIndex;
            if ($target < $middle) {
                $right = $middleIndex - 1;
            } else {
                $left = $middleIndex + 1;
            }
        }

        return ($target < $middle) ? $middleIndex : $middleIndex + 1;
    }
}