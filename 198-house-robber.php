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
    }
}
