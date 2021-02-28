<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums)
    {
        $count = count($nums);
        if ($count === 0) return 0;
        if ($count === 1) return $nums[0];

        // DP solution(memory saved)
        $prevmax = $nums[0];
        $curmax = max($nums[0], $nums[1]);
        for ($i = 2; $i < $count; $i++) {
            $temp = $curmax;
            $curmax = max($curmax, $prevmax + $nums[$i]);
            $prevmax = $temp;
        }
        return $curmax;

        // DP solution
        /*
        $dp = [$nums[0], max($nums[0], $nums[1])];
        for ($i = 2; $i < $count; $i++) {
            $dp[$i] = max($dp[$i - 1], $dp[$i - 2] + $nums[$i]);
        }
        return $dp[$count - 1];
        */

        // poor DP solution
        /*
        $dp = [$nums[0]];
        $max = $dp[0];
        for ($i = 1; $i < $count; $i++) {
            $prevmax = 0;
            for ($j = 0; $j < $i - 1; $j++) {
                $prevmax = max($prevmax, $dp[$j]);
            }
            $dp[$i] = $prevmax + $nums[$i];
            $max = max($max, $dp[$i]);
        }
        return $max;
        */
    }
}
