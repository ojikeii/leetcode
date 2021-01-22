<?php

class Solution {

    /**
     * @param Integer[] $piles
     * @param Integer $H
     * @return Integer
     */
    function minEatingSpeed($piles, $H)
    {
        $left = 1;
        $right = max($piles);
        $n = count($piles);

        while ($left < $right) {
            $middle = $left + intdiv($right - $left, 2);

            $hours = 0;
            for ($i = 0; $i < $n; $i++) {
                $p = $piles[$i];
                $hours += intdiv($p, $middle);
                if ($p % $middle !== 0) $hours++;
            }

            if ($hours > $H) {
                // Speed up because it takes more than H hours to eat all bananas
                $left = $middle + 1;
            } else {
                // Koko can eat all banans within H hours by this speed
                // so search smaller speed 
                $right = $middle;
            }
        }

        return $left;
    }
}