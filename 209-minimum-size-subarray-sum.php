<?php

class Solution {

    /**
     * @param Integer $s
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($s, $nums) {
        $N = count($nums);
        if ($N === 0) return 0;
        
        // sliding window. Runtime: 16ms
        $min = $sum = $right = $left = 0;
        $sum = $nums[$right];
        while ($right < $N && $left <= $right) {
            if ($sum >= $s) {
                $min = $right - $left + 1;
            } else {
                $right++;
                $sum += $nums[$right];
            }
            if ($min > 0) {
                $sum -= $nums[$left];
                $left++;
            }
        }

        return $min;
    }
}