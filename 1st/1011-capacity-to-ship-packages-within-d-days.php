<?php

class Solution {

    /**
     * @param Integer[] $weights
     * @param Integer $D
     * @return Integer
     */
    function shipWithinDays($weights, $D) {
        $left = $right = 0;
        foreach($weights as $w) {
            $left = max($left, $w);
            $right += $w;
        }

        while ($left < $right) {
            $middle = $left + intdiv($right - $left, 2);
            $sum = 0;
            $days = 1;
            foreach($weights as $w) {
                if ($sum + $w > $middle) {
                    $days++;
                    $sum = 0;
                }
                $sum += $w;
            }
            if ($days > $D) {
                $left = $middle + 1;
            } else {
                // この middle だと D 日以下で運べる
                // middle かあるいはより小さい値が解になる
                $right = $middle;
            }
        }
        return $left;
    }
}