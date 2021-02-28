<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        $count = count($prices);

        if ($count === 0 || $count === 1) return 0;

        $curmax = 0;
        $min = PHP_INT_MAX;
        for ($i = 1; $i < $count + 1; $i++) {
            $curmax = max($curmax, $prices[$i - 1] - $min);
            $min = min($min, $prices[$i - 1]);
        }
        return $curmax;
    }
}
