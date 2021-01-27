<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums)
    {
        $count = count($nums);
        
        // DP1, Runtime: 2444ms
        // $dp = array_fill(0, $count, 0);
        // $dp[0] = 1;
        // $max = 1;
        // for ($i = 1; $i < $count; $i++) {
        //     for ($j = 0; $j < $i; $j++) {
        //         $candidate = ($nums[$i] > $nums[$j]) ? $dp[$j] + 1 : 1;
        //         $dp[$i] = max($dp[$i], $candidate);
        //         $max = max($max, $dp[$i]);
        //     }
        // }

        // DP2, Runtime: 44ms
        $count = count($nums);
        $dp = array_fill(0, $count, 10001);
        $dp[0] = $nums[0];
        $max = 1;
        for ($i = 1; $i < $count; $i++) {
            $j = $this->lowerBound($dp, $nums[$i]);
            $dp[$j] = $nums[$i];
            $max = max($max, $j + 1);
        }

        return $max
    }

    private function lowerBound($nums, $num)
    {
        $left = 0;
        $right = count($nums) - 1;
        while ($left < $right) {
            $mid = $left + intdiv($right - $left, 2);

            if ($nums[$mid] >= $num) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }

        return $left;
    }
}