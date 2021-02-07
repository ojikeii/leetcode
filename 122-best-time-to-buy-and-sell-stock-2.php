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

        $prevBuy = -$prices[0];
        $prevSell = 0;
        for ($i = 1; $i < $count; $i++) {
            $buy = max($prevBuy, $prevSell - $prices[$i]);
            $sell = max($prevSell, $prevBuy + $prices[$i]);
            $prevBuy = $buy;
            $prevSell = $sell;
        }
        return $prevSell;

        /*
        $buy = [-$prices[0]];
        $sell = [0];
        for ($i = 1; $i < $count; $i++) {
            $buy[$i] = max($buy[$i - 1], $sell[$i - 1] - $prices[$i]);
            $sell[$i] = max($sell[$i - 1], $buy[$i - 1] + $prices[$i]);
        }
        return $sell[$count - 1];
        */

        /*
        $profit = 0;
        for ($i = 0; $i < $count - 1; $i++) {
            if ($prices[$i] < $prices[$i + 1]) {
                $profit = $prices[$i + 1] - $prices[$i];
            }
        }
        return $profit;
        */

        /*
        $valley = $peak = $prices[0];
        $max = $i = 0;
        while ($i < $count - 1) {
            while ($i < $count - 1 && $prices[$i] >= $prices[$i + 1]) {
                $i++;
            }
            $valley = $prices[$i];
            while ($i < $count - 1 && $prices[$i] <= $prices[$i + 1]) {
                $i++;
            }
            $peak = $prices[$i];
            $max += $peak - $valley;
        }
        return $max;
        */
    }
}
