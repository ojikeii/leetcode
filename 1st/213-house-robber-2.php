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

        return max(
            $this->robRange($nums, 0, $count - 2),
            $this->robRange($nums, 1, $count - 1)
        );
    }

    private function robRange($nums, $left, $right)
    {
        $curmax = $prevmax = 0;
        for ($i = $left; $i < $right; $i++) {
            $temp = $curmax;
            $curmax = max($curmax, $prevmax + $nums[$i]);
            $prevmax = $temp;
        }
        return $curmax;
    }
}
