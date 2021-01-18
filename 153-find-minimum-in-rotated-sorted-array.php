<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        // simple
        $prev = -5001;
        foreach($nums as $num) {
            if ($num < $prev) return $num;
            $prev = $num;
        }
        return $nums[0];
        
        // binary search
        // $left = 0;
        // $right = count($nums) - 1;
      
        // while($left < $right) {
        //     $leftVal = $nums[$left];
        //     $rightVal = $nums[$right];
        //     if ($leftVal < $rightVal) return $leftVal;

        //     $middle = $left + intdiv($right - $left, 2);
        //     $middleVal = $nums[$middle];
        //     if ($middle > 0 && $middleVal < $nums[$middle - 1]) {
        //          return $middleVal;
        //     }

        //     if ($middleVal >= $leftVal) {
        //         $left = $middle + 1;
        //     } else {
        //         $right = $middle - 1;
        //     }
        // }
        
        // return $nums[$left];
    }
}