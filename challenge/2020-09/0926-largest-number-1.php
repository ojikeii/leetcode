<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return String
     */
    function largestNumber($nums)
    {
        $nCount = count($nums);
        $sorted = [];
        for ($i = 0; $i < $nCount; $i++) {
            $sorted[] = $nums[$i];
            $sCount = count($sorted);
            for ($j = $sCount - 1; $j > 0; $j--) {
                if ($this->largerThanOrEqual($sorted[$j - 1], $sorted[$j])) {
                    break;
                }
                $temp = $sorted[$j];
                $sorted[$j] = $sorted[$j - 1];
                $sorted[$j - 1] = $temp;
            }
        }

        $sCount = count($sorted);
        $i = 0;
        while ($i < $sCount) {
            if ($sorted[$i] != 0) {
                break;
            }
            $i++;
        }
        if ($i == $sCount) {
            return '0';
        }

        return implode($sorted);
    }

    /**
     * Return:
     *   true if $a >= $b
     *   false if $a < $b
     */
    function largerThanOrEqual($a, $b)
    {
        if ($a == $b) return true;

        $x = $a . $b;
        $y = $b . $a;
        return $x >= $y;
    }
}
