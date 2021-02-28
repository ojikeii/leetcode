<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        // Simple solution
        // foreach($nums as $i => $num) {
        //     if ($num === $target) return $i;
        // }
        // return -1;
        
        // Binary search
        $left = 0;
        $right = count($nums) - 1;
        while ($left <= $right) {
            $middle = $left + intdiv($right - $left, 2);
            $middleVal = $nums[$middle];
            
            if ($middleVal === $target) return $middle;

            $leftVal = $nums[$left];
            $rightVal = $nums[$right];

            if ($middleVal >= $leftVal) {
                if ($target >= $leftVal && $target < $middleVal) {
                    $right = $middle - 1;
                    continue;
                }
                $left = $middle + 1; 
                continue;
            }
            
            if ($target <= $rightVal && $target > $middleVal) {
                $left = $middle + 1; 
                continue;
            }

            $right = $middle - 1;
        }
        
        return -1;
    }
}