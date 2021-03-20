<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySum($nums, $k)
    {
        $sum = $count = 0;
        $map = [0 => 1];

        foreach ($nums as $n) {
            $sum += $n;
            if (array_key_exists($sum - $k, $map)) {
                $count += $map[$sum - $k];
            }
            if (!array_key_exists($sum, $map)) {
                $map[$sum] = 0;
            }
            $map[$sum]++;
        }

        return $count;
    }
}
