<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $map = [];
        foreach ($nums as $i => $n) {
            $map[$n] = $i;
        }

        foreach ($nums as $i => $n) {
            $diff = $target - $n;
            if (array_key_exists($diff, $map) && $map[$diff] !== $i) {
                return [$i, $map[$diff]];
            }
        }

        return [];

        /*
        $count = count($nums);

        for ($i = 0; $i < $count - 1; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($nums[$i] + $nums[$j] === $target) return [$i, $j];
            }
        }
        
        return [];
        */
    }
}
