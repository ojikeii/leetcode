<?php

class Solution
{

    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange($coins, $amount)
    {
        $max = $amount + 1;
        $dp = array_fill(0, $amount + 1, $max);
        $dp[0] = 0;
        for ($i = 1; $i <= $amount; $i++) {
            for ($j = 0; $j < count($coins); $j++) {
                if ($coins[$j] <= $i) {
                    $dp[$i] = min($dp[$i], $dp[$i - $coins[$j]] + 1);
                }
            }
        }

        return $dp[$amount] > $amount ? -1 : $dp[$amount];
    }

    /*
    function coinChange($coins, $amount)
    {
        if ($amount < 1) return 0;
        $count = [];
        return $this->coinChangePrivate($coins, $amount, $count);
    }

    private function coinChangePrivate(&$coins, $rem, &$count)
    {
        if ($rem < 0) return -1;
        if ($rem === 0) return 0;
        if (isset($count[$rem - 1]) && $count[$rem - 1] !== 0) return $count[$rem - 1];

        $min = PHP_INT_MAX;

        foreach ($coins as $coin) {
            $res = $this->coinChangePrivate($coins, $rem - $coin, $count);
            if ($res >= 0 && $res < $min) {
                $min = 1 + $res;
            }
        }

        $count[$rem - 1] = ($min === PHP_INT_MAX) ? -1 : $min;
        return $count[$rem - 1];
    }
    */

    /*
    function coinChange($coins, $amount)
    {
        return $this->coinChangePrivate(0, $coins, count($coins), $amount);
    }

    private function coinChangePrivate($coinIndex, &$coins, $coinCount, $amount)
    {
        if ($amount === 0) return 0;

        if ($coinIndex < $coinCount && $amount > 0) {
            $d = $coins[$coinIndex];
            $max = intdiv($amount, $d);
            $minCost = PHP_INT_MAX;

            for ($x = 0; $x <= $max; $x++) {
                if ($amount >= $x * $d) {
                    $res = $this->coinChangePrivate($coinIndex + 1, $coins, $coinCount, $amount - $x * $d);
                    if ($res !== -1) {
                        $minCost = min($minCost, $res + $x);
                    }
                }
            }

            return ($minCost === PHP_INT_MAX) ? -1 : $minCost;
        }
        return -1;
    }*/
}
