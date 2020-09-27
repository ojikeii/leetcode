<?php

class Solution
{

    /**
     * @param Integer[] $timeSeries
     * @param Integer $duration
     * @return Integer
     */
    function findPoisonedDuration($timeSeries, $duration)
    {
        $tsCount = count($timeSeries);
        $total = 0;
        for ($i = 0; $i < $tsCount; $i++) {
            $t = $timeSeries[$i];
            $next = $t + $duration;
            if ($i < $tsCount - 1 && $timeSeries[$i + 1] < $next) {
                $total += $timeSeries[$i + 1] - $t;
            } else {
                $total += $duration;
            }
        }

        return $total;
    }
}
